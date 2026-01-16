<?php
/**
 * Products API
 * JSON API for product operations
 */

header('Content-Type: application/json');
session_start();

require_once __DIR__ . '/../db/productModel.php';

$productModel = new ProductModel();
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

switch ($action) {
    case 'list':
        $products = $productModel->getAllProducts();
        echo json_encode(['success' => true, 'products' => $products]);
        break;
        
    case 'get':
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $product = $productModel->getProductById($id);
        if ($product) {
            echo json_encode(['success' => true, 'product' => $product]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Product not found']);
        }
        break;
        
    case 'delete':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid request']);
            break;
        }
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        $result = $productModel->deleteProduct($id);
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Product deleted']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete']);
        }
        break;
        
    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
}
?>
