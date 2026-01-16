<?php
/**
 * Product Image Generator
 * Creates colorful placeholder images for 200 products
 */

$imageDir = __DIR__ . '/Management/Admin/MVC/images/';

if (!file_exists($imageDir)) {
    mkdir($imageDir, 0777, true);
}

$categories = [
    'smartphone' => ['📱', [99, 102, 241]],
    'laptop' => ['💻', [139, 92, 246]],
    'headphone' => ['🎧', [236, 72, 153]],
    'watch' => ['⌚', [16, 185, 129]],
    'camera' => ['📷', [245, 158, 11]],
    'tv' => ['📺', [59, 130, 246]],
    'appliance' => ['🏠', [168, 85, 247]],
    'men' => ['👔', [34, 211, 238]],
    'women' => ['👗', [251, 146, 60]],
    'shoe' => ['👟', [74, 222, 128]],
    'gaming' => ['🎮', [244, 63, 94]],
    'book' => ['📚', [147, 51, 234]],
    'beauty' => ['💄', [249, 115, 22]],
    'fitness' => ['💪', [34, 197, 94]],
    'baby' => ['👶', [251, 191, 36]],
    'pet' => ['🐕', [129, 140, 248]],
    'stationery' => ['✏️', [192, 132, 252]],
    'jewelry' => ['💎', [253, 186, 116]],
    'bag' => ['👜', [103, 232, 249]],
    'sports' => ['⚽', [134, 239, 172]],
    'kitchen' => ['🍳', [253, 224, 71]],
    'furniture' => ['🪑', [216, 180, 254]],
    'auto' => ['🚗', [110, 231, 183]],
    'grocery' => ['🛒', [254, 202, 202]],
    'decor' => ['🏡', [191, 219, 254]]
];

$count = 0;

foreach ($categories as $cat => $data) {
    list($emoji, $color) = $data;
    
    for ($i = 1; $i <= 8; $i++) {
        $filename = "{$cat}_{$i}.jpg";
        $filepath = $imageDir . $filename;
        
        // Create 400x400 image
        $img = imagecreatetruecolor(400, 400);
        
        // Gradient background
        $r = $color[0];
        $g = $color[1];
        $b = $color[2];
        
        for ($y = 0; $y < 400; $y++) {
            $ratio = $y / 400;
            $cr = (int)($r * (1 - $ratio * 0.3));
            $cg = (int)($g * (1 - $ratio * 0.3));
            $cb = (int)($b * (1 - $ratio * 0.3));
            $lineColor = imagecolorallocate($img, $cr, $cg, $cb);
            imageline($img, 0, $y, 400, $y, $lineColor);
        }
        
        // White overlay circle
        $white = imagecolorallocate($img, 255, 255, 255);
        imagefilledellipse($img, 200, 180, 150, 150, $white);
        
        // Category text
        $textColor = imagecolorallocate($img, $r, $g, $b);
        $text = strtoupper($cat);
        $textWidth = strlen($text) * 9;
        imagestring($img, 5, (400 - $textWidth) / 2, 280, $text, $textColor);
        
        // Product number
        $numText = "#" . $i;
        imagestring($img, 4, 185, 310, $numText, $textColor);
        
        imagejpeg($img, $filepath, 95);
        imagedestroy($img);
        
        $count++;
    }
    echo "Created 8 images for: $cat\n";
}

echo "\n=== Complete! $count images created ===\n";
?>
