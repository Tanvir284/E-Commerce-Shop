<?php
/**
 * Orders API
 * JSON API for order operations
 */

header('Content-Type: application/json');
session_start();

require_once __DIR__ . '/../db/orderModel.php';

$orderModel = new OrderModel();
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

switch ($action) {
    case 'list':
        $status = isset($_GET['status']) ? $_GET['status'] : null;
        $orders = $orderModel->getAllOrders($status);
        echo json_encode(['success' => true, 'orders' => $orders]);
        break;
        
    case 'get':
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $order = $orderModel->getOrderById($id);
        if ($order) {
            echo json_encode(['success' => true, 'order' => $order]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Order not found']);
        }
        break;
        
    case 'updateStatus':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid request']);
            break;
        }
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        $status = isset($_POST['status']) ? $_POST['status'] : '';
        
        $result = $orderModel->updateOrderStatus($id, $status);
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Status updated']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update']);
        }
        break;
        
    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
}
?>
