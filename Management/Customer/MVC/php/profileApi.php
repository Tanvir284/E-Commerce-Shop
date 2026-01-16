<?php
/**
 * Profile API
 * Handles user profile operations
 */

header('Content-Type: application/json');
require_once __DIR__ . '/../db/userModel.php';

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

$userModel = new UserModel();
$userId = $_SESSION['user_id'];
$action = $_GET['action'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($action === 'get_profile') {
        $user = $userModel->getUserById($userId);
        if ($user) {
            sendResponse(true, 'Profile data retrieved', $user);
        } else {
            sendResponse(false, 'User not found.');
        }
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
        
        if ($userModel->updateProfile($userId, $name, $phone, $address)) {
            // Update session name if changed
            $_SESSION['user_name'] = $name;
            sendResponse(true, 'Profile updated successfully.');
        } else {
            sendResponse(false, 'Failed to update profile.');
        }
    } elseif ($action === 'change_password') {
        $currentPassword = $input['current_password'] ?? '';
        $newPassword = $input['new_password'] ?? '';
        
        if (empty($currentPassword) || empty($newPassword)) {
            sendResponse(false, 'Both current and new passwords are required.');
        }
        
        // Use verifyLogin logic to check current password
        // We need the email for verifyLogin, so let's get it first
        $userProfile = $userModel->getUserById($userId);
        if (!$userProfile) {
            sendResponse(false, 'User not found.');
        }
        
        $loginResult = $userModel->verifyLogin($userProfile['email'], $currentPassword);
        
        if (!$loginResult['success']) {
            sendResponse(false, 'Incorrect current password.');
        }
        
        if ($userModel->changePassword($userId, $newPassword)) {
            sendResponse(true, 'Password changed successfully.');
        } else {
            sendResponse(false, 'Failed to change password.');
        }
    } elseif ($action === 'logout') {
        session_unset();
        session_destroy();
        sendResponse(true, 'Logged out successfully.');
    }
}

sendResponse(false, 'Invalid action.');
?>
