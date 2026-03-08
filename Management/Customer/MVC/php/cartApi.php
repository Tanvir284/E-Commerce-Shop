<?php
/**
 * Cart API - MOCKED for UI Testing
 * AJAX API for cart operations (no page reload)
 */

header('Content-Type: application/json');
session_start();

// Initialize mock cart in session if not exists
if (!isset($_SESSION['mock_cart'])) {
    $_SESSION['mock_cart'] = [];
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Please login to manage your cart',
        'redirect' => 'login.html'
    ]);
    exit();
}

$action = isset($_GET['action']) ? $_GET['action'] : '';

// Function to calculate cart total
function getCartTotal() {
    $total = 0;
    foreach ($_SESSION['mock_cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

// Function to get active cart count
function getCartCount() {
    $count = 0;
    foreach ($_SESSION['mock_cart'] as $item) {
        $count += $item['quantity'];
    }
    return $count;
}

switch ($action) {
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid request']);
            break;
        }
        
        $productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
        
        $found = false;
        foreach ($_SESSION['mock_cart'] as &$item) {
            if ($item['product_id'] === $productId) {
                $item['quantity'] += $quantity;
                $found = true;
                break;
            }
        }
        
        if (!$found) {
            $_SESSION['mock_cart'][] = [
                'cart_id' => count($_SESSION['mock_cart']) + 1,
                'product_id' => $productId,
                'quantity' => $quantity,
                'name' => 'Mock Product ' . $productId,
                'price' => 199.99, // Static price for mock
                'image' => 'https://via.placeholder.com/150'
            ];
        }
        
        echo json_encode([
            'success' => true,
            'message' => 'Added to cart successfully',
            'cart_count' => getCartCount()
        ]);
        break;
        
    case 'update':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid request']);
            break;
        }
        
        $productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;
        
        if ($quantity <= 0) {
            // Remove functionality delegated to remove case natively or handled here
            foreach ($_SESSION['mock_cart'] as $key => $item) {
                if ($item['product_id'] === $productId) {
                    unset($_SESSION['mock_cart'][$key]);
                    break;
                }
            }
            $_SESSION['mock_cart'] = array_values($_SESSION['mock_cart']);
        } else {
            foreach ($_SESSION['mock_cart'] as &$item) {
                if ($item['product_id'] === $productId) {
                    $item['quantity'] = $quantity;
                    break;
                }
            }
        }
        
        echo json_encode([
            'success' => true,
            'message' => 'Cart updated successfully',
            'cart_count' => getCartCount(),
            'cart_total' => getCartTotal()
        ]);
        break;
        
    case 'remove':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid request']);
            break;
        }
        
        $productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
        foreach ($_SESSION['mock_cart'] as $key => $item) {
            if ($item['product_id'] === $productId) {
                unset($_SESSION['mock_cart'][$key]);
                break;
            }
        }
        $_SESSION['mock_cart'] = array_values($_SESSION['mock_cart']);
        
        echo json_encode([
            'success' => true,
            'message' => 'Item removed from cart',
            'cart_count' => getCartCount(),
            'cart_total' => getCartTotal()
        ]);
        break;
        
    case 'get':
        echo json_encode([
            'success' => true,
            'items' => $_SESSION['mock_cart'],
            'total' => getCartTotal(),
            'count' => getCartCount()
        ]);
        break;
        
    case 'count':
        echo json_encode(['success' => true, 'count' => getCartCount()]);
        break;
        
    case 'clear':
        $_SESSION['mock_cart'] = [];
        echo json_encode([
            'success' => true,
            'message' => 'Cart cleared'
        ]);
        break;
        
    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
}
?>
