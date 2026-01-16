<?php
/**
 * Order Model for Customer
 * Handles customer orders
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
     * Get single order with authorization check
     * @param int $orderId
     * @param int $userId
     * @return array|null
     */
    public function getOrderById($orderId, $userId) {
        $sql = "SELECT * FROM orders WHERE id = ? AND user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $orderId, $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $order = $result->fetch_assoc();
            $order['items'] = $this->getOrderItems($orderId);
            $stmt->close();
            return $order;
        }
        
        $stmt->close();
        return null;
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
