<?php
/**
 * Cart Model
 * Handles shopping cart operations
 */

require_once __DIR__ . '/dbConnection.php';

class CartModel {
    private $db;
    private $conn;
    
    public function __construct() {
        $this->db = Database::getInstance();
        $this->conn = $this->db->getConnection();
    }
    
    /**
     * Add item to cart
     * @param int $userId
     * @param int $productId
     * @param int $quantity
     * @return array
     */
    public function addToCart($userId, $productId, $quantity = 1) {
        // Check if product exists and has stock
        $product = $this->getProductStock($productId);
        if (!$product) {
            return ['success' => false, 'message' => 'Product not found'];
        }
        
        if ($product['stock'] < $quantity) {
            return ['success' => false, 'message' => 'Not enough stock available'];
        }
        
        // Check if item already in cart
        $existingQty = $this->getCartItemQuantity($userId, $productId);
        
        if ($existingQty > 0) {
            // Update quantity
            $newQty = $existingQty + $quantity;
            if ($newQty > $product['stock']) {
                return ['success' => false, 'message' => 'Cannot add more, stock limit reached'];
            }
            
            $sql = "UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("iii", $newQty, $userId, $productId);
        } else {
            // Insert new item
            $sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("iii", $userId, $productId, $quantity);
        }
        
        if ($stmt->execute()) {
            $stmt->close();
            return [
                'success' => true,
                'message' => 'Added to cart!',
                'cart_count' => $this->getCartCount($userId)
            ];
        }
        
        $stmt->close();
        return ['success' => false, 'message' => 'Failed to add to cart'];
    }
    
    /**
     * Get cart items with product details
     * @param int $userId
     * @return array
     */
    public function getCartItems($userId) {
        $sql = "SELECT c.*, p.name, p.price, p.image, p.stock 
                FROM cart c 
                JOIN products p ON c.product_id = p.id 
                WHERE c.user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $items = [];
        
        while ($row = $result->fetch_assoc()) {
            $row['subtotal'] = $row['price'] * $row['quantity'];
            $items[] = $row;
        }
        
        $stmt->close();
        return $items;
    }
    
    /**
     * Update cart item quantity
     * @param int $userId
     * @param int $productId
     * @param int $quantity
     * @return array
     */
    public function updateQuantity($userId, $productId, $quantity) {
        if ($quantity <= 0) {
            return $this->removeFromCart($userId, $productId);
        }
        
        // Check stock
        $product = $this->getProductStock($productId);
        if ($quantity > $product['stock']) {
            return ['success' => false, 'message' => 'Not enough stock'];
        }
        
        $sql = "UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iii", $quantity, $userId, $productId);
        $success = $stmt->execute();
        $stmt->close();
        
        if ($success) {
            return [
                'success' => true,
                'message' => 'Quantity updated',
                'cart_count' => $this->getCartCount($userId)
            ];
        }
        
        return ['success' => false, 'message' => 'Failed to update'];
    }
    
    /**
     * Remove item from cart
     * @param int $userId
     * @param int $productId
     * @return array
     */
    public function removeFromCart($userId, $productId) {
        $sql = "DELETE FROM cart WHERE user_id = ? AND product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $userId, $productId);
        $success = $stmt->execute();
        $stmt->close();
        
        return [
            'success' => $success,
            'message' => $success ? 'Item removed' : 'Failed to remove',
            'cart_count' => $this->getCartCount($userId)
        ];
    }
    
    /**
     * Clear entire cart
     * @param int $userId
     * @return bool
     */
    public function clearCart($userId) {
        $sql = "DELETE FROM cart WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
    
    /**
     * Get cart item count
     * @param int $userId
     * @return int
     */
    public function getCartCount($userId) {
        $sql = "SELECT COALESCE(SUM(quantity), 0) as count FROM cart WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = (int)$result->fetch_assoc()['count'];
        $stmt->close();
        return $count;
    }
    
    /**
     * Get cart total
     * @param int $userId
     * @return float
     */
    public function getCartTotal($userId) {
        $sql = "SELECT COALESCE(SUM(c.quantity * p.price), 0) as total 
                FROM cart c 
                JOIN products p ON c.product_id = p.id 
                WHERE c.user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $total = (float)$result->fetch_assoc()['total'];
        $stmt->close();
        return $total;
    }
    
    /**
     * Helper: Get cart item quantity
     */
    private function getCartItemQuantity($userId, $productId) {
        $sql = "SELECT quantity FROM cart WHERE user_id = ? AND product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $userId, $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $qty = $result->fetch_assoc()['quantity'];
            $stmt->close();
            return $qty;
        }
        
        $stmt->close();
        return 0;
    }
    
    /**
     * Helper: Get product stock
     */
    private function getProductStock($productId) {
        $sql = "SELECT id, stock FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $product = $result->fetch_assoc();
            $stmt->close();
            return $product;
        }
        
        $stmt->close();
        return null;
    }
}
?>
