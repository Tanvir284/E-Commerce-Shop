<?php
/**
 * Orders API - MOCKED for UI Testing
 * JSON API for order operations
 */

header('Content-Type: application/json');
session_start();

$action = isset($_GET['action']) ? $_GET['action'] : 'list';

switch ($action) {
    case 'list':
        $status = isset($_GET['status']) ? $_GET['status'] : null;
        $orders = isset($_SESSION['mock_orders']) ? $_SESSION['mock_orders'] : [];
        if ($status) {
            $orders = array_filter($orders, function($o) use ($status) {
                return $o['status'] === $status;
            });
            $orders = array_values($orders);
        }
        
        // Map fields for Admin panel
        $mappedOrders = array_map(function($o) {
            return [
                'id' => str_replace('ORD-', '', $o['order_id']),
                'customer_name' => $o['customer_name'] ?? 'Guest',
                'customer_email' => $o['customer_email'] ?? 'guest@example.com',
                'total_amount' => $o['total_amount'],
                'status' => $o['status'],
                'created_at' => $o['date'] ?? date('Y-m-d H:i:s')
            ];
        }, $orders);
        
        echo json_encode(['success' => true, 'orders' => $mappedOrders]);
        break;
        
    case 'get':
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $order = null;
        if (isset($_SESSION['mock_orders'])) {
            foreach ($_SESSION['mock_orders'] as $mo) {
                if ($mo['order_id'] == $id) {
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
        
    case 'updateStatus':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid request']);
            break;
        }
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : '';
        
        $updated = false;
        if (isset($_SESSION['mock_orders'])) {
            foreach ($_SESSION['mock_orders'] as &$mo) {
                if ($mo['order_id'] == $id) {
                    $mo['status'] = $status;
                    $updated = true;
                    break;
                }
            }
        }
        
        if ($updated) {
            echo json_encode(['success' => true, 'message' => 'Status updated']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update']);
        }
        break;
        
    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
}
?>
