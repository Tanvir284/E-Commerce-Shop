<?php
/**
 * Product Image Downloader
 * Downloads placeholder images for 200 products across 25 categories
 * Uses Unsplash API for realistic product images
 */

// Set target directory
$imageDir = __DIR__ . '/Management/Admin/MVC/images/';

// Create directory if not exists
if (!file_exists($imageDir)) {
    mkdir($imageDir, 0777, true);
}

// Categories with search terms for realistic images
$categories = [
    'smartphone' => 8,
    'laptop' => 8,
    'headphone' => 8,
    'watch' => 8,
    'camera' => 8,
    'tv' => 8,
    'appliance' => 8,
    'men' => 8,
    'women' => 8,
    'shoe' => 8,
    'gaming' => 8,
    'book' => 8,
    'beauty' => 8,
    'fitness' => 8,
    'baby' => 8,
    'pet' => 8,
    'stationery' => 8,
    'jewelry' => 8,
    'bag' => 8,
    'sports' => 8,
    'kitchen' => 8,
    'furniture' => 8,
    'auto' => 8,
    'grocery' => 8,
    'decor' => 8
];

$count = 0;
$errors = 0;

echo "Starting image download...\n";
echo "Target directory: $imageDir\n\n";

foreach ($categories as $category => $numImages) {
    for ($i = 1; $i <= $numImages; $i++) {
        $filename = "{$category}_{$i}.jpg";
        $filepath = $imageDir . $filename;
        
        // Skip if already exists
        if (file_exists($filepath)) {
            echo "✓ Skipped: $filename (exists)\n";
            continue;
        }
        
        // Use picsum.photos for realistic placeholder images
        // Each image gets unique ID based on category and number
        $imageId = crc32($category . $i) % 1000 + 1;
        $url = "https://picsum.photos/id/{$imageId}/400/400";
        
        // Download image
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $imageData = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode == 200 && $imageData) {
            file_put_contents($filepath, $imageData);
            echo "✓ Downloaded: $filename\n";
            $count++;
        } else {
            // Fallback: create a colored placeholder
            $img = imagecreatetruecolor(400, 400);
            $colors = [
                imagecolorallocate($img, 99, 102, 241),   // Indigo
                imagecolorallocate($img, 139, 92, 246),  // Purple
                imagecolorallocate($img, 236, 72, 153),  // Pink
                imagecolorallocate($img, 16, 185, 129),  // Green
                imagecolorallocate($img, 245, 158, 11),  // Amber
            ];
            $bgColor = $colors[array_rand($colors)];
            imagefill($img, 0, 0, $bgColor);
            
            // Add text
            $white = imagecolorallocate($img, 255, 255, 255);
            $text = strtoupper($category);
            imagestring($img, 5, 400/2 - strlen($text)*4, 190, $text, $white);
            
            imagejpeg($img, $filepath, 90);
            imagedestroy($img);
            echo "○ Created placeholder: $filename\n";
            $count++;
        }
        
        // Small delay to be nice to the server
        usleep(100000); // 0.1 second
    }
}

echo "\n" . str_repeat("=", 50) . "\n";
echo "Download complete!\n";
echo "Total images: $count\n";
echo "Directory: $imageDir\n";
?>
