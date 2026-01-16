<?php
/**
 * Product Model
 * Handles all product-related database operations
 */

require_once __DIR__ . '/dbConnection.php';

class ProductModel {
    private $db;
    private $conn;
    
    public function __construct() {
        $this->db = Database::getInstance();
        $this->conn = $this->db->getConnection();
    }
    
    /**
     * Insert a new product
     * @param string $name
     * @param string $description
     * @param float $price
     * @param string $image
     * @param int $stock
     * @param string $category
     * @return array ['success' => bool, 'message' => string, 'product_id' => int|null]
     */
    public function insertProduct($name, $description, $price, $image, $stock, $category) {
        $sql = "INSERT INTO products (name, description, price, image, stock, category) VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            return [
                'success' => false,
                'message' => 'Database error: ' . $this->conn->error,
                'product_id' => null
            ];
        }
        
        $stmt->bind_param("ssdsis", $name, $description, $price, $image, $stock, $category);
        
        if ($stmt->execute()) {
            $productId = $this->conn->insert_id;
            $stmt->close();
            return [
                'success' => true,
                'message' => 'Product added successfully!',
                'product_id' => $productId
            ];
        } else {
            $error = $stmt->error;
            $stmt->close();
            return [
                'success' => false,
                'message' => 'Failed to add product: ' . $error,
                'product_id' => null
            ];
        }
    }
    
    /**
     * Get all products
     * @param string $status (optional) - Filter by status
     * @return array
     */
    public function getAllProducts($status = null) {
        if ($status) {
            $sql = "SELECT * FROM products WHERE status = ? ORDER BY created_at DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $status);
        } else {
            $sql = "SELECT * FROM products ORDER BY created_at DESC";
            $stmt = $this->conn->prepare($sql);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();
        $products = [];
        
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        
        $stmt->close();
        return $products;
    }
    
    /**
     * Get product by ID
     * @param int $productId
     * @return array|null
     */
    public function getProductById($productId) {
        $sql = "SELECT * FROM products WHERE id = ?";
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
    
    /**
     * Update product
     * @param int $productId
     * @param string $name
     * @param string $description
     * @param float $price
     * @param string $image (optional - null to keep existing)
     * @param int $stock
     * @param string $category
     * @return bool
     */
    public function updateProduct($productId, $name, $description, $price, $image, $stock, $category) {
        if ($image !== null) {
            $sql = "UPDATE products SET name = ?, description = ?, price = ?, image = ?, stock = ?, category = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssdsisi", $name, $description, $price, $image, $stock, $category, $productId);
        } else {
            $sql = "UPDATE products SET name = ?, description = ?, price = ?, stock = ?, category = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssdisi", $name, $description, $price, $stock, $category, $productId);
        }
        
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
    
    /**
     * Delete product
     * @param int $productId
     * @return bool
     */
    public function deleteProduct($productId) {
        // First get the image filename
        $product = $this->getProductById($productId);
        
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $productId);
        $success = $stmt->execute();
        $stmt->close();
        
        // Return product info for image cleanup
        if ($success && $product) {
            return $product['image'];
        }
        
        return $success;
    }
    
    /**
     * Get products by category
     * @param string $category
     * @return array
     */
    public function getProductsByCategory($category) {
        $sql = "SELECT * FROM products WHERE category = ? AND status = 'active' ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $category);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = [];
        
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        
        $stmt->close();
        return $products;
    }
    
    /**
     * Search products
     * @param string $keyword
     * @return array
     */
    public function searchProducts($keyword) {
        $searchTerm = "%{$keyword}%";
        $sql = "SELECT * FROM products WHERE (name LIKE ? OR description LIKE ? OR category LIKE ?) AND status = 'active' ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = [];
        
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        
        $stmt->close();
        return $products;
    }
    
    /**
     * Get product count
     * @return int
     */
    public function getProductCount() {
        $sql = "SELECT COUNT(*) as count FROM products";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return (int)$row['count'];
    }
    
    /**
     * Update product stock
     * @param int $productId
     * @param int $quantity (positive to add, negative to subtract)
     * @return bool
     */
    public function updateStock($productId, $quantity) {
        $sql = "UPDATE products SET stock = stock + ? WHERE id = ? AND stock + ? >= 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iii", $quantity, $productId, $quantity);
        $success = $stmt->execute();
        $stmt->close();
        return $success && $this->conn->affected_rows > 0;
    }
}
?>
