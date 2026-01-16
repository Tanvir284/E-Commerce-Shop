<?php
/**
 * Orders API for Customer
 * Get customer orders
 */

header('Content-Type: application/json');
session_start();

require_once __DIR__ . '/../db/orderModel.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Please login to view orders',
        'redirect' => 'login.html'
    ]);
    exit();
}

$userId = $_SESSION['user_id'];
$orderModel = new OrderModel();
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

switch ($action) {
    case 'list':
        $orders = $orderModel->getOrdersByUserId($userId);
        echo json_encode(['success' => true, 'orders' => $orders]);
        break;
        
    case 'get':
        $orderId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $order = $orderModel->getOrderById($orderId, $userId);
        
        if ($order) {
            echo json_encode(['success' => true, 'order' => $order]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Order not found']);
        }
        break;
        
    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
}
?>
