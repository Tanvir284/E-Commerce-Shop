<?php
/**
 * Login Controller
 * Handles customer login authentication
 */

session_start();

// Include the User Model
require_once __DIR__ . '/../db/userModel.php';

// Only process POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../html/login.html?error=invalid_request");
    exit();
}

// Get form data
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Validation
$errors = [];

if (empty($email)) {
    $errors[] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address';
}

if (empty($password)) {
    $errors[] = 'Password is required';
}

// If validation errors, redirect back
if (!empty($errors)) {
    $_SESSION['login_errors'] = $errors;
    header("Location: ../html/login.html?error=validation");
    exit();
}

// Attempt login - MOCK FOR UI TESTING
try {
    // Hardcoded mock user to bypass DB connection error for testing
    $mockUser = null;
    $success = false;
    $message = '';

    if ($email === 'test@example.com' && $password === 'password') {
        $success = true;
        $mockUser = [
            'id' => 1,
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'customer'
        ];
    } elseif ($email === 'admin@example.com' && $password === 'admin') {
        $success = true;
        $mockUser = [
            'id' => 2,
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin'
        ];
    } else {
        $success = false;
        $message = 'Invalid email or password (Mock data requires test@example.com / password)';
    }

    if ($success) {
        // Clear errors
        unset($_SESSION['login_errors']);
        
        // Store user data in session
        $_SESSION['user_id'] = $mockUser['id'];
        $_SESSION['user_name'] = $mockUser['name'];
        $_SESSION['user_email'] = $mockUser['email'];
        $_SESSION['user_role'] = $mockUser['role'];
        $_SESSION['logged_in'] = true;
        
        // Redirect based on role
        if ($mockUser['role'] === 'admin') {
            header("Location: /Management/Admin/MVC/html/dashboard.html");
        } else {
            header("Location: ../html/index.html");
        }
        exit();
    } else {
        $_SESSION['login_errors'] = [$message];
        header("Location: ../html/login.html?error=credentials");
        exit();
    }
} catch (Exception $e) {
    $_SESSION['login_errors'] = ['An unexpected error occurred. Please try again.'];
    header("Location: ../html/login.html?error=server");
    exit();
}
?>
