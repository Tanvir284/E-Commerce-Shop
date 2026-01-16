<?php
/**
 * Users API
 * JSON API for user management
 */

header('Content-Type: application/json');
session_start();

require_once __DIR__ . '/../db/userModel.php';

$userModel = new UserModel();
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

switch ($action) {
    case 'list':
        $users = $userModel->getAllUsers();
        echo json_encode(['success' => true, 'users' => $users]);
        break;
        
    case 'delete':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid request']);
            break;
        }
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        $result = $userModel->deleteUser($id);
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'User deleted']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete']);
        }
        break;
        
    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
}
?>
