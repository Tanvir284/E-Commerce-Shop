<?php
/**
 * User Model
 * Handles all user-related database operations
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
     * Register a new user
     * @param string $name
     * @param string $email
     * @param string $password (plain text - will be hashed)
     * @param string $phone (optional)
     * @return array ['success' => bool, 'message' => string, 'user_id' => int|null]
     */
    public function registerUser($name, $email, $password, $phone = null) {
        // Check if email already exists
        if ($this->emailExists($email)) {
            return [
                'success' => false,
                'message' => 'Email already registered. Please use a different email or login.',
                'user_id' => null
            ];
        }
        
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Prepare SQL
        $sql = "INSERT INTO users (name, email, password, phone, role) VALUES (?, ?, ?, ?, 'customer')";
        
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            return [
                'success' => false,
                'message' => 'Database error. Please try again.',
                'user_id' => null
            ];
        }
        
        $stmt->bind_param("ssss", $name, $email, $hashedPassword, $phone);
        
        if ($stmt->execute()) {
            $userId = $this->conn->insert_id;
            $stmt->close();
            return [
                'success' => true,
                'message' => 'Registration successful! You can now login.',
                'user_id' => $userId
            ];
        } else {
            $stmt->close();
            return [
                'success' => false,
                'message' => 'Registration failed. Please try again.',
                'user_id' => null
            ];
        }
    }
    
    /**
     * Check if email already exists in database
     * @param string $email
     * @return bool
     */
    public function emailExists($email) {
        $sql = "SELECT id FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $exists = $result->num_rows > 0;
        $stmt->close();
        return $exists;
    }
    
    /**
     * Find user by email (for login)
     * @param string $email
     * @return array|null User data or null if not found
     */
    public function findUserByEmail($email) {
        $sql = "SELECT id, name, email, password, role, phone, address, created_at FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            $stmt->close();
            return $user;
        }
        
        $stmt->close();
        return null;
    }
    
    /**
     * Verify user password
     * @param string $email
     * @param string $password (plain text)
     * @return array ['success' => bool, 'user' => array|null, 'message' => string]
     */
    public function verifyLogin($email, $password) {
        $user = $this->findUserByEmail($email);
        
        if ($user === null) {
            return [
                'success' => false,
                'user' => null,
                'message' => 'Invalid email or password.'
            ];
        }
        
        if (password_verify($password, $user['password'])) {
            // Remove password from user data before returning
            unset($user['password']);
            return [
                'success' => true,
                'user' => $user,
                'message' => 'Login successful!'
            ];
        }
        
        return [
            'success' => false,
            'user' => null,
            'message' => 'Invalid email or password.'
        ];
    }
    
    /**
     * Get user by ID
     * @param int $userId
     * @return array|null
     */
    public function getUserById($userId) {
        $sql = "SELECT id, name, email, role, phone, address, created_at FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            $stmt->close();
            return $user;
        }
        
        $stmt->close();
        return null;
    }
    
    /**
     * Update user profile
     * @param int $userId
     * @param string $name
     * @param string $phone
     * @param string $address
     * @return bool
     */
    public function updateProfile($userId, $name, $phone, $address) {
        $sql = "UPDATE users SET name = ?, phone = ?, address = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $name, $phone, $address, $userId);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }

    /**
     * Change user password
     * @param int $userId
     * @param string $newPassword
     * @return bool
     */
    public function changePassword($userId, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $hashedPassword, $userId);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
}
?>
