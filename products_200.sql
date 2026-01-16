-- =============================================
-- E-Shop Bangladesh - 200 Products, 25 Categories
-- Complete Product Catalog
-- =============================================

USE ecommerce_db;

-- Clear existing products (optional)
TRUNCATE TABLE cart;
DELETE FROM order_details;
DELETE FROM products;

-- Reset auto increment
ALTER TABLE products AUTO_INCREMENT = 1;

-- =============================================
-- INSERT 200 PRODUCTS (8 per category, 25 categories)
-- =============================================

-- 1. SMARTPHONES (1-8)
INSERT INTO products (name, description, price, stock, category, image) VALUES
('Samsung Galaxy S24 Ultra', '6.8" Dynamic AMOLED, 200MP Camera, 12GB RAM', 159999, 25, 'Smartphones', 'smartphone_1.jpg'),
('iPhone 15 Pro Max', 'A17 Pro chip, Titanium design, 48MP Camera', 189999, 20, 'Smartphones', 'smartphone_2.jpg'),
('Xiaomi 14 Ultra', 'Leica optics, Snapdragon 8 Gen 3, 5000mAh', 89999, 30, 'Smartphones', 'smartphone_3.jpg'),
('OnePlus 12', 'Hasselblad Camera, 100W charging, 16GB RAM', 79999, 35, 'Smartphones', 'smartphone_4.jpg'),
('Realme GT 5 Pro', 'Snapdragon 8 Gen 3, 144Hz Display, 50MP', 54999, 40, 'Smartphones', 'smartphone_5.jpg'),
('Vivo X100 Pro', 'Zeiss Camera, Dimensity 9300, AMOLED', 74999, 25, 'Smartphones', 'smartphone_6.jpg'),
('OPPO Find X7', '50MP Triple Camera, 100W SuperVOOC', 69999, 30, 'Smartphones', 'smartphone_7.jpg'),
('Google Pixel 8 Pro', 'Tensor G3, Best Android Camera, 7 years updates', 109999, 15, 'Smartphones', 'smartphone_8.jpg'),

-- 2. LAPTOPS (9-16)
('Dell XPS 15', 'Intel i7, 16GB RAM, 512GB SSD, 4K OLED', 185000, 10, 'Laptops', 'laptop_1.jpg'),
('MacBook Air M3', 'Apple M3 chip, 15" Liquid Retina, 18hr battery', 175000, 12, 'Laptops', 'laptop_2.jpg'),
('HP Pavilion 15', 'AMD Ryzen 7, 16GB RAM, 512GB SSD', 75000, 25, 'Laptops', 'laptop_3.jpg'),
('Lenovo ThinkPad X1', 'Intel i7, 32GB RAM, 1TB SSD, Business laptop', 195000, 8, 'Laptops', 'laptop_4.jpg'),
('ASUS ROG Strix G16', 'RTX 4070, Intel i9, 32GB RAM Gaming', 225000, 10, 'Laptops', 'laptop_5.jpg'),
('Acer Nitro 5', 'RTX 4050, AMD Ryzen 7, 16GB RAM Gaming', 95000, 20, 'Laptops', 'laptop_6.jpg'),
('Microsoft Surface Pro 9', 'Intel i7, 16GB, 256GB, 2-in-1 tablet', 145000, 15, 'Laptops', 'laptop_7.jpg'),
('MSI Creator Z16', 'RTX 4060, i7, 4K Mini LED, Content Creator', 215000, 6, 'Laptops', 'laptop_8.jpg'),

-- 3. HEADPHONES (17-24)
('Sony WH-1000XM5', 'Best-in-class ANC, 30hr battery, LDAC', 32999, 40, 'Headphones', 'headphone_1.jpg'),
('Apple AirPods Pro 2', 'Active Noise Cancellation, Spatial Audio', 28999, 50, 'Headphones', 'headphone_2.jpg'),
('JBL Tour One M2', 'True Adaptive ANC, 50hr playtime', 24999, 35, 'Headphones', 'headphone_3.jpg'),
('Bose QuietComfort Ultra', 'Immersive Audio, CustomTune technology', 35999, 25, 'Headphones', 'headphone_4.jpg'),
('Samsung Galaxy Buds2 Pro', '360 Audio, ANC, IPX7 waterproof', 14999, 60, 'Headphones', 'headphone_5.jpg'),
('Sennheiser Momentum 4', 'Audiophile sound, 60hr battery', 29999, 20, 'Headphones', 'headphone_6.jpg'),
('Audio-Technica ATH-M50x', 'Studio monitor headphones, Professional', 12999, 45, 'Headphones', 'headphone_7.jpg'),
('Beats Studio Pro', 'Personalized Spatial Audio, USB-C', 27999, 30, 'Headphones', 'headphone_8.jpg'),

-- 4. SMARTWATCHES (25-32)
('Apple Watch Series 9', 'Always-on Retina, Blood O2, ECG', 54999, 30, 'Smartwatches', 'watch_1.jpg'),
('Samsung Galaxy Watch 6', 'BioActive Sensor, Wear OS, Sapphire Glass', 29999, 40, 'Smartwatches', 'watch_2.jpg'),
('Garmin Fenix 7', 'Multi-sport GPS, Solar charging, 28 days battery', 69999, 15, 'Smartwatches', 'watch_3.jpg'),
('Fitbit Sense 2', 'Stress management, ECG, Sleep tracking', 24999, 35, 'Smartwatches', 'watch_4.jpg'),
('Amazfit GTR 4', 'AMOLED, GPS, 14-day battery, 150+ sports', 17999, 50, 'Smartwatches', 'watch_5.jpg'),
('Huawei Watch GT 4', 'Stylish design, TruSeen 5.5, 14 days battery', 22999, 40, 'Smartwatches', 'watch_6.jpg'),
('Xiaomi Watch S3', 'HyperOS, Rotating bezel, 5ATM water resist', 14999, 55, 'Smartwatches', 'watch_7.jpg'),
('OnePlus Watch 2', 'Wear OS, Dual-Engine Architecture, 100hr battery', 27999, 25, 'Smartwatches', 'watch_8.jpg'),

-- 5. CAMERAS (33-40)
('Canon EOS R6 Mark II', 'Full-frame mirrorless, 24.2MP, 40fps', 285000, 8, 'Cameras', 'camera_1.jpg'),
('Sony A7 IV', '33MP Full-frame, 4K 60p, Real-time Eye AF', 265000, 10, 'Cameras', 'camera_2.jpg'),
('Nikon Z8', '45.7MP, 8K video, In-body stabilization', 385000, 5, 'Cameras', 'camera_3.jpg'),
('Fujifilm X-T5', '40.2MP APS-C, Film simulations, Compact', 175000, 12, 'Cameras', 'camera_4.jpg'),
('GoPro Hero 12 Black', '5.3K60, HyperSmooth 6.0, Waterproof', 45999, 30, 'Cameras', 'camera_5.jpg'),
('DJI Osmo Pocket 3', '4K 120fps, 1" CMOS sensor, Gimbal camera', 55999, 20, 'Cameras', 'camera_6.jpg'),
('Canon PowerShot G7X III', 'Compact vlogging camera, 4K, Flip screen', 65999, 15, 'Cameras', 'camera_7.jpg'),
('Insta360 X4', '8K 360° camera, AI editing, FlowState', 49999, 18, 'Cameras', 'camera_8.jpg'),

-- 6. TELEVISIONS (41-48)
('Samsung 65" Neo QLED 8K', 'QN800C, Neural Quantum Processor, Dolby Atmos', 375000, 5, 'Televisions', 'tv_1.jpg'),
('LG 55" OLED C3', 'α9 AI Processor, Dolby Vision, 120Hz', 145000, 12, 'Televisions', 'tv_2.jpg'),
('Sony 65" Bravia XR A80L', 'OLED, Cognitive Processor XR, Google TV', 195000, 8, 'Televisions', 'tv_3.jpg'),
('TCL 55" QLED C745', '144Hz Game Master, Dolby Vision, HDMI 2.1', 55999, 25, 'Televisions', 'tv_4.jpg'),
('Xiaomi TV A Pro 55"', '4K UHD, Dolby Vision, Google TV', 45999, 30, 'Televisions', 'tv_5.jpg'),
('Hisense 65" U7K', 'Mini-LED, 144Hz, Game Mode Pro', 89999, 15, 'Televisions', 'tv_6.jpg'),
('Samsung 50" Crystal UHD', 'Dynamic Crystal Color, Smart Hub', 42999, 35, 'Televisions', 'tv_7.jpg'),
('LG 43" UQ8000', '4K AI ThinQ, WebOS, HDR10 Pro', 38999, 40, 'Televisions', 'tv_8.jpg'),

-- 7. HOME APPLIANCES (49-56)
('Samsung 670L Refrigerator', 'Side-by-side, SpaceMax, Digital Inverter', 125000, 10, 'Home Appliances', 'appliance_1.jpg'),
('LG 10kg Front Load Washer', 'AI DD, Steam, TurboWash360', 65000, 15, 'Home Appliances', 'appliance_2.jpg'),
('Panasonic 1.5 Ton AC', 'Inverter, nanoe X, 5-star rating', 75000, 20, 'Home Appliances', 'appliance_3.jpg'),
('Dyson V15 Detect', 'Cordless vacuum, Laser dust detection', 68000, 12, 'Home Appliances', 'appliance_4.jpg'),
('Philips Air Fryer XXL', '7.3L capacity, Rapid Air, Fat removal', 22999, 30, 'Home Appliances', 'appliance_5.jpg'),
('Samsung Microwave 32L', 'Convection, Ceramic enamel cavity', 15999, 40, 'Home Appliances', 'appliance_6.jpg'),
('Singer Blender Pro', '1500W, 6 blades, Ice crushing', 4999, 60, 'Home Appliances', 'appliance_7.jpg'),
('Walton Deep Freezer 300L', 'Convertible, Tropicalized compressor', 45000, 18, 'Home Appliances', 'appliance_8.jpg'),

-- 8. MEN'S FASHION (57-64)
('Slim Fit Formal Shirt', 'Cotton blend, Wrinkle-free, Business wear', 1899, 100, 'Men Fashion', 'men_1.jpg'),
('Premium Denim Jeans', 'Stretch fit, Dark wash, Comfortable', 2499, 80, 'Men Fashion', 'men_2.jpg'),
('Leather Executive Belt', 'Genuine leather, Auto-lock buckle', 899, 120, 'Men Fashion', 'men_3.jpg'),
('Casual Polo T-Shirt', 'Cotton pique, Embroidered logo, Breathable', 1299, 150, 'Men Fashion', 'men_4.jpg'),
('Wool Blend Blazer', 'Slim fit, Two-button, Formal occasions', 5999, 40, 'Men Fashion', 'men_5.jpg'),
('Cotton Chino Pants', 'Regular fit, Multiple colors, Office wear', 1799, 90, 'Men Fashion', 'men_6.jpg'),
('Sports Track Suit', 'Polyester, Moisture-wicking, Athleisure', 2299, 70, 'Men Fashion', 'men_7.jpg'),
('Leather Wallet', 'RFID blocking, Multiple card slots, Gift box', 799, 200, 'Men Fashion', 'men_8.jpg'),

-- 9. WOMEN'S FASHION (65-72)
('Embroidered Kameez', 'Cotton lawn, Pakistani design, Summer wear', 2599, 80, 'Women Fashion', 'women_1.jpg'),
('Designer Saree', 'Silk blend, Party wear, Heavy border', 4999, 50, 'Women Fashion', 'women_2.jpg'),
('Trendy Kurti Set', 'Rayon, Printed, With palazzo pants', 1899, 100, 'Women Fashion', 'women_3.jpg'),
('Western Maxi Dress', 'Floral print, Summer collection, Flowy', 2299, 60, 'Women Fashion', 'women_4.jpg'),
('Formal Trousers', 'High waist, Straight fit, Office wear', 1599, 90, 'Women Fashion', 'women_5.jpg'),
('Embellished Handbag', 'PU leather, Multiple compartments, Stylish', 1299, 70, 'Women Fashion', 'women_6.jpg'),
('Pearl Jewelry Set', 'Necklace + Earrings, Wedding collection', 999, 120, 'Women Fashion', 'women_7.jpg'),
('Printed Scarf Hijab', 'Premium chiffon, Multiple designs available', 499, 200, 'Women Fashion', 'women_8.jpg'),

-- 10. FOOTWEAR (73-80)
('Nike Air Max 270', 'Running shoes, Air cushioning, Breathable', 12999, 50, 'Footwear', 'shoe_1.jpg'),
('Adidas Ultraboost 24', 'Boost midsole, Primeknit upper, Running', 15999, 40, 'Footwear', 'shoe_2.jpg'),
('Bata Formal Oxford', 'Genuine leather, Office wear, Classic', 3999, 80, 'Footwear', 'shoe_3.jpg'),
('Apex Sports Sandal', 'Comfortable, Daily wear, Durable', 1299, 120, 'Footwear', 'shoe_4.jpg'),
('Nike Air Jordan 1', 'Iconic basketball shoe, Limited edition', 18999, 25, 'Footwear', 'shoe_5.jpg'),
('Woodland Hiking Boots', 'Waterproof, Trekking, Rugged terrain', 6999, 35, 'Footwear', 'shoe_6.jpg'),
('Crocs Classic Clog', 'Lightweight, Comfortable, Water-friendly', 3499, 100, 'Footwear', 'shoe_7.jpg'),
('Puma RS-X', 'Retro running, Bold design, Street style', 8999, 45, 'Footwear', 'shoe_8.jpg'),

-- 11. GAMING (81-88)
('PlayStation 5', 'Digital Edition, DualSense controller, 825GB', 65000, 15, 'Gaming', 'gaming_1.jpg'),
('Xbox Series X', '12 TFLOPS, 4K 120fps, 1TB SSD', 62000, 12, 'Gaming', 'gaming_2.jpg'),
('Nintendo Switch OLED', '7" OLED screen, 64GB, Enhanced audio', 42000, 25, 'Gaming', 'gaming_3.jpg'),
('Razer BlackWidow V4', 'Mechanical keyboard, RGB, Gaming grade', 15999, 35, 'Gaming', 'gaming_4.jpg'),
('Logitech G Pro X', 'Wireless gaming mouse, HERO 25K sensor', 12999, 40, 'Gaming', 'gaming_5.jpg'),
('SteelSeries Arctis Nova Pro', 'Wireless gaming headset, ANC, Hi-Fi', 29999, 20, 'Gaming', 'gaming_6.jpg'),
('Elgato Stream Deck MK.2', '15 LCD keys, Streaming control', 18999, 25, 'Gaming', 'gaming_7.jpg'),
('HyperX Cloud III', 'Gaming headset, DTS Spatial Audio', 9999, 50, 'Gaming', 'gaming_8.jpg'),

-- 12. BOOKS (89-96)
('Atomic Habits - James Clear', 'Self-improvement bestseller, Hardcover', 899, 100, 'Books', 'book_1.jpg'),
('The Psychology of Money', 'Morgan Housel, Financial wisdom', 799, 80, 'Books', 'book_2.jpg'),
('Rich Dad Poor Dad', 'Robert Kiyosaki, Personal finance classic', 699, 120, 'Books', 'book_3.jpg'),
('Ikigai', 'Japanese secret to long and happy life', 599, 90, 'Books', 'book_4.jpg'),
('The Alchemist', 'Paulo Coelho, Inspirational fiction', 549, 150, 'Books', 'book_5.jpg'),
('Think and Grow Rich', 'Napoleon Hill, Success principles', 649, 85, 'Books', 'book_6.jpg'),
('Start With Why', 'Simon Sinek, Leadership & motivation', 899, 70, 'Books', 'book_7.jpg'),
('Deep Work', 'Cal Newport, Productivity masterpiece', 799, 75, 'Books', 'book_8.jpg'),

-- 13. BEAUTY & SKINCARE (97-104)
('The Ordinary Niacinamide 10%', 'Blemish & pore formula, 30ml', 1299, 80, 'Beauty', 'beauty_1.jpg'),
('CeraVe Moisturizing Cream', 'With ceramides, 453g, For dry skin', 2499, 60, 'Beauty', 'beauty_2.jpg'),
('Maybelline Fit Me Foundation', 'Matte + Poreless, SPF 18, 30ml', 899, 100, 'Beauty', 'beauty_3.jpg'),
('L Oreal Paris Hair Serum', 'Extraordinary Oil, Frizz control, 100ml', 1199, 75, 'Beauty', 'beauty_4.jpg'),
('Himalaya Neem Face Wash', 'Purifying, Soap-free, 150ml', 349, 200, 'Beauty', 'beauty_5.jpg'),
('Neutrogena Sunscreen SPF 50', 'Ultra Sheer, Dry-Touch, 88ml', 1599, 90, 'Beauty', 'beauty_6.jpg'),
('MAC Ruby Woo Lipstick', 'Matte, Iconic red shade, Long-wearing', 2999, 50, 'Beauty', 'beauty_7.jpg'),
('Dove Body Lotion 400ml', 'Deep moisture, 48hr hydration', 549, 150, 'Beauty', 'beauty_8.jpg'),

-- 14. HEALTH & FITNESS (105-112)
('Whey Protein Isolate 2kg', 'Optimum Nutrition, 24g protein/serving', 8999, 40, 'Health & Fitness', 'fitness_1.jpg'),
('Resistance Bands Set', '5 levels, Workout guide included', 1299, 100, 'Health & Fitness', 'fitness_2.jpg'),
('Yoga Mat 6mm', 'Non-slip, Eco-friendly, Carrying strap', 999, 120, 'Health & Fitness', 'fitness_3.jpg'),
('Adjustable Dumbbells 20kg', 'Space-saving, Multiple weights', 5999, 30, 'Health & Fitness', 'fitness_4.jpg'),
('Digital Body Scale', 'BMI, Body fat, Muscle mass, Bluetooth', 2499, 80, 'Health & Fitness', 'fitness_5.jpg'),
('Multivitamin 90 Tablets', 'Complete A-Z, Daily nutrition', 1199, 150, 'Health & Fitness', 'fitness_6.jpg'),
('Jump Rope Speed', 'Steel cable, Adjustable, Cardio workout', 599, 200, 'Health & Fitness', 'fitness_7.jpg'),
('Foam Roller 45cm', 'Deep tissue massage, Muscle recovery', 1499, 60, 'Health & Fitness', 'fitness_8.jpg'),

-- 15. BABY PRODUCTS (113-120)
('Pampers Diapers Large 64pcs', 'Baby dry, 12hr protection', 1899, 100, 'Baby Products', 'baby_1.jpg'),
('Baby Stroller Premium', 'Foldable, Reclining, Rain cover included', 12999, 20, 'Baby Products', 'baby_2.jpg'),
('Feeding Bottle Set 3pcs', 'Anti-colic, BPA free, Different sizes', 1299, 80, 'Baby Products', 'baby_3.jpg'),
('Baby Car Seat', 'ISOFIX, 0-36kg, 360 rotation', 15999, 15, 'Baby Products', 'baby_4.jpg'),
('Soft Toy Teddy Bear', '60cm, Premium plush, Washable', 999, 150, 'Baby Products', 'baby_5.jpg'),
('Baby Monitor Camera', 'Night vision, Two-way audio, WiFi', 4999, 35, 'Baby Products', 'baby_6.jpg'),
('Organic Baby Wipes 80pcs', 'Fragrance-free, Sensitive skin', 349, 200, 'Baby Products', 'baby_7.jpg'),
('Baby Walker', 'Musical, Height adjustable, Safe brake', 3499, 40, 'Baby Products', 'baby_8.jpg'),

-- 16. PET SUPPLIES (121-128)
('Royal Canin Dog Food 10kg', 'Adult, Complete nutrition, Premium', 7999, 30, 'Pet Supplies', 'pet_1.jpg'),
('Cat Litter Box Enclosed', 'Odor control, Easy clean, Large size', 2999, 40, 'Pet Supplies', 'pet_2.jpg'),
('Pet Carrier Bag', 'Airline approved, Breathable mesh', 2499, 50, 'Pet Supplies', 'pet_3.jpg'),
('Dog Collar LED', 'Rechargeable, Night visibility, Waterproof', 899, 80, 'Pet Supplies', 'pet_4.jpg'),
('Cat Scratching Post', 'Sisal rope, Multi-level, With toys', 3999, 35, 'Pet Supplies', 'pet_5.jpg'),
('Pet Grooming Kit', 'Brush, nail clipper, shampoo set', 1599, 60, 'Pet Supplies', 'pet_6.jpg'),
('Automatic Pet Feeder', 'Programmable, 4L capacity, WiFi', 4999, 25, 'Pet Supplies', 'pet_7.jpg'),
('Dog Bed Orthopedic', 'Memory foam, Washable cover, Large', 3499, 45, 'Pet Supplies', 'pet_8.jpg'),

-- 17. STATIONERY (129-136)
('Parker Jotter Pen Set', 'Ballpoint + Fountain, Gift box', 1999, 60, 'Stationery', 'stationery_1.jpg'),
('A4 Notebook Premium 200pg', 'Leather cover, Ruled, Bookmark', 499, 150, 'Stationery', 'stationery_2.jpg'),
('Staedtler Color Pencils 48', 'Professional, Vibrant colors, Soft lead', 1299, 80, 'Stationery', 'stationery_3.jpg'),
('Desk Organizer Set', 'Acrylic, 6 compartments, Modern', 899, 70, 'Stationery', 'stationery_4.jpg'),
('Scientific Calculator', 'Casio FX-991EX, 552 functions', 2199, 100, 'Stationery', 'stationery_5.jpg'),
('Whiteboard 60x90cm', 'Magnetic, Aluminum frame, Markers included', 1499, 40, 'Stationery', 'stationery_6.jpg'),
('Sticky Notes Neon 5 Pack', 'Self-adhesive, Multiple sizes', 299, 200, 'Stationery', 'stationery_7.jpg'),
('File Folder Organizer', 'Expandable, 13 pockets, A4 size', 599, 120, 'Stationery', 'stationery_8.jpg'),

-- 18. JEWELRY (137-144)
('Gold Plated Necklace', '22K gold plated, Traditional design', 4999, 40, 'Jewelry', 'jewelry_1.jpg'),
('Diamond Studs Earrings', 'Sterling silver, CZ stones, Daily wear', 2499, 60, 'Jewelry', 'jewelry_2.jpg'),
('Silver Bangles Set 4pcs', '925 Sterling silver, Oxidized finish', 3999, 50, 'Jewelry', 'jewelry_3.jpg'),
('Pearl Pendant Necklace', 'Freshwater pearl, Gold chain', 1999, 70, 'Jewelry', 'jewelry_4.jpg'),
('Men Bracelet Leather', 'Stainless steel clasp, Braided', 899, 100, 'Jewelry', 'jewelry_5.jpg'),
('Bridal Jewelry Set', 'Complete set, Stone work, Wedding', 12999, 25, 'Jewelry', 'jewelry_6.jpg'),
('Anklet Gold Tone', 'Bells, Traditional Bangladeshi design', 599, 150, 'Jewelry', 'jewelry_7.jpg'),
('Ring Adjustable Fashion', 'Rose gold plated, Crystal flower', 499, 200, 'Jewelry', 'jewelry_8.jpg'),

-- 19. BAGS & LUGGAGE (145-152)
('Samsonite Cabin Trolley', '55cm, Hard shell, TSA lock, 35L', 18999, 20, 'Bags & Luggage', 'bag_1.jpg'),
('Laptop Backpack 17"', 'Anti-theft, USB charging port, Waterproof', 2999, 60, 'Bags & Luggage', 'bag_2.jpg'),
('Travel Duffel Bag', 'Canvas, Large capacity, Gym bag', 1799, 80, 'Bags & Luggage', 'bag_3.jpg'),
('Ladies Handbag Tote', 'PU leather, Spacious, Office bag', 2499, 50, 'Bags & Luggage', 'bag_4.jpg'),
('Kids School Bag', 'Cartoon design, Lightweight, Padded', 999, 120, 'Bags & Luggage', 'bag_5.jpg'),
('Messenger Bag Leather', 'Crossbody, Vintage style, Unisex', 1999, 45, 'Bags & Luggage', 'bag_6.jpg'),
('3-Piece Luggage Set', 'Trolley bags, Spinner wheels, Nesting', 15999, 15, 'Bags & Luggage', 'bag_7.jpg'),
('Sling Bag Compact', 'Water-resistant, Multiple pockets', 899, 100, 'Bags & Luggage', 'bag_8.jpg'),

-- 20. SPORTS (153-160)
('Yonex Badminton Racket', 'Astrox 88D, Professional, Carbon frame', 12999, 30, 'Sports', 'sports_1.jpg'),
('Adidas Football Size 5', 'FIFA approved, Training ball', 2999, 50, 'Sports', 'sports_2.jpg'),
('Cricket Bat English Willow', 'Grade A, Full size, Heavy weight', 8999, 25, 'Sports', 'sports_3.jpg'),
('Table Tennis Set', '2 rackets, 3 balls, Net, Complete set', 1499, 60, 'Sports', 'sports_4.jpg'),
('Spalding Basketball Size 7', 'Indoor/Outdoor, Composite leather', 3499, 40, 'Sports', 'sports_5.jpg'),
('Swimming Goggles', 'Anti-fog, UV protection, Adjustable', 799, 100, 'Sports', 'sports_6.jpg'),
('Gym Gloves', 'Weight lifting, Wrist support, Breathable', 599, 120, 'Sports', 'sports_7.jpg'),
('Bicycle Helmet Adult', 'Adjustable, Ventilated, Safety certified', 1999, 45, 'Sports', 'sports_8.jpg'),

-- 21. KITCHEN (161-168)
('Prestige Pressure Cooker 5L', 'Stainless steel, Induction base', 4999, 40, 'Kitchen', 'kitchen_1.jpg'),
('Non-Stick Cookware Set', '7 pieces, Granite coating, PFOA free', 5999, 30, 'Kitchen', 'kitchen_2.jpg'),
('Electric Kettle 1.8L', 'Stainless steel, Auto shut-off', 1299, 80, 'Kitchen', 'kitchen_3.jpg'),
('Dinner Set 41pcs', 'Melamine, Unbreakable, Dishwasher safe', 3999, 25, 'Kitchen', 'kitchen_4.jpg'),
('Food Storage Containers', '17 pieces, Airtight, BPA free', 1499, 100, 'Kitchen', 'kitchen_5.jpg'),
('Knife Set with Block', '8 pieces, Stainless steel, Sharp', 2499, 50, 'Kitchen', 'kitchen_6.jpg'),
('Rice Cooker 2.8L', 'Non-stick pot, Keep warm, Touch panel', 2999, 60, 'Kitchen', 'kitchen_7.jpg'),
('Water Purifier RO', 'TDS controller, UV+UF, 8L storage', 12999, 20, 'Kitchen', 'kitchen_8.jpg'),

-- 22. FURNITURE (169-176)
('Executive Office Chair', 'Ergonomic, Mesh back, Lumbar support', 12999, 15, 'Furniture', 'furniture_1.jpg'),
('Study Table Wooden', 'With drawers, Computer desk, 120cm', 8999, 20, 'Furniture', 'furniture_2.jpg'),
('Sofa Set 3+1+1', 'Fabric upholstery, Modern design', 45999, 8, 'Furniture', 'furniture_3.jpg'),
('Bookshelf 5 Tier', 'Particle board, Wall mount, Industrial', 4999, 25, 'Furniture', 'furniture_4.jpg'),
('Bed King Size', 'With storage, Hydraulic lift, Engineered wood', 35999, 10, 'Furniture', 'furniture_5.jpg'),
('Dining Table 6 Seater', 'Glass top, Metal frame, Contemporary', 18999, 12, 'Furniture', 'furniture_6.jpg'),
('TV Unit Entertainment', 'Wall mount, LED lights, 150cm', 9999, 18, 'Furniture', 'furniture_7.jpg'),
('Wardrobe 3 Door', 'Mirror, Sliding doors, Spacious', 28999, 10, 'Furniture', 'furniture_8.jpg'),

-- 23. AUTOMOTIVE (177-184)
('Car Dash Camera 4K', 'Night vision, GPS, Wide angle 170°', 5999, 40, 'Automotive', 'auto_1.jpg'),
('Jump Starter Power Bank', '20000mAh, 12V, Emergency start', 4999, 50, 'Automotive', 'auto_2.jpg'),
('Car Vacuum Cleaner', 'Cordless, Powerful suction, Portable', 2499, 60, 'Automotive', 'auto_3.jpg'),
('Seat Cover Set Universal', 'PU leather, 5 seater, Waterproof', 3999, 35, 'Automotive', 'auto_4.jpg'),
('Car Phone Holder Magnetic', '360 rotation, Dashboard mount', 599, 150, 'Automotive', 'auto_5.jpg'),
('Tire Inflator Digital', 'Portable, Auto stop, LED light', 1999, 70, 'Automotive', 'auto_6.jpg'),
('Car Perfume Premium', 'Long lasting, Multiple fragrances', 499, 200, 'Automotive', 'auto_7.jpg'),
('Steering Wheel Cover', 'Leather, Anti-slip, Breathable', 799, 100, 'Automotive', 'auto_8.jpg'),

-- 24. GROCERIES (185-192)
('Basmati Rice 5kg Premium', 'Aromatic, Long grain, Aged', 899, 100, 'Groceries', 'grocery_1.jpg'),
('Extra Virgin Olive Oil 1L', 'Cold pressed, Italian, Cooking', 1299, 60, 'Groceries', 'grocery_2.jpg'),
('Honey Pure 500g', 'Organic, Raw, Sundarban honey', 699, 80, 'Groceries', 'grocery_3.jpg'),
('Nescafe Coffee 200g', 'Instant, Classic, Premium blend', 649, 120, 'Groceries', 'grocery_4.jpg'),
('Mixed Nuts 500g', 'Almonds, Cashews, Walnuts, Raisins', 999, 90, 'Groceries', 'grocery_5.jpg'),
('Green Tea 100 Bags', 'Lipton, Detox, Weight management', 549, 150, 'Groceries', 'grocery_6.jpg'),
('Ghee Pure 400g', 'Aarong, Clarified butter, Traditional', 599, 100, 'Groceries', 'grocery_7.jpg'),
('Date Syrup 400ml', 'Natural sweetener, Healthy, Premium', 449, 80, 'Groceries', 'grocery_8.jpg'),

-- 25. HOME DECOR (193-200)
('Wall Clock Modern', 'Silent sweep, 12 inch, Minimalist design', 1299, 60, 'Home Decor', 'decor_1.jpg'),
('LED String Lights 10m', 'Warm white, Waterproof, USB powered', 599, 150, 'Home Decor', 'decor_2.jpg'),
('Artificial Plant Set 3', 'Succulents, Ceramic pots, No maintenance', 899, 80, 'Home Decor', 'decor_3.jpg'),
('Photo Frame Collage', '8 photos, Wooden, Wall mount', 1499, 50, 'Home Decor', 'decor_4.jpg'),
('Curtains Blackout 2pcs', 'Room darkening, Thermal insulated', 1999, 40, 'Home Decor', 'decor_5.jpg'),
('Throw Pillow Covers 4pcs', 'Velvet, 18x18 inch, Multiple colors', 799, 100, 'Home Decor', 'decor_6.jpg'),
('Table Lamp Touch', 'LED, Dimmable, USB charging, Modern', 1599, 45, 'Home Decor', 'decor_7.jpg'),
('Area Rug 5x8 ft', 'Soft, Non-slip backing, Geometric pattern', 4999, 25, 'Home Decor', 'decor_8.jpg');

-- Verify insertion
SELECT category, COUNT(*) as product_count FROM products GROUP BY category ORDER BY category;
SELECT COUNT(*) as total_products FROM products;
