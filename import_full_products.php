<?php
/**
 * Railway Full Product Import Script
 * Reads products_200.sql and imports everything
 */

header('Content-Type: text/plain');

// Railway Connection
$host = 'mysql.railway.internal';
$user = 'root';
$password = 'HgjaKBquYftmzkOagsOvtEUSCkuWeDvK';
$database = 'railway';
$port = 3306;

// Local fallback
if (!getenv('RAILWAY_ENVIRONMENT')) {
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'ecommerce_db';
}

echo "=== FULL PRODUCT IMPORT ===\n\n";

$conn = new mysqli($host, $user, $password, $database, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure utf8mb4
$conn->set_charset("utf8mb4");

echo "✓ Connected to database: $database\n";

// File to import
$file = 'products_200.sql';

if (!file_exists($file)) {
    die("✗ Error: $file not found in " . getcwd());
}

echo "✓ Found $file (" . filesize($file) . " bytes)\n\n";

// Read file
$sql = file_get_contents($file);

// Pre-process: Remove comments
$sql = preg_replace('/^--.*$/m', '', $sql);
$sql = preg_replace('/^\s*$/m', '', $sql);

// Specific fix for Railway: Remove "USE ecommerce_db;"
$sql = str_replace('USE ecommerce_db;', '', $sql);

// Execute Multi Query
if ($conn->multi_query($sql)) {
    $i = 0;
    do {
        $i++;
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->next_result());
    
    if ($conn->errno) {
        echo "✗ Error during execution: " . $conn->error . "\n";
    } else {
        echo "✓ Successfully executed SQL commands!\n";
    }
} else {
    echo "✗ Error initiating multi_query: " . $conn->error . "\n";
}

// Verification
echo "\n=== VERIFICATION ===\n";
$tables = ['products', 'users', 'categories'];

foreach ($tables as $table) {
    $res = $conn->query("SELECT COUNT(*) as c FROM $table");
    if ($res) {
        $row = $res->fetch_assoc();
        echo str_pad($table, 15) . ": " . $row['c'] . " rows\n";
    }
}

$conn->close();
?>
