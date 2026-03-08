<?php
/**
 * Checkout API - MOCKED for UI Testing
 * Handles order placement
 */

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 0);

session_start();

// Initialize mock orders in session if not exists
if (!isset($_SESSION['mock_orders'])) {
    $_SESSION['mock_orders'] = [];
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Please login to checkout',
        'redirect' => 'login.html'
    ]);
    exit();
}

$userId = $_SESSION['user_id'];
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'place':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid request method']);
            break;
        }
        
        try {
            // Get mock cart items
            $cartItems = isset($_SESSION['mock_cart']) ? $_SESSION['mock_cart'] : [];
            
            if (empty($cartItems)) {
                echo json_encode(['success' => false, 'message' => 'Your cart is empty']);
                break;
            }
            
            // Get form data
            $fullName = isset($_POST['fullName']) ? trim($_POST['fullName']) : '';
            $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $address = isset($_POST['address']) ? trim($_POST['address']) : '';
            $city = isset($_POST['city']) ? trim($_POST['city']) : '';
            $zip = isset($_POST['zip']) ? trim($_POST['zip']) : '';
            $paymentMethod = isset($_POST['payment']) ? $_POST['payment'] : 'Cash on Delivery';
            
            if (empty($address) || empty($fullName) || empty($phone) || empty($email) || empty($city)) {
                echo json_encode(['success' => false, 'message' => 'Please fill in all required fields']);
                break;
            }
            
            // Calculate total from mock cart
            $totalAmount = 0;
            foreach ($cartItems as $item) {
                $totalAmount += $item['price'] * $item['quantity'];
            }
            
            // Mock Order creation
            $orderId = 'ORD-' . time();
            $_SESSION['mock_orders'][] = [
                'order_id' => $orderId,
                'user_id' => $userId,
                'total_amount' => $totalAmount,
                'status' => 'Pending',
                'payment_method' => $paymentMethod,
                'items' => $cartItems,
                'date' => date('Y-m-d H:i:s')
            ];
            
            // Clear mock cart after successful order
            $_SESSION['mock_cart'] = [];
            
            echo json_encode([
                'success' => true,
                'order_id' => $orderId,
                'message' => 'Order placed successfully!'
            ]);
        } catch (Exception $e) {
            echo json_encode([
                'success' => false,
                'message' => 'Order failed: ' . $e->getMessage()
            ]);
        }
        break;
        
    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
}
?>

