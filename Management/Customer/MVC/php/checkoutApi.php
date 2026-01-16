<?php
/**
 * Checkout API
 * Handles order placement
 */

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 0);

session_start();

require_once __DIR__ . '/../db/cartModel.php';

// Use Customer's order model (has createOrder method)
require_once __DIR__ . '/../db/orderModel.php';

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
            // Get cart items
            $cartModel = new CartModel();
            $cartItems = $cartModel->getCartItems($userId);
            
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
            
            // Build shipping address
            $shippingAddress = $fullName . "\n" . $phone . "\n" . $address;
            if ($city) $shippingAddress .= ", " . $city;
            if ($zip) $shippingAddress .= " " . $zip;
            
            if (empty($address) || empty($fullName) || empty($phone)) {
                echo json_encode(['success' => false, 'message' => 'Please fill in all required fields']);
                break;
            }
            
            // Calculate total
            $totalAmount = $cartModel->getCartTotal($userId);
            
            // Prepare order items
            $orderItems = [];
            foreach ($cartItems as $item) {
                $orderItems[] = [
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ];
            }
            
            // Create order
            $orderModel = new OrderModel();
            $result = $orderModel->createOrder($userId, $totalAmount, $shippingAddress, $paymentMethod, $orderItems);
            
            if ($result['success']) {
                // Clear cart after successful order
                $cartModel->clearCart($userId);
            }
            
            echo json_encode($result);
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

