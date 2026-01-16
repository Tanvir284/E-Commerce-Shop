<?php
/**
 * Products API for Customer
 * JSON API for product listing and search
 */

header('Content-Type: application/json');

require_once __DIR__ . '/../db/productModel.php';

$productModel = new ProductModel();
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

switch ($action) {
    case 'list':
        $category = isset($_GET['category']) ? $_GET['category'] : null;
        
        if ($category && $category !== 'all') {
            $products = $productModel->getProductsByCategory($category);
        } else {
            $products = $productModel->getAllProducts();
        }
        
        echo json_encode(['success' => true, 'products' => $products]);
        break;
        
    case 'search':
        $keyword = isset($_GET['q']) ? $_GET['q'] : '';
        if (empty($keyword)) {
            echo json_encode(['success' => true, 'products' => []]);
        } else {
            $products = $productModel->searchProducts($keyword);
            echo json_encode(['success' => true, 'products' => $products]);
        }
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
        
    case 'categories':
        $categories = $productModel->getCategories();
        echo json_encode(['success' => true, 'categories' => $categories]);
        break;
        
    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
}
?>
