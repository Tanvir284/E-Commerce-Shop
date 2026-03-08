<?php
/**
 * Users API - MOCKED for UI Testing
 * JSON API for user management
 */

header('Content-Type: application/json');
session_start();

$action = isset($_GET['action']) ? $_GET['action'] : 'list';

switch ($action) {
    case 'list':
        $users = [
            ['id' => 1, 'name' => 'Admin User', 'email' => 'admin@example.com', 'role' => 'admin', 'created_at' => '2024-01-01'],
            ['id' => 2, 'name' => 'Test User', 'email' => 'test@example.com', 'role' => 'customer', 'created_at' => '2024-03-05']
        ];
        echo json_encode(['success' => true, 'users' => $users]);
        break;
        
    case 'delete':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid request']);
            break;
        }
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        echo json_encode(['success' => true, 'message' => 'User deleted (mocked)']);
        break;
        
    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
}
?>
