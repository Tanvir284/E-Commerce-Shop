<?php
$sql_file = 'c:\\Users\\MD Tanvir Islam\\Videos\\E-Commerece System\\products_200.sql';
$content = file_get_contents($sql_file);

// Match all the VALUES (...) blocks
preg_match_all("/\('(.*?)', '(.*?)', (\d+), (\d+), '(.*?)', '(.*?)'\)/", $content, $matches, PREG_SET_ORDER);

$php_array = "<?php\n/**\n * Products API - MOCKED with 200 Products\n */\n\nheader('Content-Type: application/json');\n\n\$mock_products = [\n";

$id = 1;
foreach ($matches as $m) {
    $name = addslashes($m[1]);
    $desc = addslashes($m[2]);
    $price = $m[3];
    $stock = $m[4];
    $category = addslashes($m[5]);
    $image = addslashes($m[6]);

    $php_array .= "    [\n";
    $php_array .= "        'id' => $id,\n";
    $php_array .= "        'name' => '$name',\n";
    $php_array .= "        'description' => '$desc',\n";
    $php_array .= "        'price' => $price,\n";
    $php_array .= "        'stock' => $stock,\n";
    $php_array .= "        'category' => '$category',\n";
    $php_array .= "        'image' => '$image'\n";
    $php_array .= "    ],\n";
    $id++;
}

$php_array .= "];\n\n";

$php_array .= <<<EOT
\$action = isset(\$_GET['action']) ? \$_GET['action'] : 'list';

if (\$action === 'list') {
    echo json_encode(['success' => true, 'products' => \$mock_products]);
} elseif (\$action === 'categories') {
    \$categories = array_values(array_unique(array_column(\$mock_products, 'category')));
    echo json_encode(['success' => true, 'categories' => \$categories]);
} elseif (\$action === 'search') {
    \$query = isset(\$_GET['q']) ? strtolower(trim(\$_GET['q'])) : '';
    \$results = [];
    foreach (\$mock_products as \$p) {
        if (strpos(strtolower(\$p['name']), \$query) !== false || 
            strpos(strtolower(\$p['category']), \$query) !== false) {
            \$results[] = \$p;
        }
    }
    echo json_encode(['success' => true, 'products' => \$results]);
} elseif (\$action === 'get') {
    \$id = isset(\$_GET['id']) ? (int)\$_GET['id'] : 0;
    \$product = null;
    foreach (\$mock_products as \$p) {
        if (\$p['id'] === \$id) {
            \$product = \$p;
            break;
        }
    }
    if (\$product) {
        echo json_encode(['success' => true, 'product' => \$product]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Product not found']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid action']);
}
?>
EOT;

file_put_contents('c:\\Users\\MD Tanvir Islam\\Videos\\E-Commerece System\\Management\\Customer\\MVC\\php\\productsApi.php', $php_array);
echo "Successfully wrote 200 products to mock API.\n";
?>
