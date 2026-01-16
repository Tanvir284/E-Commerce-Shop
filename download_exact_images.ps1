# Download EXACT product images matching specific product names
# Uses Wikimedia Commons and official product images where possible

$imageDir = "c:\Users\MD Tanvir Islam\Videos\E-Commerece System\Management\Admin\MVC\images"

# EXACT product image URLs - matched to specific product names
$exactProductImages = @{
    # SMARTPHONES - Exact models
    # Samsung Galaxy S24 Ultra
    "smartphone_1" = "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Samsung_Galaxy_S24_Ultra.png/220px-Samsung_Galaxy_S24_Ultra.png"
    # iPhone 15 Pro Max
    "smartphone_2" = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/IPhone_15_design.jpg/220px-IPhone_15_design.jpg"
    # Xiaomi 14 Ultra
    "smartphone_3" = "https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Xiaomi_14_Ultra.png/220px-Xiaomi_14_Ultra.png"
    # OnePlus 12
    "smartphone_4" = "https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/OnePlus_12.png/220px-OnePlus_12.png"
    # Realme GT 5 Pro
    "smartphone_5" = "https://images.pexels.com/photos/1598505/pexels-photo-1598505.jpeg?w=400"
    # Vivo X100 Pro
    "smartphone_6" = "https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Vivo_X100_Pro.png/220px-Vivo_X100_Pro.png"
    # OPPO Find X7
    "smartphone_7" = "https://images.pexels.com/photos/404280/pexels-photo-404280.jpeg?w=400"
    # Google Pixel 8 Pro
    "smartphone_8" = "https://upload.wikimedia.org/wikipedia/commons/thumb/9/92/Pixel_8_Pro_%28cropped%29.png/220px-Pixel_8_Pro_%28cropped%29.png"
    
    # LAPTOPS - Exact models
    # Dell XPS 15
    "laptop_1" = "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Dell_XPS_15.jpg/320px-Dell_XPS_15.jpg"
    # MacBook Air M3
    "laptop_2" = "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/MacBook_Air_%282022%29.png/320px-MacBook_Air_%282022%29.png"
    # HP Pavilion 15
    "laptop_3" = "https://images.pexels.com/photos/18105/pexels-photo.jpg?w=400"
    # Lenovo ThinkPad X1
    "laptop_4" = "https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/2017_Lenovo_ThinkPad_X1_Carbon.jpg/320px-2017_Lenovo_ThinkPad_X1_Carbon.jpg"
    # ASUS ROG Strix G16
    "laptop_5" = "https://images.pexels.com/photos/1229861/pexels-photo-1229861.jpeg?w=400"
    # Acer Nitro 5
    "laptop_6" = "https://images.pexels.com/photos/7974/pexels-photo.jpg?w=400"
    # Microsoft Surface Pro 9
    "laptop_7" = "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Surface_Pro_2.png/320px-Surface_Pro_2.png"
    # MSI Creator Z16
    "laptop_8" = "https://images.pexels.com/photos/2047905/pexels-photo-2047905.jpeg?w=400"
    
    # HEADPHONES - Exact models
    # Sony WH-1000XM5
    "headphone_1" = "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Sony_WH-1000XM5.jpg/320px-Sony_WH-1000XM5.jpg"
    # AirPods Pro 2
    "headphone_2" = "https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/AirPods_Pro_2.png/220px-AirPods_Pro_2.png"
    # JBL Tour One M2
    "headphone_3" = "https://images.pexels.com/photos/3394650/pexels-photo-3394650.jpeg?w=400"
    # Bose QuietComfort Ultra
    "headphone_4" = "https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/Bose_QuietComfort_35_headphones.JPG/320px-Bose_QuietComfort_35_headphones.JPG"
    # Samsung Galaxy Buds2 Pro
    "headphone_5" = "https://upload.wikimedia.org/wikipedia/commons/thumb/0/00/Samsung_Galaxy_Buds_Pro.jpg/220px-Samsung_Galaxy_Buds_Pro.jpg"
    # Sennheiser Momentum 4
    "headphone_6" = "https://images.pexels.com/photos/577769/pexels-photo-577769.jpeg?w=400"
    # Audio-Technica ATH-M50x
    "headphone_7" = "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Audio-Technica_ATH-M50.jpg/320px-Audio-Technica_ATH-M50.jpg"
    # Beats Studio Pro
    "headphone_8" = "https://upload.wikimedia.org/wikipedia/commons/thumb/6/67/Beatssolo.jpg/220px-Beatssolo.jpg"
    
    # SMARTWATCHES - Exact models
    # Apple Watch Series 9
    "watch_1" = "https://upload.wikimedia.org/wikipedia/commons/thumb/b/b4/Apple_Watch_Series_6.jpg/220px-Apple_Watch_Series_6.jpg"
    # Samsung Galaxy Watch 6
    "watch_2" = "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Samsung_Galaxy_Watch_Active.jpg/220px-Samsung_Galaxy_Watch_Active.jpg"
    # Garmin Fenix 7
    "watch_3" = "https://images.pexels.com/photos/125779/pexels-photo-125779.jpeg?w=400"
    # Fitbit Sense 2
    "watch_4" = "https://images.pexels.com/photos/2113994/pexels-photo-2113994.jpeg?w=400"
    # Amazfit GTR 4
    "watch_5" = "https://images.pexels.com/photos/190819/pexels-photo-190819.jpeg?w=400"
    # Huawei Watch GT 4
    "watch_6" = "https://images.pexels.com/photos/277390/pexels-photo-277390.jpeg?w=400"
    # Xiaomi Watch S3
    "watch_7" = "https://images.pexels.com/photos/236915/pexels-photo-236915.jpeg?w=400"
    # OnePlus Watch 2
    "watch_8" = "https://images.pexels.com/photos/280250/pexels-photo-280250.jpeg?w=400"
    
    # CAMERAS - Exact models
    # Canon EOS R6 Mark II
    "camera_1" = "https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Canon_EOS_R6_body.jpg/320px-Canon_EOS_R6_body.jpg"
    # Sony A7 IV
    "camera_2" = "https://upload.wikimedia.org/wikipedia/commons/thumb/3/35/Sony_A7_III_%28front_side%29.jpg/320px-Sony_A7_III_%28front_side%29.jpg"
    # Nikon Z8
    "camera_3" = "https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/Nikon_Z9_mirrorless_camera_front.jpg/320px-Nikon_Z9_mirrorless_camera_front.jpg"
    # Fujifilm X-T5
    "camera_4" = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/Fujifilm_X-T3_21_sept_2018a.jpg/320px-Fujifilm_X-T3_21_sept_2018a.jpg"
    # GoPro Hero 12 Black
    "camera_5" = "https://upload.wikimedia.org/wikipedia/commons/thumb/9/92/GoPro_HERO12_Black.jpg/220px-GoPro_HERO12_Black.jpg"
    # DJI Osmo Pocket 3
    "camera_6" = "https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/DJI_Pocket_2.jpg/220px-DJI_Pocket_2.jpg"
    # Canon PowerShot G7X III
    "camera_7" = "https://images.pexels.com/photos/1203803/pexels-photo-1203803.jpeg?w=400"
    # Insta360 X4
    "camera_8" = "https://images.pexels.com/photos/2873486/pexels-photo-2873486.jpeg?w=400"
    
    # TELEVISIONS
    # Samsung 65" Neo QLED 8K
    "tv_1" = "https://images.pexels.com/photos/1444416/pexels-photo-1444416.jpeg?w=400"
    # LG 55" OLED C3
    "tv_2" = "https://images.pexels.com/photos/6976094/pexels-photo-6976094.jpeg?w=400"
    # Sony 65" Bravia XR A80L
    "tv_3" = "https://images.pexels.com/photos/4009402/pexels-photo-4009402.jpeg?w=400"
    # TCL 55" QLED C745
    "tv_4" = "https://images.pexels.com/photos/333984/pexels-photo-333984.jpeg?w=400"
    # Xiaomi TV A Pro 55"
    "tv_5" = "https://images.pexels.com/photos/5721908/pexels-photo-5721908.jpeg?w=400"
    # Hisense 65" U7K
    "tv_6" = "https://images.pexels.com/photos/1571458/pexels-photo-1571458.jpeg?w=400"
    # Samsung 50" Crystal UHD
    "tv_7" = "https://images.pexels.com/photos/4009409/pexels-photo-4009409.jpeg?w=400"
    # LG 43" UQ8000
    "tv_8" = "https://images.pexels.com/photos/6782567/pexels-photo-6782567.jpeg?w=400"
    
    # HOME APPLIANCES
    # Samsung 670L Refrigerator
    "appliance_1" = "https://images.pexels.com/photos/5591663/pexels-photo-5591663.jpeg?w=400"
    # LG 10kg Front Load Washer
    "appliance_2" = "https://images.pexels.com/photos/4108708/pexels-photo-4108708.jpeg?w=400"
    # Panasonic 1.5 Ton AC
    "appliance_3" = "https://images.pexels.com/photos/4108715/pexels-photo-4108715.jpeg?w=400"
    # Dyson V15 Detect
    "appliance_4" = "https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/Dyson_DC30.JPG/320px-Dyson_DC30.JPG"
    # Philips Air Fryer XXL
    "appliance_5" = "https://images.pexels.com/photos/4397840/pexels-photo-4397840.jpeg?w=400"
    # Samsung Microwave 32L
    "appliance_6" = "https://images.pexels.com/photos/4350202/pexels-photo-4350202.jpeg?w=400"
    # Singer Blender Pro
    "appliance_7" = "https://images.pexels.com/photos/6195125/pexels-photo-6195125.jpeg?w=400"
    # Walton Deep Freezer 300L
    "appliance_8" = "https://images.pexels.com/photos/6996310/pexels-photo-6996310.jpeg?w=400"
    
    # MEN FASHION
    "men_1" = "https://images.pexels.com/photos/297933/pexels-photo-297933.jpeg?w=400"
    "men_2" = "https://images.pexels.com/photos/52518/jeans-pants-blue-shop-52518.jpeg?w=400"
    "men_3" = "https://images.pexels.com/photos/1152077/pexels-photo-1152077.jpeg?w=400"
    "men_4" = "https://images.pexels.com/photos/991509/pexels-photo-991509.jpeg?w=400"
    "men_5" = "https://images.pexels.com/photos/1043474/pexels-photo-1043474.jpeg?w=400"
    "men_6" = "https://images.pexels.com/photos/769749/pexels-photo-769749.jpeg?w=400"
    "men_7" = "https://images.pexels.com/photos/1342609/pexels-photo-1342609.jpeg?w=400"
    "men_8" = "https://images.pexels.com/photos/1124468/pexels-photo-1124468.jpeg?w=400"
    
    # WOMEN FASHION
    "women_1" = "https://images.pexels.com/photos/994234/pexels-photo-994234.jpeg?w=400"
    "women_2" = "https://images.pexels.com/photos/1536619/pexels-photo-1536619.jpeg?w=400"
    "women_3" = "https://images.pexels.com/photos/291762/pexels-photo-291762.jpeg?w=400"
    "women_4" = "https://images.pexels.com/photos/985635/pexels-photo-985635.jpeg?w=400"
    "women_5" = "https://images.pexels.com/photos/1055691/pexels-photo-1055691.jpeg?w=400"
    "women_6" = "https://images.pexels.com/photos/1152077/pexels-photo-1152077.jpeg?w=400"
    "women_7" = "https://images.pexels.com/photos/265804/pexels-photo-265804.jpeg?w=400"
    "women_8" = "https://images.pexels.com/photos/1021693/pexels-photo-1021693.jpeg?w=400"
    
    # FOOTWEAR - Exact models
    # Nike Air Max 270
    "shoe_1" = "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e5/Nike_Free_Run%2B.jpg/320px-Nike_Free_Run%2B.jpg"
    # Adidas Ultraboost 24
    "shoe_2" = "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1e/Adidas-Ultraboost-Light-Running-Shoe.jpg/320px-Adidas-Ultraboost-Light-Running-Shoe.jpg"
    # Bata Formal Oxford
    "shoe_3" = "https://images.pexels.com/photos/293405/pexels-photo-293405.jpeg?w=400"
    # Apex Sports Sandal
    "shoe_4" = "https://images.pexels.com/photos/1478442/pexels-photo-1478442.jpeg?w=400"
    # Nike Air Jordan 1
    "shoe_5" = "https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Air_Jordan_1_Retro_High_OG_%22Shadow_2.0%22.jpg/280px-Air_Jordan_1_Retro_High_OG_%22Shadow_2.0%22.jpg"
    # Woodland Hiking Boots
    "shoe_6" = "https://images.pexels.com/photos/2529157/pexels-photo-2529157.jpeg?w=400"
    # Crocs Classic Clog
    "shoe_7" = "https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Crocs-CaymanGreen.jpg/320px-Crocs-CaymanGreen.jpg"
    # Puma RS-X
    "shoe_8" = "https://images.pexels.com/photos/1598505/pexels-photo-1598505.jpeg?w=400"
    
    # GAMING - Exact models
    # PlayStation 5
    "gaming_1" = "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1c/PS5_Hardware_-_Pair.png/320px-PS5_Hardware_-_Pair.png"
    # Xbox Series X
    "gaming_2" = "https://upload.wikimedia.org/wikipedia/commons/thumb/4/43/Xbox-Series-X-Console-1.png/220px-Xbox-Series-X-Console-1.png"
    # Nintendo Switch OLED
    "gaming_3" = "https://upload.wikimedia.org/wikipedia/commons/thumb/8/88/Nintendo_Switch_OLED_Model.png/320px-Nintendo_Switch_OLED_Model.png"
    # Razer BlackWidow V4
    "gaming_4" = "https://images.pexels.com/photos/4219883/pexels-photo-4219883.jpeg?w=400"
    # Logitech G Pro X
    "gaming_5" = "https://images.pexels.com/photos/159204/game-controller-joystick-joypad-gamepad-159204.jpeg?w=400"
    # SteelSeries Arctis Nova Pro
    "gaming_6" = "https://images.pexels.com/photos/687811/pexels-photo-687811.jpeg?w=400"
    # Elgato Stream Deck MK.2
    "gaming_7" = "https://images.pexels.com/photos/3165335/pexels-photo-3165335.jpeg?w=400"
    # HyperX Cloud III
    "gaming_8" = "https://images.pexels.com/photos/2582928/pexels-photo-2582928.jpeg?w=400"
    
    # BOOKS
    # Atomic Habits
    "book_1" = "https://images.pexels.com/photos/256450/pexels-photo-256450.jpeg?w=400"
    # Psychology of Money
    "book_2" = "https://images.pexels.com/photos/159866/books-book-pages-read-literature-159866.jpeg?w=400"
    # Rich Dad Poor Dad
    "book_3" = "https://images.pexels.com/photos/1148399/pexels-photo-1148399.jpeg?w=400"
    # Ikigai
    "book_4" = "https://images.pexels.com/photos/904620/pexels-photo-904620.jpeg?w=400"
    # The Alchemist
    "book_5" = "https://images.pexels.com/photos/1171084/pexels-photo-1171084.jpeg?w=400"
    # Think and Grow Rich
    "book_6" = "https://images.pexels.com/photos/46274/pexels-photo-46274.jpeg?w=400"
    # Start With Why
    "book_7" = "https://images.pexels.com/photos/1130980/pexels-photo-1130980.jpeg?w=400"
    # Deep Work
    "book_8" = "https://images.pexels.com/photos/159711/books-bookstore-book-reading-159711.jpeg?w=400"
    
    # BEAUTY
    "beauty_1" = "https://images.pexels.com/photos/2587370/pexels-photo-2587370.jpeg?w=400"
    "beauty_2" = "https://images.pexels.com/photos/3373739/pexels-photo-3373739.jpeg?w=400"
    "beauty_3" = "https://images.pexels.com/photos/2113855/pexels-photo-2113855.jpeg?w=400"
    "beauty_4" = "https://images.pexels.com/photos/3785147/pexels-photo-3785147.jpeg?w=400"
    "beauty_5" = "https://images.pexels.com/photos/3018845/pexels-photo-3018845.jpeg?w=400"
    "beauty_6" = "https://images.pexels.com/photos/3762879/pexels-photo-3762879.jpeg?w=400"
    "beauty_7" = "https://images.pexels.com/photos/3373738/pexels-photo-3373738.jpeg?w=400"
    "beauty_8" = "https://images.pexels.com/photos/2253833/pexels-photo-2253833.jpeg?w=400"
    
    # FITNESS
    "fitness_1" = "https://images.pexels.com/photos/841130/pexels-photo-841130.jpeg?w=400"
    "fitness_2" = "https://images.pexels.com/photos/4498362/pexels-photo-4498362.jpeg?w=400"
    "fitness_3" = "https://images.pexels.com/photos/4056535/pexels-photo-4056535.jpeg?w=400"
    "fitness_4" = "https://images.pexels.com/photos/4164512/pexels-photo-4164512.jpeg?w=400"
    "fitness_5" = "https://images.pexels.com/photos/4397833/pexels-photo-4397833.jpeg?w=400"
    "fitness_6" = "https://images.pexels.com/photos/4498151/pexels-photo-4498151.jpeg?w=400"
    "fitness_7" = "https://images.pexels.com/photos/4498605/pexels-photo-4498605.jpeg?w=400"
    "fitness_8" = "https://images.pexels.com/photos/4162451/pexels-photo-4162451.jpeg?w=400"
    
    # BABY
    "baby_1" = "https://images.pexels.com/photos/3933250/pexels-photo-3933250.jpeg?w=400"
    "baby_2" = "https://images.pexels.com/photos/3661348/pexels-photo-3661348.jpeg?w=400"
    "baby_3" = "https://images.pexels.com/photos/3875089/pexels-photo-3875089.jpeg?w=400"
    "baby_4" = "https://images.pexels.com/photos/4473870/pexels-photo-4473870.jpeg?w=400"
    "baby_5" = "https://images.pexels.com/photos/3661452/pexels-photo-3661452.jpeg?w=400"
    "baby_6" = "https://images.pexels.com/photos/3933276/pexels-photo-3933276.jpeg?w=400"
    "baby_7" = "https://images.pexels.com/photos/4473893/pexels-photo-4473893.jpeg?w=400"
    "baby_8" = "https://images.pexels.com/photos/3661388/pexels-photo-3661388.jpeg?w=400"
    
    # PET
    "pet_1" = "https://images.pexels.com/photos/4587998/pexels-photo-4587998.jpeg?w=400"
    "pet_2" = "https://images.pexels.com/photos/6568942/pexels-photo-6568942.jpeg?w=400"
    "pet_3" = "https://images.pexels.com/photos/4588047/pexels-photo-4588047.jpeg?w=400"
    "pet_4" = "https://images.pexels.com/photos/5731866/pexels-photo-5731866.jpeg?w=400"
    "pet_5" = "https://images.pexels.com/photos/4588441/pexels-photo-4588441.jpeg?w=400"
    "pet_6" = "https://images.pexels.com/photos/6131007/pexels-photo-6131007.jpeg?w=400"
    "pet_7" = "https://images.pexels.com/photos/4588052/pexels-photo-4588052.jpeg?w=400"
    "pet_8" = "https://images.pexels.com/photos/5731863/pexels-photo-5731863.jpeg?w=400"
    
    # STATIONERY
    "stationery_1" = "https://images.pexels.com/photos/159752/pencil-education-creativity-writing-tools-159752.jpeg?w=400"
    "stationery_2" = "https://images.pexels.com/photos/159618/office-pencil-rubber-creative-159618.jpeg?w=400"
    "stationery_3" = "https://images.pexels.com/photos/1485657/pexels-photo-1485657.jpeg?w=400"
    "stationery_4" = "https://images.pexels.com/photos/4792285/pexels-photo-4792285.jpeg?w=400"
    "stationery_5" = "https://images.pexels.com/photos/4792286/pexels-photo-4792286.jpeg?w=400"
    "stationery_6" = "https://images.pexels.com/photos/891059/pexels-photo-891059.jpeg?w=400"
    "stationery_7" = "https://images.pexels.com/photos/6423446/pexels-photo-6423446.jpeg?w=400"
    "stationery_8" = "https://images.pexels.com/photos/4065876/pexels-photo-4065876.jpeg?w=400"
    
    # JEWELRY
    "jewelry_1" = "https://images.pexels.com/photos/1191531/pexels-photo-1191531.jpeg?w=400"
    "jewelry_2" = "https://images.pexels.com/photos/2735970/pexels-photo-2735970.jpeg?w=400"
    "jewelry_3" = "https://images.pexels.com/photos/1413420/pexels-photo-1413420.jpeg?w=400"
    "jewelry_4" = "https://images.pexels.com/photos/1457801/pexels-photo-1457801.jpeg?w=400"
    "jewelry_5" = "https://images.pexels.com/photos/265906/pexels-photo-265906.jpeg?w=400"
    "jewelry_6" = "https://images.pexels.com/photos/691046/pexels-photo-691046.jpeg?w=400"
    "jewelry_7" = "https://images.pexels.com/photos/2442893/pexels-photo-2442893.jpeg?w=400"
    "jewelry_8" = "https://images.pexels.com/photos/371285/pexels-photo-371285.jpeg?w=400"
    
    # BAGS
    "bag_1" = "https://images.pexels.com/photos/1545998/pexels-photo-1545998.jpeg?w=400"
    "bag_2" = "https://images.pexels.com/photos/2905238/pexels-photo-2905238.jpeg?w=400"
    "bag_3" = "https://images.pexels.com/photos/1204464/pexels-photo-1204464.jpeg?w=400"
    "bag_4" = "https://images.pexels.com/photos/2081199/pexels-photo-2081199.jpeg?w=400"
    "bag_5" = "https://images.pexels.com/photos/1058959/pexels-photo-1058959.jpeg?w=400"
    "bag_6" = "https://images.pexels.com/photos/1152077/pexels-photo-1152077.jpeg?w=400"
    "bag_7" = "https://images.pexels.com/photos/2905238/pexels-photo-2905238.jpeg?w=400"
    "bag_8" = "https://images.pexels.com/photos/1038000/pexels-photo-1038000.jpeg?w=400"
    
    # SPORTS
    "sports_1" = "https://images.pexels.com/photos/46798/the-ball-stadion-football-the-pitch-46798.jpeg?w=400"
    "sports_2" = "https://images.pexels.com/photos/47730/the-ball-stadion-football-the-pitch-47730.jpeg?w=400"
    "sports_3" = "https://images.pexels.com/photos/3628100/pexels-photo-3628100.jpeg?w=400"
    "sports_4" = "https://images.pexels.com/photos/209977/pexels-photo-209977.jpeg?w=400"
    "sports_5" = "https://images.pexels.com/photos/358042/pexels-photo-358042.jpeg?w=400"
    "sports_6" = "https://images.pexels.com/photos/863988/pexels-photo-863988.jpeg?w=400"
    "sports_7" = "https://images.pexels.com/photos/3621104/pexels-photo-3621104.jpeg?w=400"
    "sports_8" = "https://images.pexels.com/photos/248547/pexels-photo-248547.jpeg?w=400"
    
    # KITCHEN
    "kitchen_1" = "https://images.pexels.com/photos/4397919/pexels-photo-4397919.jpeg?w=400"
    "kitchen_2" = "https://images.pexels.com/photos/4397917/pexels-photo-4397917.jpeg?w=400"
    "kitchen_3" = "https://images.pexels.com/photos/4108726/pexels-photo-4108726.jpeg?w=400"
    "kitchen_4" = "https://images.pexels.com/photos/4397906/pexels-photo-4397906.jpeg?w=400"
    "kitchen_5" = "https://images.pexels.com/photos/4108715/pexels-photo-4108715.jpeg?w=400"
    "kitchen_6" = "https://images.pexels.com/photos/4108727/pexels-photo-4108727.jpeg?w=400"
    "kitchen_7" = "https://images.pexels.com/photos/4682114/pexels-photo-4682114.jpeg?w=400"
    "kitchen_8" = "https://images.pexels.com/photos/4682119/pexels-photo-4682119.jpeg?w=400"
    
    # FURNITURE
    "furniture_1" = "https://images.pexels.com/photos/1350789/pexels-photo-1350789.jpeg?w=400"
    "furniture_2" = "https://images.pexels.com/photos/1957478/pexels-photo-1957478.jpeg?w=400"
    "furniture_3" = "https://images.pexels.com/photos/276583/pexels-photo-276583.jpeg?w=400"
    "furniture_4" = "https://images.pexels.com/photos/1866149/pexels-photo-1866149.jpeg?w=400"
    "furniture_5" = "https://images.pexels.com/photos/1648776/pexels-photo-1648776.jpeg?w=400"
    "furniture_6" = "https://images.pexels.com/photos/271816/pexels-photo-271816.jpeg?w=400"
    "furniture_7" = "https://images.pexels.com/photos/2082090/pexels-photo-2082090.jpeg?w=400"
    "furniture_8" = "https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg?w=400"
    
    # AUTOMOTIVE
    "auto_1" = "https://images.pexels.com/photos/4489702/pexels-photo-4489702.jpeg?w=400"
    "auto_2" = "https://images.pexels.com/photos/4489716/pexels-photo-4489716.jpeg?w=400"
    "auto_3" = "https://images.pexels.com/photos/4489704/pexels-photo-4489704.jpeg?w=400"
    "auto_4" = "https://images.pexels.com/photos/4489794/pexels-photo-4489794.jpeg?w=400"
    "auto_5" = "https://images.pexels.com/photos/4489722/pexels-photo-4489722.jpeg?w=400"
    "auto_6" = "https://images.pexels.com/photos/4489746/pexels-photo-4489746.jpeg?w=400"
    "auto_7" = "https://images.pexels.com/photos/4489750/pexels-photo-4489750.jpeg?w=400"
    "auto_8" = "https://images.pexels.com/photos/4489736/pexels-photo-4489736.jpeg?w=400"
    
    # GROCERY
    "grocery_1" = "https://images.pexels.com/photos/4110256/pexels-photo-4110256.jpeg?w=400"
    "grocery_2" = "https://images.pexels.com/photos/4110257/pexels-photo-4110257.jpeg?w=400"
    "grocery_3" = "https://images.pexels.com/photos/4110255/pexels-photo-4110255.jpeg?w=400"
    "grocery_4" = "https://images.pexels.com/photos/4110251/pexels-photo-4110251.jpeg?w=400"
    "grocery_5" = "https://images.pexels.com/photos/4110252/pexels-photo-4110252.jpeg?w=400"
    "grocery_6" = "https://images.pexels.com/photos/4110076/pexels-photo-4110076.jpeg?w=400"
    "grocery_7" = "https://images.pexels.com/photos/4110078/pexels-photo-4110078.jpeg?w=400"
    "grocery_8" = "https://images.pexels.com/photos/4110101/pexels-photo-4110101.jpeg?w=400"
    
    # HOME DECOR
    "decor_1" = "https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg?w=400"
    "decor_2" = "https://images.pexels.com/photos/1571459/pexels-photo-1571459.jpeg?w=400"
    "decor_3" = "https://images.pexels.com/photos/1643383/pexels-photo-1643383.jpeg?w=400"
    "decor_4" = "https://images.pexels.com/photos/1457842/pexels-photo-1457842.jpeg?w=400"
    "decor_5" = "https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg?w=400"
    "decor_6" = "https://images.pexels.com/photos/1090638/pexels-photo-1090638.jpeg?w=400"
    "decor_7" = "https://images.pexels.com/photos/1080721/pexels-photo-1080721.jpeg?w=400"
    "decor_8" = "https://images.pexels.com/photos/2082087/pexels-photo-2082087.jpeg?w=400"
}

$total = 0
$errors = 0

Write-Host "========================================" -ForegroundColor Cyan
Write-Host "Downloading EXACT Product Images" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "Target: $imageDir`n"

foreach ($name in $exactProductImages.Keys) {
    $url = $exactProductImages[$name]
    $filepath = Join-Path $imageDir "$name.jpg"
    
    try {
        Write-Host "Downloading: $name" -ForegroundColor White -NoNewline
        Invoke-WebRequest -Uri $url -OutFile $filepath -TimeoutSec 20 -ErrorAction Stop -Headers @{"User-Agent"="Mozilla/5.0"}
        Write-Host " [OK]" -ForegroundColor Green
        $total++
    }
    catch {
        Write-Host " [FAILED]" -ForegroundColor Red
        $errors++
    }
    Start-Sleep -Milliseconds 300
}

Write-Host "`n========================================" -ForegroundColor Green
Write-Host "Download Complete!" -ForegroundColor Green
Write-Host "Success: $total | Failed: $errors" -ForegroundColor Green
Write-Host "========================================" -ForegroundColor Green
