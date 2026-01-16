<?php
/**
 * Product Model for Customer
 * Read-only product operations
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
     * Get all active products
     * @return array
     */
    public function getAllProducts() {
        $sql = "SELECT * FROM products WHERE status = 'active' AND stock > 0 ORDER BY created_at DESC";
        $result = $this->conn->query($sql);
        $products = [];
        
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        
        return $products;
    }
    
    /**
     * Get product by ID
     * @param int $productId
     * @return array|null
     */
    public function getProductById($productId) {
        $sql = "SELECT * FROM products WHERE id = ? AND status = 'active'";
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
     * Get products by category
     * @param string $category
     * @return array
     */
    public function getProductsByCategory($category) {
        $sql = "SELECT * FROM products WHERE category = ? AND status = 'active' AND stock > 0 ORDER BY created_at DESC";
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
        $sql = "SELECT * FROM products WHERE (name LIKE ? OR description LIKE ?) AND status = 'active' AND stock > 0 ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
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
     * Get all categories
     * @return array
     */
    public function getCategories() {
        $sql = "SELECT DISTINCT category FROM products WHERE status = 'active' ORDER BY category";
        $result = $this->conn->query($sql);
        $categories = [];
        
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row['category'];
        }
        
        return $categories;
    }
}
?>
