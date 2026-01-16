<?php
/**
 * Cart API
 * AJAX API for cart operations (no page reload)
 */

header('Content-Type: application/json');
session_start();

require_once __DIR__ . '/../db/cartModel.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Please login to manage your cart',
        'redirect' => 'login.html'
    ]);
    exit();
}

$userId = $_SESSION['user_id'];
$cartModel = new CartModel();
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid request']);
            break;
        }
        
        $productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
        
        $result = $cartModel->addToCart($userId, $productId, $quantity);
        echo json_encode($result);
        break;
        
    case 'update':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid request']);
            break;
        }
        
        $productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;
        
        $result = $cartModel->updateQuantity($userId, $productId, $quantity);
        echo json_encode($result);
        break;
        
    case 'remove':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid request']);
            break;
        }
        
        $productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
        $result = $cartModel->removeFromCart($userId, $productId);
        echo json_encode($result);
        break;
        
    case 'get':
        $items = $cartModel->getCartItems($userId);
        $total = $cartModel->getCartTotal($userId);
        $count = $cartModel->getCartCount($userId);
        
        echo json_encode([
            'success' => true,
            'items' => $items,
            'total' => $total,
            'count' => $count
        ]);
        break;
        
    case 'count':
        $count = $cartModel->getCartCount($userId);
        echo json_encode(['success' => true, 'count' => $count]);
        break;
        
    case 'clear':
        $success = $cartModel->clearCart($userId);
        echo json_encode([
            'success' => $success,
            'message' => $success ? 'Cart cleared' : 'Failed to clear cart'
        ]);
        break;
        
    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
}
?>
