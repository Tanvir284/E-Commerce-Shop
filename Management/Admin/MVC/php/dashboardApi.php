<?php
/**
 * Admin Dashboard API
 * Returns JSON data for dashboard stats
 */

header('Content-Type: application/json');
session_start();

require_once __DIR__ . '/../db/orderModel.php';
require_once __DIR__ . '/../db/productModel.php';

try {
    $orderModel = new OrderModel();
    $productModel = new ProductModel();
    
    // Get stats
    $stats = $orderModel->getDashboardStats();
    
    // Get recent orders
    $recentOrders = $orderModel->getRecentOrders(5);
    
    // Get low stock products
    $allProducts = $productModel->getAllProducts();
    $lowStock = array_filter($allProducts, function($p) {
        return $p['stock'] < 10;
    });
    
    echo json_encode([
        'success' => true,
        'stats' => $stats,
        'recent_orders' => $recentOrders,
        'low_stock_count' => count($lowStock)
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error fetching dashboard data'
    ]);
}
?>
