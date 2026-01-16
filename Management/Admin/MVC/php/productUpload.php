<?php
/**
 * Product Upload Controller
 * Handles product creation with image upload
 */

session_start();

// Include the Product Model
require_once __DIR__ . '/../db/productModel.php';

// Only process POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../html/addProduct.html?error=invalid_request");
    exit();
}

// Get form data
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$description = isset($_POST['description']) ? trim($_POST['description']) : '';
$price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
$stock = isset($_POST['stock']) ? intval($_POST['stock']) : 0;
$category = isset($_POST['category']) ? trim($_POST['category']) : 'General';

// Validation
$errors = [];

if (empty($name)) {
    $errors[] = 'Product name is required';
}

if ($price <= 0) {
    $errors[] = 'Price must be greater than 0';
}

if ($stock < 0) {
    $errors[] = 'Stock cannot be negative';
}

// Image upload handling
$imageName = 'default.jpg';

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $maxSize = 5 * 1024 * 1024; // 5MB
    
    $fileType = $_FILES['image']['type'];
    $fileSize = $_FILES['image']['size'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $originalName = $_FILES['image']['name'];
    
    // Validate file type
    if (!in_array($fileType, $allowedTypes)) {
        $errors[] = 'Invalid image type. Allowed: JPG, PNG, GIF, WEBP';
    }
    
    // Validate file size
    if ($fileSize > $maxSize) {
        $errors[] = 'Image size must be less than 5MB';
    }
    
    if (empty($errors)) {
        // Generate unique filename
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        $imageName = 'product_' . time() . '_' . uniqid() . '.' . $extension;
        
        // Upload directory
        $uploadDir = __DIR__ . '/../images/';
        
        // Create directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        $uploadPath = $uploadDir . $imageName;
        
        // Move uploaded file
        if (!move_uploaded_file($fileTmpName, $uploadPath)) {
            $errors[] = 'Failed to upload image. Please try again.';
            $imageName = 'default.jpg';
        }
    }
}

// If validation errors exist, redirect back with errors
if (!empty($errors)) {
    $_SESSION['product_errors'] = $errors;
    $_SESSION['product_data'] = [
        'name' => $name,
        'description' => $description,
        'price' => $price,
        'stock' => $stock,
        'category' => $category
    ];
    header("Location: ../html/addProduct.html?error=validation");
    exit();
}

// Create Product Model instance and insert product
try {
    $productModel = new ProductModel();
    $result = $productModel->insertProduct($name, $description, $price, $imageName, $stock, $category);
    
    if ($result['success']) {
        // Clear session data
        unset($_SESSION['product_errors']);
        unset($_SESSION['product_data']);
        
        // Set success message
        $_SESSION['success_message'] = $result['message'];
        
        // Redirect to product list or add another
        header("Location: ../html/addProduct.html?success=1");
        exit();
    } else {
        // Database insertion failed
        $_SESSION['product_errors'] = [$result['message']];
        $_SESSION['product_data'] = [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'stock' => $stock,
            'category' => $category
        ];
        
        // Delete uploaded image if db insert failed
        if ($imageName !== 'default.jpg') {
            $imagePath = __DIR__ . '/../images/' . $imageName;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        header("Location: ../html/addProduct.html?error=database");
        exit();
    }
} catch (Exception $e) {
    $_SESSION['product_errors'] = ['An unexpected error occurred. Please try again.'];
    header("Location: ../html/addProduct.html?error=server");
    exit();
}
?>
