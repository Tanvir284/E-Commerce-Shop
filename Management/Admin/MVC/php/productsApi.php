<?php
/**
 * Products API - MOCKED for UI Testing
 */
header('Content-Type: application/json');
session_start();

$mock_products = [
    [
        'id' => 1,
        'name' => 'Samsung Galaxy S24 Ultra',
        'description' => '6.8\" Dynamic AMOLED, 200MP Camera, 12GB RAM',
        'price' => 159999,
        'stock' => 25,
        'category' => 'Smartphones',
        'image' => 'smartphone_1.jpg'
    ],
    [
        'id' => 2,
        'name' => 'iPhone 15 Pro Max',
        'description' => 'A17 Pro chip, Titanium design, 48MP Camera',
        'price' => 189999,
        'stock' => 20,
        'category' => 'Smartphones',
        'image' => 'smartphone_2.jpg'
    ],
    [
        'id' => 3,
        'name' => 'Xiaomi 14 Ultra',
        'description' => 'Leica optics, Snapdragon 8 Gen 3, 5000mAh',
        'price' => 89999,
        'stock' => 30,
        'category' => 'Smartphones',
        'image' => 'smartphone_3.jpg'
    ],
    [
        'id' => 4,
        'name' => 'OnePlus 12',
        'description' => 'Hasselblad Camera, 100W charging, 16GB RAM',
        'price' => 79999,
        'stock' => 35,
        'category' => 'Smartphones',
        'image' => 'smartphone_4.jpg'
    ],
    [
        'id' => 5,
        'name' => 'Realme GT 5 Pro',
        'description' => 'Snapdragon 8 Gen 3, 144Hz Display, 50MP',
        'price' => 54999,
        'stock' => 40,
        'category' => 'Smartphones',
        'image' => 'smartphone_5.jpg'
    ],
    [
        'id' => 6,
        'name' => 'Vivo X100 Pro',
        'description' => 'Zeiss Camera, Dimensity 9300, AMOLED',
        'price' => 74999,
        'stock' => 25,
        'category' => 'Smartphones',
        'image' => 'smartphone_6.jpg'
    ],
    [
        'id' => 7,
        'name' => 'OPPO Find X7',
        'description' => '50MP Triple Camera, 100W SuperVOOC',
        'price' => 69999,
        'stock' => 30,
        'category' => 'Smartphones',
        'image' => 'smartphone_7.jpg'
    ],
    [
        'id' => 8,
        'name' => 'Google Pixel 8 Pro',
        'description' => 'Tensor G3, Best Android Camera, 7 years updates',
        'price' => 109999,
        'stock' => 15,
        'category' => 'Smartphones',
        'image' => 'smartphone_8.jpg'
    ],
    [
        'id' => 9,
        'name' => 'Dell XPS 15',
        'description' => 'Intel i7, 16GB RAM, 512GB SSD, 4K OLED',
        'price' => 185000,
        'stock' => 10,
        'category' => 'Laptops',
        'image' => 'laptop_1.jpg'
    ],
    [
        'id' => 10,
        'name' => 'MacBook Air M3',
        'description' => 'Apple M3 chip, 15\" Liquid Retina, 18hr battery',
        'price' => 175000,
        'stock' => 12,
        'category' => 'Laptops',
        'image' => 'laptop_2.jpg'
    ],
    [
        'id' => 11,
        'name' => 'HP Pavilion 15',
        'description' => 'AMD Ryzen 7, 16GB RAM, 512GB SSD',
        'price' => 75000,
        'stock' => 25,
        'category' => 'Laptops',
        'image' => 'laptop_3.jpg'
    ],
    [
        'id' => 12,
        'name' => 'Lenovo ThinkPad X1',
        'description' => 'Intel i7, 32GB RAM, 1TB SSD, Business laptop',
        'price' => 195000,
        'stock' => 8,
        'category' => 'Laptops',
        'image' => 'laptop_4.jpg'
    ],
    [
        'id' => 13,
        'name' => 'ASUS ROG Strix G16',
        'description' => 'RTX 4070, Intel i9, 32GB RAM Gaming',
        'price' => 225000,
        'stock' => 10,
        'category' => 'Laptops',
        'image' => 'laptop_5.jpg'
    ],
    [
        'id' => 14,
        'name' => 'Acer Nitro 5',
        'description' => 'RTX 4050, AMD Ryzen 7, 16GB RAM Gaming',
        'price' => 95000,
        'stock' => 20,
        'category' => 'Laptops',
        'image' => 'laptop_6.jpg'
    ],
    [
        'id' => 15,
        'name' => 'Microsoft Surface Pro 9',
        'description' => 'Intel i7, 16GB, 256GB, 2-in-1 tablet',
        'price' => 145000,
        'stock' => 15,
        'category' => 'Laptops',
        'image' => 'laptop_7.jpg'
    ],
    [
        'id' => 16,
        'name' => 'MSI Creator Z16',
        'description' => 'RTX 4060, i7, 4K Mini LED, Content Creator',
        'price' => 215000,
        'stock' => 6,
        'category' => 'Laptops',
        'image' => 'laptop_8.jpg'
    ],
    [
        'id' => 17,
        'name' => 'Sony WH-1000XM5',
        'description' => 'Best-in-class ANC, 30hr battery, LDAC',
        'price' => 32999,
        'stock' => 40,
        'category' => 'Headphones',
        'image' => 'headphone_1.jpg'
    ],
    [
        'id' => 18,
        'name' => 'Apple AirPods Pro 2',
        'description' => 'Active Noise Cancellation, Spatial Audio',
        'price' => 28999,
        'stock' => 50,
        'category' => 'Headphones',
        'image' => 'headphone_2.jpg'
    ],
    [
        'id' => 19,
        'name' => 'JBL Tour One M2',
        'description' => 'True Adaptive ANC, 50hr playtime',
        'price' => 24999,
        'stock' => 35,
        'category' => 'Headphones',
        'image' => 'headphone_3.jpg'
    ],
    [
        'id' => 20,
        'name' => 'Bose QuietComfort Ultra',
        'description' => 'Immersive Audio, CustomTune technology',
        'price' => 35999,
        'stock' => 25,
        'category' => 'Headphones',
        'image' => 'headphone_4.jpg'
    ],
    [
        'id' => 21,
        'name' => 'Samsung Galaxy Buds2 Pro',
        'description' => '360 Audio, ANC, IPX7 waterproof',
        'price' => 14999,
        'stock' => 60,
        'category' => 'Headphones',
        'image' => 'headphone_5.jpg'
    ],
    [
        'id' => 22,
        'name' => 'Sennheiser Momentum 4',
        'description' => 'Audiophile sound, 60hr battery',
        'price' => 29999,
        'stock' => 20,
        'category' => 'Headphones',
        'image' => 'headphone_6.jpg'
    ],
    [
        'id' => 23,
        'name' => 'Audio-Technica ATH-M50x',
        'description' => 'Studio monitor headphones, Professional',
        'price' => 12999,
        'stock' => 45,
        'category' => 'Headphones',
        'image' => 'headphone_7.jpg'
    ],
    [
        'id' => 24,
        'name' => 'Beats Studio Pro',
        'description' => 'Personalized Spatial Audio, USB-C',
        'price' => 27999,
        'stock' => 30,
        'category' => 'Headphones',
        'image' => 'headphone_8.jpg'
    ],
    [
        'id' => 25,
        'name' => 'Apple Watch Series 9',
        'description' => 'Always-on Retina, Blood O2, ECG',
        'price' => 54999,
        'stock' => 30,
        'category' => 'Smartwatches',
        'image' => 'watch_1.jpg'
    ],
    [
        'id' => 26,
        'name' => 'Samsung Galaxy Watch 6',
        'description' => 'BioActive Sensor, Wear OS, Sapphire Glass',
        'price' => 29999,
        'stock' => 40,
        'category' => 'Smartwatches',
        'image' => 'watch_2.jpg'
    ],
    [
        'id' => 27,
        'name' => 'Garmin Fenix 7',
        'description' => 'Multi-sport GPS, Solar charging, 28 days battery',
        'price' => 69999,
        'stock' => 15,
        'category' => 'Smartwatches',
        'image' => 'watch_3.jpg'
    ],
    [
        'id' => 28,
        'name' => 'Fitbit Sense 2',
        'description' => 'Stress management, ECG, Sleep tracking',
        'price' => 24999,
        'stock' => 35,
        'category' => 'Smartwatches',
        'image' => 'watch_4.jpg'
    ],
    [
        'id' => 29,
        'name' => 'Amazfit GTR 4',
        'description' => 'AMOLED, GPS, 14-day battery, 150+ sports',
        'price' => 17999,
        'stock' => 50,
        'category' => 'Smartwatches',
        'image' => 'watch_5.jpg'
    ],
    [
        'id' => 30,
        'name' => 'Huawei Watch GT 4',
        'description' => 'Stylish design, TruSeen 5.5, 14 days battery',
        'price' => 22999,
        'stock' => 40,
        'category' => 'Smartwatches',
        'image' => 'watch_6.jpg'
    ],
    [
        'id' => 31,
        'name' => 'Xiaomi Watch S3',
        'description' => 'HyperOS, Rotating bezel, 5ATM water resist',
        'price' => 14999,
        'stock' => 55,
        'category' => 'Smartwatches',
        'image' => 'watch_7.jpg'
    ],
    [
        'id' => 32,
        'name' => 'OnePlus Watch 2',
        'description' => 'Wear OS, Dual-Engine Architecture, 100hr battery',
        'price' => 27999,
        'stock' => 25,
        'category' => 'Smartwatches',
        'image' => 'watch_8.jpg'
    ],
    [
        'id' => 33,
        'name' => 'Canon EOS R6 Mark II',
        'description' => 'Full-frame mirrorless, 24.2MP, 40fps',
        'price' => 285000,
        'stock' => 8,
        'category' => 'Cameras',
        'image' => 'camera_1.jpg'
    ],
    [
        'id' => 34,
        'name' => 'Sony A7 IV',
        'description' => '33MP Full-frame, 4K 60p, Real-time Eye AF',
        'price' => 265000,
        'stock' => 10,
        'category' => 'Cameras',
        'image' => 'camera_2.jpg'
    ],
    [
        'id' => 35,
        'name' => 'Nikon Z8',
        'description' => '45.7MP, 8K video, In-body stabilization',
        'price' => 385000,
        'stock' => 5,
        'category' => 'Cameras',
        'image' => 'camera_3.jpg'
    ],
    [
        'id' => 36,
        'name' => 'Fujifilm X-T5',
        'description' => '40.2MP APS-C, Film simulations, Compact',
        'price' => 175000,
        'stock' => 12,
        'category' => 'Cameras',
        'image' => 'camera_4.jpg'
    ],
    [
        'id' => 37,
        'name' => 'GoPro Hero 12 Black',
        'description' => '5.3K60, HyperSmooth 6.0, Waterproof',
        'price' => 45999,
        'stock' => 30,
        'category' => 'Cameras',
        'image' => 'camera_5.jpg'
    ],
    [
        'id' => 38,
        'name' => 'DJI Osmo Pocket 3',
        'description' => '4K 120fps, 1\" CMOS sensor, Gimbal camera',
        'price' => 55999,
        'stock' => 20,
        'category' => 'Cameras',
        'image' => 'camera_6.jpg'
    ],
    [
        'id' => 39,
        'name' => 'Canon PowerShot G7X III',
        'description' => 'Compact vlogging camera, 4K, Flip screen',
        'price' => 65999,
        'stock' => 15,
        'category' => 'Cameras',
        'image' => 'camera_7.jpg'
    ],
    [
        'id' => 40,
        'name' => 'Insta360 X4',
        'description' => '8K 360° camera, AI editing, FlowState',
        'price' => 49999,
        'stock' => 18,
        'category' => 'Cameras',
        'image' => 'camera_8.jpg'
    ],
    [
        'id' => 41,
        'name' => 'Samsung 65\" Neo QLED 8K',
        'description' => 'QN800C, Neural Quantum Processor, Dolby Atmos',
        'price' => 375000,
        'stock' => 5,
        'category' => 'Televisions',
        'image' => 'tv_1.jpg'
    ],
    [
        'id' => 42,
        'name' => 'LG 55\" OLED C3',
        'description' => 'α9 AI Processor, Dolby Vision, 120Hz',
        'price' => 145000,
        'stock' => 12,
        'category' => 'Televisions',
        'image' => 'tv_2.jpg'
    ],
    [
        'id' => 43,
        'name' => 'Sony 65\" Bravia XR A80L',
        'description' => 'OLED, Cognitive Processor XR, Google TV',
        'price' => 195000,
        'stock' => 8,
        'category' => 'Televisions',
        'image' => 'tv_3.jpg'
    ],
    [
        'id' => 44,
        'name' => 'TCL 55\" QLED C745',
        'description' => '144Hz Game Master, Dolby Vision, HDMI 2.1',
        'price' => 55999,
        'stock' => 25,
        'category' => 'Televisions',
        'image' => 'tv_4.jpg'
    ],
    [
        'id' => 45,
        'name' => 'Xiaomi TV A Pro 55\"',
        'description' => '4K UHD, Dolby Vision, Google TV',
        'price' => 45999,
        'stock' => 30,
        'category' => 'Televisions',
        'image' => 'tv_5.jpg'
    ],
    [
        'id' => 46,
        'name' => 'Hisense 65\" U7K',
        'description' => 'Mini-LED, 144Hz, Game Mode Pro',
        'price' => 89999,
        'stock' => 15,
        'category' => 'Televisions',
        'image' => 'tv_6.jpg'
    ],
    [
        'id' => 47,
        'name' => 'Samsung 50\" Crystal UHD',
        'description' => 'Dynamic Crystal Color, Smart Hub',
        'price' => 42999,
        'stock' => 35,
        'category' => 'Televisions',
        'image' => 'tv_7.jpg'
    ],
    [
        'id' => 48,
        'name' => 'LG 43\" UQ8000',
        'description' => '4K AI ThinQ, WebOS, HDR10 Pro',
        'price' => 38999,
        'stock' => 40,
        'category' => 'Televisions',
        'image' => 'tv_8.jpg'
    ],
    [
        'id' => 49,
        'name' => 'Samsung 670L Refrigerator',
        'description' => 'Side-by-side, SpaceMax, Digital Inverter',
        'price' => 125000,
        'stock' => 10,
        'category' => 'Home Appliances',
        'image' => 'appliance_1.jpg'
    ],
    [
        'id' => 50,
        'name' => 'LG 10kg Front Load Washer',
        'description' => 'AI DD, Steam, TurboWash360',
        'price' => 65000,
        'stock' => 15,
        'category' => 'Home Appliances',
        'image' => 'appliance_2.jpg'
    ],
    [
        'id' => 51,
        'name' => 'Panasonic 1.5 Ton AC',
        'description' => 'Inverter, nanoe X, 5-star rating',
        'price' => 75000,
        'stock' => 20,
        'category' => 'Home Appliances',
        'image' => 'appliance_3.jpg'
    ],
    [
        'id' => 52,
        'name' => 'Dyson V15 Detect',
        'description' => 'Cordless vacuum, Laser dust detection',
        'price' => 68000,
        'stock' => 12,
        'category' => 'Home Appliances',
        'image' => 'appliance_4.jpg'
    ],
    [
        'id' => 53,
        'name' => 'Philips Air Fryer XXL',
        'description' => '7.3L capacity, Rapid Air, Fat removal',
        'price' => 22999,
        'stock' => 30,
        'category' => 'Home Appliances',
        'image' => 'appliance_5.jpg'
    ],
    [
        'id' => 54,
        'name' => 'Samsung Microwave 32L',
        'description' => 'Convection, Ceramic enamel cavity',
        'price' => 15999,
        'stock' => 40,
        'category' => 'Home Appliances',
        'image' => 'appliance_6.jpg'
    ],
    [
        'id' => 55,
        'name' => 'Singer Blender Pro',
        'description' => '1500W, 6 blades, Ice crushing',
        'price' => 4999,
        'stock' => 60,
        'category' => 'Home Appliances',
        'image' => 'appliance_7.jpg'
    ],
    [
        'id' => 56,
        'name' => 'Walton Deep Freezer 300L',
        'description' => 'Convertible, Tropicalized compressor',
        'price' => 45000,
        'stock' => 18,
        'category' => 'Home Appliances',
        'image' => 'appliance_8.jpg'
    ],
    [
        'id' => 57,
        'name' => 'Slim Fit Formal Shirt',
        'description' => 'Cotton blend, Wrinkle-free, Business wear',
        'price' => 1899,
        'stock' => 100,
        'category' => 'Men Fashion',
        'image' => 'men_1.jpg'
    ],
    [
        'id' => 58,
        'name' => 'Premium Denim Jeans',
        'description' => 'Stretch fit, Dark wash, Comfortable',
        'price' => 2499,
        'stock' => 80,
        'category' => 'Men Fashion',
        'image' => 'men_2.jpg'
    ],
    [
        'id' => 59,
        'name' => 'Leather Executive Belt',
        'description' => 'Genuine leather, Auto-lock buckle',
        'price' => 899,
        'stock' => 120,
        'category' => 'Men Fashion',
        'image' => 'men_3.jpg'
    ],
    [
        'id' => 60,
        'name' => 'Casual Polo T-Shirt',
        'description' => 'Cotton pique, Embroidered logo, Breathable',
        'price' => 1299,
        'stock' => 150,
        'category' => 'Men Fashion',
        'image' => 'men_4.jpg'
    ],
    [
        'id' => 61,
        'name' => 'Wool Blend Blazer',
        'description' => 'Slim fit, Two-button, Formal occasions',
        'price' => 5999,
        'stock' => 40,
        'category' => 'Men Fashion',
        'image' => 'men_5.jpg'
    ],
    [
        'id' => 62,
        'name' => 'Cotton Chino Pants',
        'description' => 'Regular fit, Multiple colors, Office wear',
        'price' => 1799,
        'stock' => 90,
        'category' => 'Men Fashion',
        'image' => 'men_6.jpg'
    ],
    [
        'id' => 63,
        'name' => 'Sports Track Suit',
        'description' => 'Polyester, Moisture-wicking, Athleisure',
        'price' => 2299,
        'stock' => 70,
        'category' => 'Men Fashion',
        'image' => 'men_7.jpg'
    ],
    [
        'id' => 64,
        'name' => 'Leather Wallet',
        'description' => 'RFID blocking, Multiple card slots, Gift box',
        'price' => 799,
        'stock' => 200,
        'category' => 'Men Fashion',
        'image' => 'men_8.jpg'
    ],
    [
        'id' => 65,
        'name' => 'Embroidered Kameez',
        'description' => 'Cotton lawn, Pakistani design, Summer wear',
        'price' => 2599,
        'stock' => 80,
        'category' => 'Women Fashion',
        'image' => 'women_1.jpg'
    ],
    [
        'id' => 66,
        'name' => 'Designer Saree',
        'description' => 'Silk blend, Party wear, Heavy border',
        'price' => 4999,
        'stock' => 50,
        'category' => 'Women Fashion',
        'image' => 'women_2.jpg'
    ],
    [
        'id' => 67,
        'name' => 'Trendy Kurti Set',
        'description' => 'Rayon, Printed, With palazzo pants',
        'price' => 1899,
        'stock' => 100,
        'category' => 'Women Fashion',
        'image' => 'women_3.jpg'
    ],
    [
        'id' => 68,
        'name' => 'Western Maxi Dress',
        'description' => 'Floral print, Summer collection, Flowy',
        'price' => 2299,
        'stock' => 60,
        'category' => 'Women Fashion',
        'image' => 'women_4.jpg'
    ],
    [
        'id' => 69,
        'name' => 'Formal Trousers',
        'description' => 'High waist, Straight fit, Office wear',
        'price' => 1599,
        'stock' => 90,
        'category' => 'Women Fashion',
        'image' => 'women_5.jpg'
    ],
    [
        'id' => 70,
        'name' => 'Embellished Handbag',
        'description' => 'PU leather, Multiple compartments, Stylish',
        'price' => 1299,
        'stock' => 70,
        'category' => 'Women Fashion',
        'image' => 'women_6.jpg'
    ],
    [
        'id' => 71,
        'name' => 'Pearl Jewelry Set',
        'description' => 'Necklace + Earrings, Wedding collection',
        'price' => 999,
        'stock' => 120,
        'category' => 'Women Fashion',
        'image' => 'women_7.jpg'
    ],
    [
        'id' => 72,
        'name' => 'Printed Scarf Hijab',
        'description' => 'Premium chiffon, Multiple designs available',
        'price' => 499,
        'stock' => 200,
        'category' => 'Women Fashion',
        'image' => 'women_8.jpg'
    ],
    [
        'id' => 73,
        'name' => 'Nike Air Max 270',
        'description' => 'Running shoes, Air cushioning, Breathable',
        'price' => 12999,
        'stock' => 50,
        'category' => 'Footwear',
        'image' => 'shoe_1.jpg'
    ],
    [
        'id' => 74,
        'name' => 'Adidas Ultraboost 24',
        'description' => 'Boost midsole, Primeknit upper, Running',
        'price' => 15999,
        'stock' => 40,
        'category' => 'Footwear',
        'image' => 'shoe_2.jpg'
    ],
    [
        'id' => 75,
        'name' => 'Bata Formal Oxford',
        'description' => 'Genuine leather, Office wear, Classic',
        'price' => 3999,
        'stock' => 80,
        'category' => 'Footwear',
        'image' => 'shoe_3.jpg'
    ],
    [
        'id' => 76,
        'name' => 'Apex Sports Sandal',
        'description' => 'Comfortable, Daily wear, Durable',
        'price' => 1299,
        'stock' => 120,
        'category' => 'Footwear',
        'image' => 'shoe_4.jpg'
    ],
    [
        'id' => 77,
        'name' => 'Nike Air Jordan 1',
        'description' => 'Iconic basketball shoe, Limited edition',
        'price' => 18999,
        'stock' => 25,
        'category' => 'Footwear',
        'image' => 'shoe_5.jpg'
    ],
    [
        'id' => 78,
        'name' => 'Woodland Hiking Boots',
        'description' => 'Waterproof, Trekking, Rugged terrain',
        'price' => 6999,
        'stock' => 35,
        'category' => 'Footwear',
        'image' => 'shoe_6.jpg'
    ],
    [
        'id' => 79,
        'name' => 'Crocs Classic Clog',
        'description' => 'Lightweight, Comfortable, Water-friendly',
        'price' => 3499,
        'stock' => 100,
        'category' => 'Footwear',
        'image' => 'shoe_7.jpg'
    ],
    [
        'id' => 80,
        'name' => 'Puma RS-X',
        'description' => 'Retro running, Bold design, Street style',
        'price' => 8999,
        'stock' => 45,
        'category' => 'Footwear',
        'image' => 'shoe_8.jpg'
    ],
    [
        'id' => 81,
        'name' => 'PlayStation 5',
        'description' => 'Digital Edition, DualSense controller, 825GB',
        'price' => 65000,
        'stock' => 15,
        'category' => 'Gaming',
        'image' => 'gaming_1.jpg'
    ],
    [
        'id' => 82,
        'name' => 'Xbox Series X',
        'description' => '12 TFLOPS, 4K 120fps, 1TB SSD',
        'price' => 62000,
        'stock' => 12,
        'category' => 'Gaming',
        'image' => 'gaming_2.jpg'
    ],
    [
        'id' => 83,
        'name' => 'Nintendo Switch OLED',
        'description' => '7\" OLED screen, 64GB, Enhanced audio',
        'price' => 42000,
        'stock' => 25,
        'category' => 'Gaming',
        'image' => 'gaming_3.jpg'
    ],
    [
        'id' => 84,
        'name' => 'Razer BlackWidow V4',
        'description' => 'Mechanical keyboard, RGB, Gaming grade',
        'price' => 15999,
        'stock' => 35,
        'category' => 'Gaming',
        'image' => 'gaming_4.jpg'
    ],
    [
        'id' => 85,
        'name' => 'Logitech G Pro X',
        'description' => 'Wireless gaming mouse, HERO 25K sensor',
        'price' => 12999,
        'stock' => 40,
        'category' => 'Gaming',
        'image' => 'gaming_5.jpg'
    ],
    [
        'id' => 86,
        'name' => 'SteelSeries Arctis Nova Pro',
        'description' => 'Wireless gaming headset, ANC, Hi-Fi',
        'price' => 29999,
        'stock' => 20,
        'category' => 'Gaming',
        'image' => 'gaming_6.jpg'
    ],
    [
        'id' => 87,
        'name' => 'Elgato Stream Deck MK.2',
        'description' => '15 LCD keys, Streaming control',
        'price' => 18999,
        'stock' => 25,
        'category' => 'Gaming',
        'image' => 'gaming_7.jpg'
    ],
    [
        'id' => 88,
        'name' => 'HyperX Cloud III',
        'description' => 'Gaming headset, DTS Spatial Audio',
        'price' => 9999,
        'stock' => 50,
        'category' => 'Gaming',
        'image' => 'gaming_8.jpg'
    ],
    [
        'id' => 89,
        'name' => 'Atomic Habits - James Clear',
        'description' => 'Self-improvement bestseller, Hardcover',
        'price' => 899,
        'stock' => 100,
        'category' => 'Books',
        'image' => 'book_1.jpg'
    ],
    [
        'id' => 90,
        'name' => 'The Psychology of Money',
        'description' => 'Morgan Housel, Financial wisdom',
        'price' => 799,
        'stock' => 80,
        'category' => 'Books',
        'image' => 'book_2.jpg'
    ],
    [
        'id' => 91,
        'name' => 'Rich Dad Poor Dad',
        'description' => 'Robert Kiyosaki, Personal finance classic',
        'price' => 699,
        'stock' => 120,
        'category' => 'Books',
        'image' => 'book_3.jpg'
    ],
    [
        'id' => 92,
        'name' => 'Ikigai',
        'description' => 'Japanese secret to long and happy life',
        'price' => 599,
        'stock' => 90,
        'category' => 'Books',
        'image' => 'book_4.jpg'
    ],
    [
        'id' => 93,
        'name' => 'The Alchemist',
        'description' => 'Paulo Coelho, Inspirational fiction',
        'price' => 549,
        'stock' => 150,
        'category' => 'Books',
        'image' => 'book_5.jpg'
    ],
    [
        'id' => 94,
        'name' => 'Think and Grow Rich',
        'description' => 'Napoleon Hill, Success principles',
        'price' => 649,
        'stock' => 85,
        'category' => 'Books',
        'image' => 'book_6.jpg'
    ],
    [
        'id' => 95,
        'name' => 'Start With Why',
        'description' => 'Simon Sinek, Leadership & motivation',
        'price' => 899,
        'stock' => 70,
        'category' => 'Books',
        'image' => 'book_7.jpg'
    ],
    [
        'id' => 96,
        'name' => 'Deep Work',
        'description' => 'Cal Newport, Productivity masterpiece',
        'price' => 799,
        'stock' => 75,
        'category' => 'Books',
        'image' => 'book_8.jpg'
    ],
    [
        'id' => 97,
        'name' => 'The Ordinary Niacinamide 10%',
        'description' => 'Blemish & pore formula, 30ml',
        'price' => 1299,
        'stock' => 80,
        'category' => 'Beauty',
        'image' => 'beauty_1.jpg'
    ],
    [
        'id' => 98,
        'name' => 'CeraVe Moisturizing Cream',
        'description' => 'With ceramides, 453g, For dry skin',
        'price' => 2499,
        'stock' => 60,
        'category' => 'Beauty',
        'image' => 'beauty_2.jpg'
    ],
    [
        'id' => 99,
        'name' => 'Maybelline Fit Me Foundation',
        'description' => 'Matte + Poreless, SPF 18, 30ml',
        'price' => 899,
        'stock' => 100,
        'category' => 'Beauty',
        'image' => 'beauty_3.jpg'
    ],
    [
        'id' => 100,
        'name' => 'L Oreal Paris Hair Serum',
        'description' => 'Extraordinary Oil, Frizz control, 100ml',
        'price' => 1199,
        'stock' => 75,
        'category' => 'Beauty',
        'image' => 'beauty_4.jpg'
    ],
    [
        'id' => 101,
        'name' => 'Himalaya Neem Face Wash',
        'description' => 'Purifying, Soap-free, 150ml',
        'price' => 349,
        'stock' => 200,
        'category' => 'Beauty',
        'image' => 'beauty_5.jpg'
    ],
    [
        'id' => 102,
        'name' => 'Neutrogena Sunscreen SPF 50',
        'description' => 'Ultra Sheer, Dry-Touch, 88ml',
        'price' => 1599,
        'stock' => 90,
        'category' => 'Beauty',
        'image' => 'beauty_6.jpg'
    ],
    [
        'id' => 103,
        'name' => 'MAC Ruby Woo Lipstick',
        'description' => 'Matte, Iconic red shade, Long-wearing',
        'price' => 2999,
        'stock' => 50,
        'category' => 'Beauty',
        'image' => 'beauty_7.jpg'
    ],
    [
        'id' => 104,
        'name' => 'Dove Body Lotion 400ml',
        'description' => 'Deep moisture, 48hr hydration',
        'price' => 549,
        'stock' => 150,
        'category' => 'Beauty',
        'image' => 'beauty_8.jpg'
    ],
    [
        'id' => 105,
        'name' => 'Whey Protein Isolate 2kg',
        'description' => 'Optimum Nutrition, 24g protein/serving',
        'price' => 8999,
        'stock' => 40,
        'category' => 'Health & Fitness',
        'image' => 'fitness_1.jpg'
    ],
    [
        'id' => 106,
        'name' => 'Resistance Bands Set',
        'description' => '5 levels, Workout guide included',
        'price' => 1299,
        'stock' => 100,
        'category' => 'Health & Fitness',
        'image' => 'fitness_2.jpg'
    ],
    [
        'id' => 107,
        'name' => 'Yoga Mat 6mm',
        'description' => 'Non-slip, Eco-friendly, Carrying strap',
        'price' => 999,
        'stock' => 120,
        'category' => 'Health & Fitness',
        'image' => 'fitness_3.jpg'
    ],
    [
        'id' => 108,
        'name' => 'Adjustable Dumbbells 20kg',
        'description' => 'Space-saving, Multiple weights',
        'price' => 5999,
        'stock' => 30,
        'category' => 'Health & Fitness',
        'image' => 'fitness_4.jpg'
    ],
    [
        'id' => 109,
        'name' => 'Digital Body Scale',
        'description' => 'BMI, Body fat, Muscle mass, Bluetooth',
        'price' => 2499,
        'stock' => 80,
        'category' => 'Health & Fitness',
        'image' => 'fitness_5.jpg'
    ],
    [
        'id' => 110,
        'name' => 'Multivitamin 90 Tablets',
        'description' => 'Complete A-Z, Daily nutrition',
        'price' => 1199,
        'stock' => 150,
        'category' => 'Health & Fitness',
        'image' => 'fitness_6.jpg'
    ],
    [
        'id' => 111,
        'name' => 'Jump Rope Speed',
        'description' => 'Steel cable, Adjustable, Cardio workout',
        'price' => 599,
        'stock' => 200,
        'category' => 'Health & Fitness',
        'image' => 'fitness_7.jpg'
    ],
    [
        'id' => 112,
        'name' => 'Foam Roller 45cm',
        'description' => 'Deep tissue massage, Muscle recovery',
        'price' => 1499,
        'stock' => 60,
        'category' => 'Health & Fitness',
        'image' => 'fitness_8.jpg'
    ],
    [
        'id' => 113,
        'name' => 'Pampers Diapers Large 64pcs',
        'description' => 'Baby dry, 12hr protection',
        'price' => 1899,
        'stock' => 100,
        'category' => 'Baby Products',
        'image' => 'baby_1.jpg'
    ],
    [
        'id' => 114,
        'name' => 'Baby Stroller Premium',
        'description' => 'Foldable, Reclining, Rain cover included',
        'price' => 12999,
        'stock' => 20,
        'category' => 'Baby Products',
        'image' => 'baby_2.jpg'
    ],
    [
        'id' => 115,
        'name' => 'Feeding Bottle Set 3pcs',
        'description' => 'Anti-colic, BPA free, Different sizes',
        'price' => 1299,
        'stock' => 80,
        'category' => 'Baby Products',
        'image' => 'baby_3.jpg'
    ],
    [
        'id' => 116,
        'name' => 'Baby Car Seat',
        'description' => 'ISOFIX, 0-36kg, 360 rotation',
        'price' => 15999,
        'stock' => 15,
        'category' => 'Baby Products',
        'image' => 'baby_4.jpg'
    ],
    [
        'id' => 117,
        'name' => 'Soft Toy Teddy Bear',
        'description' => '60cm, Premium plush, Washable',
        'price' => 999,
        'stock' => 150,
        'category' => 'Baby Products',
        'image' => 'baby_5.jpg'
    ],
    [
        'id' => 118,
        'name' => 'Baby Monitor Camera',
        'description' => 'Night vision, Two-way audio, WiFi',
        'price' => 4999,
        'stock' => 35,
        'category' => 'Baby Products',
        'image' => 'baby_6.jpg'
    ],
    [
        'id' => 119,
        'name' => 'Organic Baby Wipes 80pcs',
        'description' => 'Fragrance-free, Sensitive skin',
        'price' => 349,
        'stock' => 200,
        'category' => 'Baby Products',
        'image' => 'baby_7.jpg'
    ],
    [
        'id' => 120,
        'name' => 'Baby Walker',
        'description' => 'Musical, Height adjustable, Safe brake',
        'price' => 3499,
        'stock' => 40,
        'category' => 'Baby Products',
        'image' => 'baby_8.jpg'
    ],
    [
        'id' => 121,
        'name' => 'Royal Canin Dog Food 10kg',
        'description' => 'Adult, Complete nutrition, Premium',
        'price' => 7999,
        'stock' => 30,
        'category' => 'Pet Supplies',
        'image' => 'pet_1.jpg'
    ],
    [
        'id' => 122,
        'name' => 'Cat Litter Box Enclosed',
        'description' => 'Odor control, Easy clean, Large size',
        'price' => 2999,
        'stock' => 40,
        'category' => 'Pet Supplies',
        'image' => 'pet_2.jpg'
    ],
    [
        'id' => 123,
        'name' => 'Pet Carrier Bag',
        'description' => 'Airline approved, Breathable mesh',
        'price' => 2499,
        'stock' => 50,
        'category' => 'Pet Supplies',
        'image' => 'pet_3.jpg'
    ],
    [
        'id' => 124,
        'name' => 'Dog Collar LED',
        'description' => 'Rechargeable, Night visibility, Waterproof',
        'price' => 899,
        'stock' => 80,
        'category' => 'Pet Supplies',
        'image' => 'pet_4.jpg'
    ],
    [
        'id' => 125,
        'name' => 'Cat Scratching Post',
        'description' => 'Sisal rope, Multi-level, With toys',
        'price' => 3999,
        'stock' => 35,
        'category' => 'Pet Supplies',
        'image' => 'pet_5.jpg'
    ],
    [
        'id' => 126,
        'name' => 'Pet Grooming Kit',
        'description' => 'Brush, nail clipper, shampoo set',
        'price' => 1599,
        'stock' => 60,
        'category' => 'Pet Supplies',
        'image' => 'pet_6.jpg'
    ],
    [
        'id' => 127,
        'name' => 'Automatic Pet Feeder',
        'description' => 'Programmable, 4L capacity, WiFi',
        'price' => 4999,
        'stock' => 25,
        'category' => 'Pet Supplies',
        'image' => 'pet_7.jpg'
    ],
    [
        'id' => 128,
        'name' => 'Dog Bed Orthopedic',
        'description' => 'Memory foam, Washable cover, Large',
        'price' => 3499,
        'stock' => 45,
        'category' => 'Pet Supplies',
        'image' => 'pet_8.jpg'
    ],
    [
        'id' => 129,
        'name' => 'Parker Jotter Pen Set',
        'description' => 'Ballpoint + Fountain, Gift box',
        'price' => 1999,
        'stock' => 60,
        'category' => 'Stationery',
        'image' => 'stationery_1.jpg'
    ],
    [
        'id' => 130,
        'name' => 'A4 Notebook Premium 200pg',
        'description' => 'Leather cover, Ruled, Bookmark',
        'price' => 499,
        'stock' => 150,
        'category' => 'Stationery',
        'image' => 'stationery_2.jpg'
    ],
    [
        'id' => 131,
        'name' => 'Staedtler Color Pencils 48',
        'description' => 'Professional, Vibrant colors, Soft lead',
        'price' => 1299,
        'stock' => 80,
        'category' => 'Stationery',
        'image' => 'stationery_3.jpg'
    ],
    [
        'id' => 132,
        'name' => 'Desk Organizer Set',
        'description' => 'Acrylic, 6 compartments, Modern',
        'price' => 899,
        'stock' => 70,
        'category' => 'Stationery',
        'image' => 'stationery_4.jpg'
    ],
    [
        'id' => 133,
        'name' => 'Scientific Calculator',
        'description' => 'Casio FX-991EX, 552 functions',
        'price' => 2199,
        'stock' => 100,
        'category' => 'Stationery',
        'image' => 'stationery_5.jpg'
    ],
    [
        'id' => 134,
        'name' => 'Whiteboard 60x90cm',
        'description' => 'Magnetic, Aluminum frame, Markers included',
        'price' => 1499,
        'stock' => 40,
        'category' => 'Stationery',
        'image' => 'stationery_6.jpg'
    ],
    [
        'id' => 135,
        'name' => 'Sticky Notes Neon 5 Pack',
        'description' => 'Self-adhesive, Multiple sizes',
        'price' => 299,
        'stock' => 200,
        'category' => 'Stationery',
        'image' => 'stationery_7.jpg'
    ],
    [
        'id' => 136,
        'name' => 'File Folder Organizer',
        'description' => 'Expandable, 13 pockets, A4 size',
        'price' => 599,
        'stock' => 120,
        'category' => 'Stationery',
        'image' => 'stationery_8.jpg'
    ],
    [
        'id' => 137,
        'name' => 'Gold Plated Necklace',
        'description' => '22K gold plated, Traditional design',
        'price' => 4999,
        'stock' => 40,
        'category' => 'Jewelry',
        'image' => 'jewelry_1.jpg'
    ],
    [
        'id' => 138,
        'name' => 'Diamond Studs Earrings',
        'description' => 'Sterling silver, CZ stones, Daily wear',
        'price' => 2499,
        'stock' => 60,
        'category' => 'Jewelry',
        'image' => 'jewelry_2.jpg'
    ],
    [
        'id' => 139,
        'name' => 'Silver Bangles Set 4pcs',
        'description' => '925 Sterling silver, Oxidized finish',
        'price' => 3999,
        'stock' => 50,
        'category' => 'Jewelry',
        'image' => 'jewelry_3.jpg'
    ],
    [
        'id' => 140,
        'name' => 'Pearl Pendant Necklace',
        'description' => 'Freshwater pearl, Gold chain',
        'price' => 1999,
        'stock' => 70,
        'category' => 'Jewelry',
        'image' => 'jewelry_4.jpg'
    ],
    [
        'id' => 141,
        'name' => 'Men Bracelet Leather',
        'description' => 'Stainless steel clasp, Braided',
        'price' => 899,
        'stock' => 100,
        'category' => 'Jewelry',
        'image' => 'jewelry_5.jpg'
    ],
    [
        'id' => 142,
        'name' => 'Bridal Jewelry Set',
        'description' => 'Complete set, Stone work, Wedding',
        'price' => 12999,
        'stock' => 25,
        'category' => 'Jewelry',
        'image' => 'jewelry_6.jpg'
    ],
    [
        'id' => 143,
        'name' => 'Anklet Gold Tone',
        'description' => 'Bells, Traditional Bangladeshi design',
        'price' => 599,
        'stock' => 150,
        'category' => 'Jewelry',
        'image' => 'jewelry_7.jpg'
    ],
    [
        'id' => 144,
        'name' => 'Ring Adjustable Fashion',
        'description' => 'Rose gold plated, Crystal flower',
        'price' => 499,
        'stock' => 200,
        'category' => 'Jewelry',
        'image' => 'jewelry_8.jpg'
    ],
    [
        'id' => 145,
        'name' => 'Samsonite Cabin Trolley',
        'description' => '55cm, Hard shell, TSA lock, 35L',
        'price' => 18999,
        'stock' => 20,
        'category' => 'Bags & Luggage',
        'image' => 'bag_1.jpg'
    ],
    [
        'id' => 146,
        'name' => 'Laptop Backpack 17\"',
        'description' => 'Anti-theft, USB charging port, Waterproof',
        'price' => 2999,
        'stock' => 60,
        'category' => 'Bags & Luggage',
        'image' => 'bag_2.jpg'
    ],
    [
        'id' => 147,
        'name' => 'Travel Duffel Bag',
        'description' => 'Canvas, Large capacity, Gym bag',
        'price' => 1799,
        'stock' => 80,
        'category' => 'Bags & Luggage',
        'image' => 'bag_3.jpg'
    ],
    [
        'id' => 148,
        'name' => 'Ladies Handbag Tote',
        'description' => 'PU leather, Spacious, Office bag',
        'price' => 2499,
        'stock' => 50,
        'category' => 'Bags & Luggage',
        'image' => 'bag_4.jpg'
    ],
    [
        'id' => 149,
        'name' => 'Kids School Bag',
        'description' => 'Cartoon design, Lightweight, Padded',
        'price' => 999,
        'stock' => 120,
        'category' => 'Bags & Luggage',
        'image' => 'bag_5.jpg'
    ],
    [
        'id' => 150,
        'name' => 'Messenger Bag Leather',
        'description' => 'Crossbody, Vintage style, Unisex',
        'price' => 1999,
        'stock' => 45,
        'category' => 'Bags & Luggage',
        'image' => 'bag_6.jpg'
    ],
    [
        'id' => 151,
        'name' => '3-Piece Luggage Set',
        'description' => 'Trolley bags, Spinner wheels, Nesting',
        'price' => 15999,
        'stock' => 15,
        'category' => 'Bags & Luggage',
        'image' => 'bag_7.jpg'
    ],
    [
        'id' => 152,
        'name' => 'Sling Bag Compact',
        'description' => 'Water-resistant, Multiple pockets',
        'price' => 899,
        'stock' => 100,
        'category' => 'Bags & Luggage',
        'image' => 'bag_8.jpg'
    ],
    [
        'id' => 153,
        'name' => 'Yonex Badminton Racket',
        'description' => 'Astrox 88D, Professional, Carbon frame',
        'price' => 12999,
        'stock' => 30,
        'category' => 'Sports',
        'image' => 'sports_1.jpg'
    ],
    [
        'id' => 154,
        'name' => 'Adidas Football Size 5',
        'description' => 'FIFA approved, Training ball',
        'price' => 2999,
        'stock' => 50,
        'category' => 'Sports',
        'image' => 'sports_2.jpg'
    ],
    [
        'id' => 155,
        'name' => 'Cricket Bat English Willow',
        'description' => 'Grade A, Full size, Heavy weight',
        'price' => 8999,
        'stock' => 25,
        'category' => 'Sports',
        'image' => 'sports_3.jpg'
    ],
    [
        'id' => 156,
        'name' => 'Table Tennis Set',
        'description' => '2 rackets, 3 balls, Net, Complete set',
        'price' => 1499,
        'stock' => 60,
        'category' => 'Sports',
        'image' => 'sports_4.jpg'
    ],
    [
        'id' => 157,
        'name' => 'Spalding Basketball Size 7',
        'description' => 'Indoor/Outdoor, Composite leather',
        'price' => 3499,
        'stock' => 40,
        'category' => 'Sports',
        'image' => 'sports_5.jpg'
    ],
    [
        'id' => 158,
        'name' => 'Swimming Goggles',
        'description' => 'Anti-fog, UV protection, Adjustable',
        'price' => 799,
        'stock' => 100,
        'category' => 'Sports',
        'image' => 'sports_6.jpg'
    ],
    [
        'id' => 159,
        'name' => 'Gym Gloves',
        'description' => 'Weight lifting, Wrist support, Breathable',
        'price' => 599,
        'stock' => 120,
        'category' => 'Sports',
        'image' => 'sports_7.jpg'
    ],
    [
        'id' => 160,
        'name' => 'Bicycle Helmet Adult',
        'description' => 'Adjustable, Ventilated, Safety certified',
        'price' => 1999,
        'stock' => 45,
        'category' => 'Sports',
        'image' => 'sports_8.jpg'
    ],
    [
        'id' => 161,
        'name' => 'Prestige Pressure Cooker 5L',
        'description' => 'Stainless steel, Induction base',
        'price' => 4999,
        'stock' => 40,
        'category' => 'Kitchen',
        'image' => 'kitchen_1.jpg'
    ],
    [
        'id' => 162,
        'name' => 'Non-Stick Cookware Set',
        'description' => '7 pieces, Granite coating, PFOA free',
        'price' => 5999,
        'stock' => 30,
        'category' => 'Kitchen',
        'image' => 'kitchen_2.jpg'
    ],
    [
        'id' => 163,
        'name' => 'Electric Kettle 1.8L',
        'description' => 'Stainless steel, Auto shut-off',
        'price' => 1299,
        'stock' => 80,
        'category' => 'Kitchen',
        'image' => 'kitchen_3.jpg'
    ],
    [
        'id' => 164,
        'name' => 'Dinner Set 41pcs',
        'description' => 'Melamine, Unbreakable, Dishwasher safe',
        'price' => 3999,
        'stock' => 25,
        'category' => 'Kitchen',
        'image' => 'kitchen_4.jpg'
    ],
    [
        'id' => 165,
        'name' => 'Food Storage Containers',
        'description' => '17 pieces, Airtight, BPA free',
        'price' => 1499,
        'stock' => 100,
        'category' => 'Kitchen',
        'image' => 'kitchen_5.jpg'
    ],
    [
        'id' => 166,
        'name' => 'Knife Set with Block',
        'description' => '8 pieces, Stainless steel, Sharp',
        'price' => 2499,
        'stock' => 50,
        'category' => 'Kitchen',
        'image' => 'kitchen_6.jpg'
    ],
    [
        'id' => 167,
        'name' => 'Rice Cooker 2.8L',
        'description' => 'Non-stick pot, Keep warm, Touch panel',
        'price' => 2999,
        'stock' => 60,
        'category' => 'Kitchen',
        'image' => 'kitchen_7.jpg'
    ],
    [
        'id' => 168,
        'name' => 'Water Purifier RO',
        'description' => 'TDS controller, UV+UF, 8L storage',
        'price' => 12999,
        'stock' => 20,
        'category' => 'Kitchen',
        'image' => 'kitchen_8.jpg'
    ],
    [
        'id' => 169,
        'name' => 'Executive Office Chair',
        'description' => 'Ergonomic, Mesh back, Lumbar support',
        'price' => 12999,
        'stock' => 15,
        'category' => 'Furniture',
        'image' => 'furniture_1.jpg'
    ],
    [
        'id' => 170,
        'name' => 'Study Table Wooden',
        'description' => 'With drawers, Computer desk, 120cm',
        'price' => 8999,
        'stock' => 20,
        'category' => 'Furniture',
        'image' => 'furniture_2.jpg'
    ],
    [
        'id' => 171,
        'name' => 'Sofa Set 3+1+1',
        'description' => 'Fabric upholstery, Modern design',
        'price' => 45999,
        'stock' => 8,
        'category' => 'Furniture',
        'image' => 'furniture_3.jpg'
    ],
    [
        'id' => 172,
        'name' => 'Bookshelf 5 Tier',
        'description' => 'Particle board, Wall mount, Industrial',
        'price' => 4999,
        'stock' => 25,
        'category' => 'Furniture',
        'image' => 'furniture_4.jpg'
    ],
    [
        'id' => 173,
        'name' => 'Bed King Size',
        'description' => 'With storage, Hydraulic lift, Engineered wood',
        'price' => 35999,
        'stock' => 10,
        'category' => 'Furniture',
        'image' => 'furniture_5.jpg'
    ],
    [
        'id' => 174,
        'name' => 'Dining Table 6 Seater',
        'description' => 'Glass top, Metal frame, Contemporary',
        'price' => 18999,
        'stock' => 12,
        'category' => 'Furniture',
        'image' => 'furniture_6.jpg'
    ],
    [
        'id' => 175,
        'name' => 'TV Unit Entertainment',
        'description' => 'Wall mount, LED lights, 150cm',
        'price' => 9999,
        'stock' => 18,
        'category' => 'Furniture',
        'image' => 'furniture_7.jpg'
    ],
    [
        'id' => 176,
        'name' => 'Wardrobe 3 Door',
        'description' => 'Mirror, Sliding doors, Spacious',
        'price' => 28999,
        'stock' => 10,
        'category' => 'Furniture',
        'image' => 'furniture_8.jpg'
    ],
    [
        'id' => 177,
        'name' => 'Car Dash Camera 4K',
        'description' => 'Night vision, GPS, Wide angle 170°',
        'price' => 5999,
        'stock' => 40,
        'category' => 'Automotive',
        'image' => 'auto_1.jpg'
    ],
    [
        'id' => 178,
        'name' => 'Jump Starter Power Bank',
        'description' => '20000mAh, 12V, Emergency start',
        'price' => 4999,
        'stock' => 50,
        'category' => 'Automotive',
        'image' => 'auto_2.jpg'
    ],
    [
        'id' => 179,
        'name' => 'Car Vacuum Cleaner',
        'description' => 'Cordless, Powerful suction, Portable',
        'price' => 2499,
        'stock' => 60,
        'category' => 'Automotive',
        'image' => 'auto_3.jpg'
    ],
    [
        'id' => 180,
        'name' => 'Seat Cover Set Universal',
        'description' => 'PU leather, 5 seater, Waterproof',
        'price' => 3999,
        'stock' => 35,
        'category' => 'Automotive',
        'image' => 'auto_4.jpg'
    ],
    [
        'id' => 181,
        'name' => 'Car Phone Holder Magnetic',
        'description' => '360 rotation, Dashboard mount',
        'price' => 599,
        'stock' => 150,
        'category' => 'Automotive',
        'image' => 'auto_5.jpg'
    ],
    [
        'id' => 182,
        'name' => 'Tire Inflator Digital',
        'description' => 'Portable, Auto stop, LED light',
        'price' => 1999,
        'stock' => 70,
        'category' => 'Automotive',
        'image' => 'auto_6.jpg'
    ],
    [
        'id' => 183,
        'name' => 'Car Perfume Premium',
        'description' => 'Long lasting, Multiple fragrances',
        'price' => 499,
        'stock' => 200,
        'category' => 'Automotive',
        'image' => 'auto_7.jpg'
    ],
    [
        'id' => 184,
        'name' => 'Steering Wheel Cover',
        'description' => 'Leather, Anti-slip, Breathable',
        'price' => 799,
        'stock' => 100,
        'category' => 'Automotive',
        'image' => 'auto_8.jpg'
    ],
    [
        'id' => 185,
        'name' => 'Basmati Rice 5kg Premium',
        'description' => 'Aromatic, Long grain, Aged',
        'price' => 899,
        'stock' => 100,
        'category' => 'Groceries',
        'image' => 'grocery_1.jpg'
    ],
    [
        'id' => 186,
        'name' => 'Extra Virgin Olive Oil 1L',
        'description' => 'Cold pressed, Italian, Cooking',
        'price' => 1299,
        'stock' => 60,
        'category' => 'Groceries',
        'image' => 'grocery_2.jpg'
    ],
    [
        'id' => 187,
        'name' => 'Honey Pure 500g',
        'description' => 'Organic, Raw, Sundarban honey',
        'price' => 699,
        'stock' => 80,
        'category' => 'Groceries',
        'image' => 'grocery_3.jpg'
    ],
    [
        'id' => 188,
        'name' => 'Nescafe Coffee 200g',
        'description' => 'Instant, Classic, Premium blend',
        'price' => 649,
        'stock' => 120,
        'category' => 'Groceries',
        'image' => 'grocery_4.jpg'
    ],
    [
        'id' => 189,
        'name' => 'Mixed Nuts 500g',
        'description' => 'Almonds, Cashews, Walnuts, Raisins',
        'price' => 999,
        'stock' => 90,
        'category' => 'Groceries',
        'image' => 'grocery_5.jpg'
    ],
    [
        'id' => 190,
        'name' => 'Green Tea 100 Bags',
        'description' => 'Lipton, Detox, Weight management',
        'price' => 549,
        'stock' => 150,
        'category' => 'Groceries',
        'image' => 'grocery_6.jpg'
    ],
    [
        'id' => 191,
        'name' => 'Ghee Pure 400g',
        'description' => 'Aarong, Clarified butter, Traditional',
        'price' => 599,
        'stock' => 100,
        'category' => 'Groceries',
        'image' => 'grocery_7.jpg'
    ],
    [
        'id' => 192,
        'name' => 'Date Syrup 400ml',
        'description' => 'Natural sweetener, Healthy, Premium',
        'price' => 449,
        'stock' => 80,
        'category' => 'Groceries',
        'image' => 'grocery_8.jpg'
    ],
    [
        'id' => 193,
        'name' => 'Wall Clock Modern',
        'description' => 'Silent sweep, 12 inch, Minimalist design',
        'price' => 1299,
        'stock' => 60,
        'category' => 'Home Decor',
        'image' => 'decor_1.jpg'
    ],
    [
        'id' => 194,
        'name' => 'LED String Lights 10m',
        'description' => 'Warm white, Waterproof, USB powered',
        'price' => 599,
        'stock' => 150,
        'category' => 'Home Decor',
        'image' => 'decor_2.jpg'
    ],
    [
        'id' => 195,
        'name' => 'Artificial Plant Set 3',
        'description' => 'Succulents, Ceramic pots, No maintenance',
        'price' => 899,
        'stock' => 80,
        'category' => 'Home Decor',
        'image' => 'decor_3.jpg'
    ],
    [
        'id' => 196,
        'name' => 'Photo Frame Collage',
        'description' => '8 photos, Wooden, Wall mount',
        'price' => 1499,
        'stock' => 50,
        'category' => 'Home Decor',
        'image' => 'decor_4.jpg'
    ],
    [
        'id' => 197,
        'name' => 'Curtains Blackout 2pcs',
        'description' => 'Room darkening, Thermal insulated',
        'price' => 1999,
        'stock' => 40,
        'category' => 'Home Decor',
        'image' => 'decor_5.jpg'
    ],
    [
        'id' => 198,
        'name' => 'Throw Pillow Covers 4pcs',
        'description' => 'Velvet, 18x18 inch, Multiple colors',
        'price' => 799,
        'stock' => 100,
        'category' => 'Home Decor',
        'image' => 'decor_6.jpg'
    ],
    [
        'id' => 199,
        'name' => 'Table Lamp Touch',
        'description' => 'LED, Dimmable, USB charging, Modern',
        'price' => 1599,
        'stock' => 45,
        'category' => 'Home Decor',
        'image' => 'decor_7.jpg'
    ],
    [
        'id' => 200,
        'name' => 'Area Rug 5x8 ft',
        'description' => 'Soft, Non-slip backing, Geometric pattern',
        'price' => 4999,
        'stock' => 25,
        'category' => 'Home Decor',
        'image' => 'decor_8.jpg'
    ],
];

$action = isset($_GET['action']) ? $_GET['action'] : 'list';

switch ($action) {
    case 'list':
        echo json_encode(['success' => true, 'products' => $mock_products]);
        break;
        
    case 'get':
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $product = null;
        foreach ($mock_products as $p) {
            if ($p['id'] == $id) {
                $product = $p;
                break;
            }
        }
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
        echo json_encode(['success' => true, 'message' => 'Product deleted (mocked)']);
        break;
        
    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
}
?>