<?php
/**
 * Profile API - MOCKED for UI Testing
 * Handles user profile operations
 */

header('Content-Type: application/json');

session_start();

// Helper function to send JSON response
function sendResponse($success, $message, $data = null) {
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data
    ]);
    exit;
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    sendResponse(false, 'Unauthorized. Please login.');
}

$userId = $_SESSION['user_id'];
$action = $_GET['action'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($action === 'get_profile') {
        $user = [
            'id' => $userId,
            'name' => $_SESSION['user_name'] ?? 'Test User',
            'email' => $_SESSION['user_email'] ?? 'test@example.com',
            'phone' => $_SESSION['user_phone'] ?? '01712345678',
            'address' => $_SESSION['user_address'] ?? '123 Test Street, Dhaka'
        ];
        sendResponse(true, 'Profile data retrieved', $user);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    // For form-urlencoded POSTs (standard forms)
    if (!$input) {
        $input = $_POST;
    }
    
    // Check if action is in POST data if not in GET
    if (empty($action) && isset($input['action'])) {
        $action = $input['action'];
    }

    if ($action === 'update_profile') {
        $name = $input['name'] ?? '';
        $phone = $input['phone'] ?? '';
        $address = $input['address'] ?? '';
        
        if (empty($name)) {
            sendResponse(false, 'Name is required.');
        }
        
        // Update session name if changed
        $_SESSION['user_name'] = $name;
        $_SESSION['user_phone'] = $phone;
        $_SESSION['user_address'] = $address;
        sendResponse(true, 'Profile updated successfully.');
        
    } elseif ($action === 'change_password') {
        $currentPassword = $input['current_password'] ?? '';
        $newPassword = $input['new_password'] ?? '';
        
        if (empty($currentPassword) || empty($newPassword)) {
            sendResponse(false, 'Both current and new passwords are required.');
        }
        
        if ($currentPassword !== 'password') {
            sendResponse(false, 'Incorrect current password. (Mock uses "password")');
        }
        
        // Mock successful password change
        sendResponse(true, 'Password changed successfully.');
        
    } elseif ($action === 'logout') {
        session_unset();
        session_destroy();
        sendResponse(true, 'Logged out successfully.');
    }
}

sendResponse(false, 'Invalid action.');
?>
