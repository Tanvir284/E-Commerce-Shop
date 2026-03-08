<?php
/**
 * Admin Dashboard API - MOCKED for UI Testing
 * Returns JSON data for dashboard stats
 */

header('Content-Type: application/json');
session_start();

try {
    $stats = [
        'total_revenue' => 150000.00,
        'total_orders' => 120,
        'total_products' => 200,
        'total_customers' => 45
    ];
    
    $recentOrders = [
        ['order_id' => 'ORD-1001', 'customer_name' => 'John Doe', 'total_amount' => 5400, 'date' => date('Y-m-d H:i:s'), 'status' => 'Pending'],
        ['order_id' => 'ORD-1002', 'customer_name' => 'Jane Smith', 'total_amount' => 12000, 'date' => date('Y-m-d H:i:s', strtotime('-1 day')), 'status' => 'Completed']
    ];
    
    // Check session mock orders
    if (isset($_SESSION['mock_orders'])) {
        $recentOrders = array_slice($_SESSION['mock_orders'], 0, 5);
        $totalRev = 0;
        foreach($_SESSION['mock_orders'] as $mo) {
            $totalRev += $mo['total_amount'];
        }
        $stats['total_orders'] = count($_SESSION['mock_orders']);
        $stats['total_revenue'] = $totalRev;
    }
    
    echo json_encode([
        'success' => true,
        'stats' => $stats,
        'recent_orders' => $recentOrders,
        'low_stock_count' => 12
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error fetching dashboard data'
    ]);
}
?>
