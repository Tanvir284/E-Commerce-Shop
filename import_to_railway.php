<?php
/**
 * Railway Database Import Script - Simple Version
 */

$host = 'shuttle.proxy.rlwy.net';
$port = 45723;
$user = 'root';
$password = 'HgjaKBquYftmzkOagsOvtEUSCkuWeDvK';
$database = 'railway';

echo "Connecting to Railway MySQL...\n";

$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . "\n");
}

echo "Connected!\n\n";

// Create tables one by one
$tables = [
    "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        role ENUM('customer', 'admin') DEFAULT 'customer',
        phone VARCHAR(20) DEFAULT NULL,
        address TEXT DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )",
    
    "CREATE TABLE IF NOT EXISTS categories (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL UNIQUE,
        description TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )",
    
    "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        price DECIMAL(10, 2) NOT NULL,
        image VARCHAR(255) DEFAULT 'default.jpg',
        stock INT DEFAULT 0,
        category VARCHAR(100) DEFAULT 'General',
        status ENUM('active', 'inactive') DEFAULT 'active',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )",
    
    "CREATE TABLE IF NOT EXISTS orders (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        total_amount DECIMAL(10, 2) NOT NULL,
        status ENUM('pending', 'processing', 'shipped', 'delivered', 'cancelled') DEFAULT 'pending',
        shipping_address TEXT NOT NULL,
        payment_method VARCHAR(50) DEFAULT 'Cash on Delivery',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )",
    
    "CREATE TABLE IF NOT EXISTS order_details (
        id INT AUTO_INCREMENT PRIMARY KEY,
        order_id INT NOT NULL,
        product_id INT NOT NULL,
        quantity INT NOT NULL DEFAULT 1,
        price DECIMAL(10, 2) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )",
    
    "CREATE TABLE IF NOT EXISTS cart (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        product_id INT NOT NULL,
        quantity INT NOT NULL DEFAULT 1,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )",
    
    "CREATE TABLE IF NOT EXISTS wishlist (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        product_id INT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )"
];

echo "Creating tables...\n";
foreach ($tables as $i => $sql) {
    if ($conn->query($sql)) {
        echo "  Table " . ($i + 1) . " created.\n";
    } else {
        echo "  Error: " . $conn->error . "\n";
    }
}

// Insert admin user
echo "\nInserting admin user...\n";
$conn->query("INSERT IGNORE INTO users (name, email, password, role) VALUES ('Admin', 'admin@ecommerce.com', '\$2y\$10\$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin')");

// Insert categories
echo "Inserting categories...\n";
$conn->query("INSERT IGNORE INTO categories (name) VALUES ('Electronics'), ('Fashion'), ('Home & Living'), ('Sports'), ('Books')");

// Insert sample products
echo "Inserting sample products...\n";

$products = [
    ['name' => 'Wireless Headphones', 'price' => 2499, 'category' => 'Electronics', 'stock' => 50],
    ['name' => 'Smart Watch', 'price' => 4999, 'category' => 'Electronics', 'stock' => 30],
    ['name' => 'Running Shoes', 'price' => 3499, 'category' => 'Sports', 'stock' => 100],
    ['name' => 'Cotton T-Shirt', 'price' => 899, 'category' => 'Fashion', 'stock' => 200],
    ['name' => 'Coffee Maker', 'price' => 5999, 'category' => 'Home & Living', 'stock' => 25],
    ['name' => 'Programming Book', 'price' => 1299, 'category' => 'Books', 'stock' => 75],
    ['name' => 'Bluetooth Speaker', 'price' => 1999, 'category' => 'Electronics', 'stock' => 60],
    ['name' => 'Yoga Mat', 'price' => 1499, 'category' => 'Sports', 'stock' => 80],
    ['name' => 'Winter Jacket', 'price' => 4499, 'category' => 'Fashion', 'stock' => 40],
    ['name' => 'LED Desk Lamp', 'price' => 1799, 'category' => 'Home & Living', 'stock' => 90]
];

$inserted = 0;
foreach ($products as $p) {
    $sql = "INSERT IGNORE INTO products (name, price, category, stock, description, image) VALUES ('{$p['name']}', {$p['price']}, '{$p['category']}', {$p['stock']}, 'High quality product', 'product.jpg')";
    if ($conn->query($sql)) {
        $inserted++;
    }
}
echo "  Inserted $inserted products.\n";

// Show summary
echo "\n=== Summary ===\n";
$result = $conn->query("SELECT COUNT(*) as c FROM users");
echo "Users: " . $result->fetch_assoc()['c'] . "\n";

$result = $conn->query("SELECT COUNT(*) as c FROM products");
echo "Products: " . $result->fetch_assoc()['c'] . "\n";

$result = $conn->query("SELECT COUNT(*) as c FROM categories");
echo "Categories: " . $result->fetch_assoc()['c'] . "\n";

$conn->close();
echo "\nDone! Visit your site now.\n";
?>
