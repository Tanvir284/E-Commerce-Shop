<?php
/**
 * Create Admin User for Railway
 */

// Railway Connection
$host = 'shuttle.proxy.rlwy.net';
$port = 45723;
$user = 'root';
$password = 'HgjaKBquYftmzkOagsOvtEUSCkuWeDvK';
$database = 'railway';

echo "Creating admin user...\n";

$conn = new mysqli($host, $user, $password, $database, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create admin user with password: admin123
// The hash is for 'admin123' using password_hash with PASSWORD_DEFAULT
$hashedPassword = password_hash('admin123', PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, password, role) VALUES ('Admin', 'admin@ecommerce.com', ?, 'admin') 
        ON DUPLICATE KEY UPDATE password = ?, role = 'admin'";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $hashedPassword, $hashedPassword);

if ($stmt->execute()) {
    echo "✓ Admin user created/updated successfully!\n";
    echo "Email: admin@ecommerce.com\n";
    echo "Password: admin123\n";
} else {
    echo "Error: " . $conn->error . "\n";
}

// Verify
$result = $conn->query("SELECT id, name, email, role FROM users WHERE role = 'admin'");
if ($result && $row = $result->fetch_assoc()) {
    echo "\nAdmin user verified:\n";
    print_r($row);
}

$conn->close();
?>
