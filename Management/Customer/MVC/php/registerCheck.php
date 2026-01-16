<?php
/**
 * Registration Controller
 * Handles customer registration form submission
 */

session_start();

// Include the User Model
require_once __DIR__ . '/../db/userModel.php';

// Only process POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../html/register.html?error=invalid_request");
    exit();
}

// Get form data
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$confirmPassword = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : null;

// Validation
$errors = [];

// Name validation
if (empty($name)) {
    $errors[] = 'Name is required';
} elseif (strlen($name) < 2) {
    $errors[] = 'Name must be at least 2 characters';
}

// Email validation
if (empty($email)) {
    $errors[] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address';
}

// Password validation
if (empty($password)) {
    $errors[] = 'Password is required';
} elseif (strlen($password) < 6) {
    $errors[] = 'Password must be at least 6 characters';
}

// Confirm password
if ($password !== $confirmPassword) {
    $errors[] = 'Passwords do not match';
}

// If validation errors exist, redirect back with errors
if (!empty($errors)) {
    $_SESSION['register_errors'] = $errors;
    $_SESSION['register_data'] = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone
    ];
    header("Location: ../html/register.html?error=validation");
    exit();
}

// Create User Model instance and attempt registration
try {
    $userModel = new UserModel();
    $result = $userModel->registerUser($name, $email, $password, $phone);
    
    if ($result['success']) {
        // Clear any session data
        unset($_SESSION['register_errors']);
        unset($_SESSION['register_data']);
        
        // Set success message
        $_SESSION['success_message'] = $result['message'];
        
        // Redirect to login page
        header("Location: ../html/login.html?registered=1");
        exit();
    } else {
        // Registration failed (likely duplicate email)
        $_SESSION['register_errors'] = [$result['message']];
        $_SESSION['register_data'] = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        ];
        header("Location: ../html/register.html?error=registration");
        exit();
    }
} catch (Exception $e) {
    // Database or other error
    $_SESSION['register_errors'] = ['An unexpected error occurred. Please try again.'];
    header("Location: ../html/register.html?error=server");
    exit();
}
?>
