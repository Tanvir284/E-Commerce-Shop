<?php
// Debug: Check environment variables
header('Content-Type: application/json');

echo json_encode([
    'ENV' => $_ENV,
    'MYSQLHOST_env' => getenv('MYSQLHOST'),
    'MYSQLHOST_SERVER' => $_SERVER['MYSQLHOST'] ?? null,
    'all_getenv' => getenv()
], JSON_PRETTY_PRINT);
?>
