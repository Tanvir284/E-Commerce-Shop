<?php
/**
 * Order Model
 * Handles all order-related database operations
 */

require_once __DIR__ . '/dbConnection.php';

class OrderModel {
    private $db;
    private $conn;
    
    public function __construct() {
        $this->db = Database::getInstance();
        $this->conn = $this->db->getConnection();
    }
    
    /**
     * Get dashboard statistics
     * @return array
     */
    public function getDashboardStats() {
        $stats = [];
        
        // Total Users
        $result = $this->conn->query("SELECT COUNT(*) as count FROM users WHERE role = 'customer'");
        $stats['total_users'] = $result->fetch_assoc()['count'];
        
        // Total Products
        $result = $this->conn->query("SELECT COUNT(*) as count FROM products");
        $stats['total_products'] = $result->fetch_assoc()['count'];
        
        // Total Orders
        $result = $this->conn->query("SELECT COUNT(*) as count FROM orders");
        $stats['total_orders'] = $result->fetch_assoc()['count'];
        
        // Total Revenue
        $result = $this->conn->query("SELECT COALESCE(SUM(total_amount), 0) as total FROM orders WHERE status != 'cancelled'");
        $stats['total_revenue'] = $result->fetch_assoc()['total'];
        
        // Pending Orders
        $result = $this->conn->query("SELECT COUNT(*) as count FROM orders WHERE status = 'pending'");
        $stats['pending_orders'] = $result->fetch_assoc()['count'];
        
        return $stats;
    }
    
    /**
     * Get all orders with user info
     * @param string $status (optional)
     * @return array
     */
    public function getAllOrders($status = null) {
        if ($status) {
            $sql = "SELECT o.*, u.name as customer_name, u.email as customer_email 
                    FROM orders o 
                    JOIN users u ON o.user_id = u.id 
                    WHERE o.status = ? 
                    ORDER BY o.created_at DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $status);
        } else {
            $sql = "SELECT o.*, u.name as customer_name, u.email as customer_email 
                    FROM orders o 
                    JOIN users u ON o.user_id = u.id 
                    ORDER BY o.created_at DESC";
            $stmt = $this->conn->prepare($sql);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();
        $orders = [];
        
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
        
        $stmt->close();
        return $orders;
    }
    
    /**
     * Get recent orders
     * @param int $limit
     * @return array
     */
    public function getRecentOrders($limit = 5) {
        $sql = "SELECT o.*, u.name as customer_name 
                FROM orders o 
                JOIN users u ON o.user_id = u.id 
                ORDER BY o.created_at DESC 
                LIMIT ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        $orders = [];
        
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
        
        $stmt->close();
        return $orders;
    }
    
    /**
     * Get order by ID with details
     * @param int $orderId
     * @return array|null
     */
    public function getOrderById($orderId) {
        $sql = "SELECT o.*, u.name as customer_name, u.email as customer_email, u.phone as customer_phone
                FROM orders o 
                JOIN users u ON o.user_id = u.id 
                WHERE o.id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $order = $result->fetch_assoc();
            $stmt->close();
            
            // Get order items
            $order['items'] = $this->getOrderItems($orderId);
            return $order;
        }
        
        $stmt->close();
        return null;
    }
    
    /**
     * Get order items
     * @param int $orderId
     * @return array
     */
    public function getOrderItems($orderId) {
        $sql = "SELECT od.*, p.name as product_name, p.image as product_image 
                FROM order_details od 
                JOIN products p ON od.product_id = p.id 
                WHERE od.order_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        $result = $stmt->get_result();
        $items = [];
        
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
        
        $stmt->close();
        return $items;
    }
    
    /**
     * Update order status
     * @param int $orderId
     * @param string $status
     * @return bool
     */
    public function updateOrderStatus($orderId, $status) {
        $validStatuses = ['pending', 'processing', 'shipped', 'delivered', 'cancelled'];
        if (!in_array($status, $validStatuses)) {
            return false;
        }
        
        $sql = "UPDATE orders SET status = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $status, $orderId);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
    
    /**
     * Get orders by user ID
     * @param int $userId
     * @return array
     */
    public function getOrdersByUserId($userId) {
        $sql = "SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $orders = [];
        
        while ($row = $result->fetch_assoc()) {
            $row['items'] = $this->getOrderItems($row['id']);
            $orders[] = $row;
        }
        
        $stmt->close();
        return $orders;
    }
    
    /**
     * Create new order
     * @param int $userId
     * @param float $totalAmount
     * @param string $shippingAddress
     * @param string $paymentMethod
     * @param array $items - Array of ['product_id', 'quantity', 'price']
     * @return array
     */
    public function createOrder($userId, $totalAmount, $shippingAddress, $paymentMethod, $items) {
        // Start transaction
        $this->conn->begin_transaction();
        
        try {
            // Insert order
            $sql = "INSERT INTO orders (user_id, total_amount, shipping_address, payment_method) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("idss", $userId, $totalAmount, $shippingAddress, $paymentMethod);
            $stmt->execute();
            $orderId = $this->conn->insert_id;
            $stmt->close();
            
            // Insert order items
            $sql = "INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            
            foreach ($items as $item) {
                $stmt->bind_param("iiid", $orderId, $item['product_id'], $item['quantity'], $item['price']);
                $stmt->execute();
                
                // Update product stock
                $updateStock = "UPDATE products SET stock = stock - ? WHERE id = ? AND stock >= ?";
                $stockStmt = $this->conn->prepare($updateStock);
                $stockStmt->bind_param("iii", $item['quantity'], $item['product_id'], $item['quantity']);
                $stockStmt->execute();
                $stockStmt->close();
            }
            
            $stmt->close();
            
            // Commit transaction
            $this->conn->commit();
            
            return [
                'success' => true,
                'order_id' => $orderId,
                'message' => 'Order placed successfully!'
            ];
        } catch (Exception $e) {
            $this->conn->rollback();
            return [
                'success' => false,
                'order_id' => null,
                'message' => 'Failed to create order: ' . $e->getMessage()
            ];
        }
    }
}
?>
