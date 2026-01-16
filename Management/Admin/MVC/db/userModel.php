<?php
/**
 * User Model for Admin
 * Handles user management operations
 */

require_once __DIR__ . '/dbConnection.php';

class UserModel {
    private $db;
    private $conn;
    
    public function __construct() {
        $this->db = Database::getInstance();
        $this->conn = $this->db->getConnection();
    }
    
    /**
     * Get all users (excluding admins)
     * @return array
     */
    public function getAllUsers() {
        $sql = "SELECT id, name, email, phone, address, role, created_at FROM users WHERE role = 'customer' ORDER BY created_at DESC";
        $result = $this->conn->query($sql);
        $users = [];
        
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        
        return $users;
    }
    
    /**
     * Get user count
     * @return int
     */
    public function getUserCount() {
        $sql = "SELECT COUNT(*) as count FROM users WHERE role = 'customer'";
        $result = $this->conn->query($sql);
        return (int)$result->fetch_assoc()['count'];
    }
    
    /**
     * Delete user
     * @param int $userId
     * @return bool
     */
    public function deleteUser($userId) {
        $sql = "DELETE FROM users WHERE id = ? AND role = 'customer'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $success = $stmt->execute();
        $stmt->close();
        return $success && $this->conn->affected_rows > 0;
    }
}
?>
