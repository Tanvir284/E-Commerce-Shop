<?php
/**
 * Database Connection Class
 * Model Layer - Handles MySQL database connectivity
 * 
 * Usage:
 *   require_once 'dbConnection.php';
 *   $db = Database::getInstance();
 *   $conn = $db->getConnection();
 */

class Database {
    private static $instance = null;
    private $connection;
    
    // Database Configuration
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'ecommerce_db';
    private $port = 3306;
    
    /**
     * Private constructor - Singleton pattern
     */
    private function __construct() {
        $this->connect();
    }
    
    /**
     * Get database instance (Singleton)
     * @return Database
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Establish database connection using mysqli
     */
    private function connect() {
        // Create connection
        $this->connection = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database,
            $this->port
        );
        
        // Check connection
        if ($this->connection->connect_error) {
            die("Database Connection Failed: " . $this->connection->connect_error);
        }
        
        // Set charset to UTF-8
        $this->connection->set_charset("utf8mb4");
    }
    
    /**
     * Get the mysqli connection object
     * @return mysqli
     */
    public function getConnection() {
        return $this->connection;
    }
    
    /**
     * Execute a prepared statement with parameters
     * @param string $sql - SQL query with placeholders
     * @param string $types - Parameter types (s=string, i=integer, d=double, b=blob)
     * @param array $params - Array of parameters
     * @return mysqli_stmt|false
     */
    public function prepareAndExecute($sql, $types = '', $params = []) {
        $stmt = $this->connection->prepare($sql);
        
        if ($stmt === false) {
            return false;
        }
        
        if (!empty($types) && !empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        
        $stmt->execute();
        return $stmt;
    }
    
    /**
     * Get last inserted ID
     * @return int
     */
    public function getLastInsertId() {
        return $this->connection->insert_id;
    }
    
    /**
     * Escape string for safe SQL queries
     * @param string $string
     * @return string
     */
    public function escapeString($string) {
        return $this->connection->real_escape_string($string);
    }
    
    /**
     * Close database connection
     */
    public function close() {
        if ($this->connection) {
            $this->connection->close();
        }
    }
    
    /**
     * Prevent cloning of instance
     */
    private function __clone() {}
    
    /**
     * Destructor - Close connection
     */
    public function __destruct() {
        $this->close();
    }
}
?>
