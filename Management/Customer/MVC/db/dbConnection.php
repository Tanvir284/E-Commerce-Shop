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
    
    // Database Configuration - Uses Railway env vars with localhost fallback
    private $host;
    private $username;
    private $password;
    private $database;
    private $port;
    
    /**
     * Private constructor - Singleton pattern
     */
    private function __construct() {
        // Detect hosting environment
        $isRailway = isset($_ENV['RAILWAY_ENVIRONMENT']) || getenv('RAILWAY_ENVIRONMENT');
        $isInfinityFree = (strpos($_SERVER['HTTP_HOST'] ?? '', 'infinityfreeapp.com') !== false) 
                       || (strpos($_SERVER['HTTP_HOST'] ?? '', 'epizy.com') !== false)
                       || file_exists('/home/vol') // InfinityFree server path indicator
                       || (strpos(gethostname() ?? '', 'ifastnet') !== false);
        
        if ($isRailway) {
            // Railway internal MySQL connection
            $this->host = 'mysql.railway.internal';
            $this->username = 'root';
            $this->password = 'HgjaKBquYftmzkOagsOvtEUSCkuWeDvK';
            $this->database = 'railway';
            $this->port = 3306;
        } elseif ($isInfinityFree) {
            // InfinityFree hosting - UPDATE THESE after creating DB in control panel
            $this->host = 'sql300.infinityfree.com';        // Check your control panel for exact host
            $this->username = 'if0_YOUR_USERNAME';           // Your InfinityFree DB username
            $this->password = 'YOUR_DB_PASSWORD';            // Your InfinityFree DB password
            $this->database = 'if0_YOUR_USERNAME_ecommerce'; // Your InfinityFree DB name
            $this->port = 3306;
        } else {
            // Local development (XAMPP)
            $this->host = '127.0.0.1';
            $this->username = 'root';
            $this->password = '';
            $this->database = 'ecommerce_db';
            $this->port = 3306;
        }
        
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
