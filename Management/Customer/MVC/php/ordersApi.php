<?php
/**
 * Orders API for Customer - MOCKED for UI Testing
 * Get customer orders
 */

header('Content-Type: application/json');
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Please login to view orders',
        'redirect' => 'login.html'
    ]);
    exit();
}

$action = isset($_GET['action']) ? $_GET['action'] : 'list';

switch ($action) {
    case 'list':
        $orders = isset($_SESSION['mock_orders']) ? $_SESSION['mock_orders'] : [];
        // Sort reverse chronological
        usort($orders, function($a, $b) {
            return strtotime($b['date']) - strtotime($a['date']);
        });
        echo json_encode(['success' => true, 'orders' => $orders]);
        break;
        
    case 'get':
        $orderId = isset($_GET['id']) ? $_GET['id'] : '';
        $order = null;
        if (isset($_SESSION['mock_orders'])) {
            foreach ($_SESSION['mock_orders'] as $mo) {
                if ($mo['order_id'] === $orderId) {
                    $order = $mo;
                    break;
                }
            }
        }
        
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
