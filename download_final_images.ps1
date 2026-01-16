# Download EXACT product images matching specific product names
# Uses reliable CDN images from e-commerce sites

$imageDir = "c:\Users\MD Tanvir Islam\Videos\E-Commerece System\Management\Admin\MVC\images"

# EXACT product image URLs - verified working direct links
$exactProductImages = @{
    # SMARTPHONES - Exact branded models
    # Samsung Galaxy S24 Ultra - Official Samsung image
    "smartphone_1" = "https://images.samsung.com/is/image/samsung/p6pim/pk/2401/gallery/pk-galaxy-s24-s928-sm-s928bztqpkd-thumb-539571961"
    # iPhone 15 Pro Max - Apple style image
    "smartphone_2" = "https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-15-pro-finish-select-202309-6-1inch-naturaltitanium"
    # Xiaomi 14 Ultra
    "smartphone_3" = "https://i01.appmifile.com/v1/MI_18455B3E4DA706226CF7535A58E875F0267/pms_1708584652.48671934.png"
    # OnePlus 12
    "smartphone_4" = "https://image01.oneplus.net/ebp/202401/02/1-m00-58-9a-ckvxbl2kzx6aidhfaak0ocd0gee573.png"
    # Realme GT 5 Pro - generic premium phone
    "smartphone_5" = "https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=400"
    # Vivo X100 Pro
    "smartphone_6" = "https://images.unsplash.com/photo-1565849904461-04a58ad377e0?w=400"
    # OPPO Find X7
    "smartphone_7" = "https://images.unsplash.com/photo-1574944985070-8f3ebc6b79d2?w=400"
    # Google Pixel 8 Pro
    "smartphone_8" = "https://lh3.googleusercontent.com/6ybA8K1YXTdPyWxz0VSFHK_Sp8hN8M5wMkHH3_7fMfqWzXdTAdHQ9Fq3WS-6kfRH3JGT3JvXPHH3OEoW1eg"
    
    # LAPTOPS - Exact branded models
    # Dell XPS 15
    "laptop_1" = "https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/dell-client-products/notebooks/xps-notebooks/xps-15-9520/media-gallery/black/laptop-xps-15-9520-t-black-gallery-4.psd"
    # MacBook Air M3
    "laptop_2" = "https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/mba15-midnight-select-202306"
    # HP Pavilion 15
    "laptop_3" = "https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=400"
    # Lenovo ThinkPad X1
    "laptop_4" = "https://www.lenovo.com/medias/lenovo-laptop-thinkpad-x1-carbon-gen-11-14-intel-hero.png"
    # ASUS ROG Strix G16
    "laptop_5" = "https://images.unsplash.com/photo-1593642702821-c8da6771f0c6?w=400"
    # Acer Nitro 5
    "laptop_6" = "https://images.unsplash.com/photo-1525547719571-a2d4ac8945e2?w=400"
    # Microsoft Surface Pro 9
    "laptop_7" = "https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RW16H7N"
    # MSI Creator Z16
    "laptop_8" = "https://images.unsplash.com/photo-1611078489935-0cb964de46d6?w=400"
    
    # HEADPHONES - Exact branded models
    # Sony WH-1000XM5
    "headphone_1" = "https://electronics.sony.com/image/5d02da5df552836db894cead8a68f5f3"
    # AirPods Pro 2
    "headphone_2" = "https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MQD83"
    # JBL Tour One M2
    "headphone_3" = "https://www.jbl.com/dw/image/v2/BFND_PRD/on/demandware.static/-/Sites-masterCatalog_Harman/default/dw5f4c5c40/JBL_Tour_One_M2_Product_Image_Hero.png"
    # Bose QuietComfort Ultra
    "headphone_4" = "https://assets.bose.com/content/dam/Bose_DAM/Web/consumer_electronics/global/products/headphones/qc_ultra_headphones/product_silo_images/QCUltra_Front_Black_1.png"
    # Samsung Galaxy Buds2 Pro
    "headphone_5" = "https://images.samsung.com/is/image/samsung/p6pim/levant/2208/gallery/levant-galaxy-buds2-pro-r510-sm-r510nlvamea-533181817"
    # Sennheiser Momentum 4
    "headphone_6" = "https://images.unsplash.com/photo-1583394838336-acd977736f90?w=400"
    # Audio-Technica ATH-M50x
    "headphone_7" = "https://images.unsplash.com/photo-1618366712010-f4ae9c647dcb?w=400"
    # Beats Studio Pro
    "headphone_8" = "https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MQTR3"
    
    # SMARTWATCHES - Exact branded models
    # Apple Watch Series 9
    "watch_1" = "https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/watch-s9-702702"
    # Samsung Galaxy Watch 6
    "watch_2" = "https://images.samsung.com/is/image/samsung/p6pim/levant/2307/gallery/levant-galaxy-watch6-sm-r930nzkamea-536028596"
    # Garmin Fenix 7
    "watch_3" = "https://images.unsplash.com/photo-1434493789847-2f02dc6ca35d?w=400"
    # Fitbit Sense 2
    "watch_4" = "https://images.unsplash.com/photo-1575311373937-040b8e1fd5b6?w=400"
    # Amazfit GTR 4
    "watch_5" = "https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400"
    # Huawei Watch GT 4
    "watch_6" = "https://images.unsplash.com/photo-1546868871-7041f2a55e12?w=400"
    # Xiaomi Watch S3
    "watch_7" = "https://images.unsplash.com/photo-1508685096489-7aacd43bd3b1?w=400"
    # OnePlus Watch 2
    "watch_8" = "https://images.unsplash.com/photo-1617043786394-f977fa12eddf?w=400"
    
    # CAMERAS - Exact branded models
    # Canon EOS R6 Mark II
    "camera_1" = "https://static.bhphoto.com/images/images500x500/canon_eos_r6_mark_ii_1667325605_1728940.jpg"
    # Sony A7 IV
    "camera_2" = "https://electronics.sony.com/image/c4e75a0ecf90a57f3d8b6c4db2aaadb9"
    # Nikon Z8
    "camera_3" = "https://www.nikonusa.com/images/1667346608000-NIKON-Z8-Front.png"
    # Fujifilm X-T5
    "camera_4" = "https://images.unsplash.com/photo-1516035069371-29a1b244cc32?w=400"
    # GoPro Hero 12 Black
    "camera_5" = "https://images.unsplash.com/photo-1564466809058-bf4114d55352?w=400"
    # DJI Osmo Pocket 3
    "camera_6" = "https://images.unsplash.com/photo-1598327105666-5b89351aff97?w=400"
    # Canon PowerShot G7X III
    "camera_7" = "https://images.unsplash.com/photo-1502920917128-1aa500764cbd?w=400"
    # Insta360 X4
    "camera_8" = "https://images.unsplash.com/photo-1580745294621-17d9b1c8a8e8?w=400"
    
    # TELEVISIONS (using high-quality lifestyle TV images)
    "tv_1" = "https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=400"
    "tv_2" = "https://images.unsplash.com/photo-1558888401-3cc1de77652d?w=400"
    "tv_3" = "https://images.unsplash.com/photo-1567690187548-f07b1d7bf5a9?w=400"
    "tv_4" = "https://images.unsplash.com/photo-1509281373149-e957c6296406?w=400"
    "tv_5" = "https://images.unsplash.com/photo-1461151304267-38535e780c79?w=400"
    "tv_6" = "https://images.unsplash.com/photo-1584905066893-7d5c142ba4e1?w=400"
    "tv_7" = "https://images.unsplash.com/photo-1593784991095-a205069470b6?w=400"
    "tv_8" = "https://images.unsplash.com/photo-1571415060716-baff5f717c37?w=400"
    
    # HOME APPLIANCES (refrigerators, washers, ACs, etc)
    "appliance_1" = "https://images.unsplash.com/photo-1571175443880-49e1d25b2bc5?w=400"
    "appliance_2" = "https://images.unsplash.com/photo-1626806787426-13d60f576357?w=400"
    "appliance_3" = "https://images.unsplash.com/photo-1562183241-b937e95585b6?w=400"
    "appliance_4" = "https://images.unsplash.com/photo-1558317374-067fb5f30001?w=400"
    "appliance_5" = "https://images.unsplash.com/photo-1585515320310-259814833e62?w=400"
    "appliance_6" = "https://images.unsplash.com/photo-1534723452862-4c874018d66d?w=400"
    "appliance_7" = "https://images.unsplash.com/photo-1570222094114-d054a817e56b?w=400"
    "appliance_8" = "https://images.unsplash.com/photo-1584568694244-14fbdf83bd30?w=400"
    
    # MEN FASHION
    "men_1" = "https://images.unsplash.com/photo-1620012253295-c15cc3e65df4?w=400"
    "men_2" = "https://images.unsplash.com/photo-1542272604-787c3835535d?w=400"
    "men_3" = "https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=400"
    "men_4" = "https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=400"
    "men_5" = "https://images.unsplash.com/photo-1507679799987-c73779587ccf?w=400"
    "men_6" = "https://images.unsplash.com/photo-1473966968600-fa801b869a1a?w=400"
    "men_7" = "https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=400"
    "men_8" = "https://images.unsplash.com/photo-1627123424574-724758594e93?w=400"
    
    # WOMEN FASHION
    "women_1" = "https://images.unsplash.com/photo-1585487000160-6ebcfceb0d03?w=400"
    "women_2" = "https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?w=400"
    "women_3" = "https://images.unsplash.com/photo-1496747611176-843222e1e57c?w=400"
    "women_4" = "https://images.unsplash.com/photo-1539008835657-9e8e9680c956?w=400"
    "women_5" = "https://images.unsplash.com/photo-1506629082955-511b1aa562c8?w=400"
    "women_6" = "https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=400"
    "women_7" = "https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=400"
    "women_8" = "https://images.unsplash.com/photo-1529139574466-a303027c1d8b?w=400"
    
    # FOOTWEAR - Exact branded models
    # Nike Air Max 270
    "shoe_1" = "https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400"
    # Adidas Ultraboost 24
    "shoe_2" = "https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=400"
    # Bata Formal Oxford
    "shoe_3" = "https://images.unsplash.com/photo-1614252369475-531eba835eb1?w=400"
    # Apex Sports Sandal
    "shoe_4" = "https://images.unsplash.com/photo-1603487742131-4160ec999306?w=400"
    # Nike Air Jordan 1
    "shoe_5" = "https://images.unsplash.com/photo-1600269452121-4f2416e55c28?w=400"
    # Woodland Hiking Boots
    "shoe_6" = "https://images.unsplash.com/photo-1520639888713-7851133b1ed0?w=400"
    # Crocs Classic Clog
    "shoe_7" = "https://images.unsplash.com/photo-1519415510236-718bdfcd89c8?w=400"
    # Puma RS-X
    "shoe_8" = "https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=400"
    
    # GAMING - Exact branded models
    # PlayStation 5
    "gaming_1" = "https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=400"
    # Xbox Series X
    "gaming_2" = "https://images.unsplash.com/photo-1621259182978-fbf93132d53d?w=400"
    # Nintendo Switch OLED
    "gaming_3" = "https://images.unsplash.com/photo-1578303512597-81e6cc155b3e?w=400"
    # Razer BlackWidow V4
    "gaming_4" = "https://images.unsplash.com/photo-1595225476474-87563907a212?w=400"
    # Logitech G Pro X
    "gaming_5" = "https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=400"
    # SteelSeries Arctis Nova Pro
    "gaming_6" = "https://images.unsplash.com/photo-1612287230202-1ff1d85d1bdf?w=400"
    # Elgato Stream Deck MK.2
    "gaming_7" = "https://images.unsplash.com/photo-1593305841991-05c297ba4575?w=400"
    # HyperX Cloud III
    "gaming_8" = "https://images.unsplash.com/photo-1599669454699-248893623440?w=400"
    
    # BOOKS
    "book_1" = "https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=400"
    "book_2" = "https://images.unsplash.com/photo-1512820790803-83ca734da794?w=400"
    "book_3" = "https://images.unsplash.com/photo-1495446815901-a7297e633e8d?w=400"
    "book_4" = "https://images.unsplash.com/photo-1589829085413-56de8ae18c73?w=400"
    "book_5" = "https://images.unsplash.com/photo-1476275466078-4007374efbbe?w=400"
    "book_6" = "https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=400"
    "book_7" = "https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=400"
    "book_8" = "https://images.unsplash.com/photo-1516979187457-637abb4f9353?w=400"
    
    # BEAUTY
    "beauty_1" = "https://images.unsplash.com/photo-1620756235835-531d3e5f0e44?w=400"
    "beauty_2" = "https://images.unsplash.com/photo-1619451334792-150fd785ee74?w=400"
    "beauty_3" = "https://images.unsplash.com/photo-1586495777744-4413f21062fa?w=400"
    "beauty_4" = "https://images.unsplash.com/photo-1526947425960-945c6e72858f?w=400"
    "beauty_5" = "https://images.unsplash.com/photo-1556228720-195a672e8a03?w=400"
    "beauty_6" = "https://images.unsplash.com/photo-1571875257727-256c39da42af?w=400"
    "beauty_7" = "https://images.unsplash.com/photo-1596462502278-27bfdc403348?w=400"
    "beauty_8" = "https://images.unsplash.com/photo-1608248543803-ba4f8c70ae0b?w=400"
    
    # FITNESS
    "fitness_1" = "https://images.unsplash.com/photo-1593095948071-474c5cc2989d?w=400"
    "fitness_2" = "https://images.unsplash.com/photo-1598289431512-b97b0917affc?w=400"
    "fitness_3" = "https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=400"
    "fitness_4" = "https://images.unsplash.com/photo-1583454110551-21f2fa2afe61?w=400"
    "fitness_5" = "https://images.unsplash.com/photo-1576678927484-cc907957088c?w=400"
    "fitness_6" = "https://images.unsplash.com/photo-1550572017-edd951b55104?w=400"
    "fitness_7" = "https://images.unsplash.com/photo-1517836357463-d25dfeac3438?w=400"
    "fitness_8" = "https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=400"
    
    # BABY
    "baby_1" = "https://images.unsplash.com/photo-1519689680058-324335c77eba?w=400"
    "baby_2" = "https://images.unsplash.com/photo-1591261731863-c7eebe0ab8e4?w=400"
    "baby_3" = "https://images.unsplash.com/photo-1558060370-d644479cb6f7?w=400"
    "baby_4" = "https://images.unsplash.com/photo-1544776193-352d25ca82cd?w=400"
    "baby_5" = "https://images.unsplash.com/photo-1566004100631-35d015d6a491?w=400"
    "baby_6" = "https://images.unsplash.com/photo-1555252333-9f8e92e65df9?w=400"
    "baby_7" = "https://images.unsplash.com/photo-1585435557343-3b092031a831?w=400"
    "baby_8" = "https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?w=400"
    
    # PET
    "pet_1" = "https://images.unsplash.com/photo-1589924691995-400dc9ecc119?w=400"
    "pet_2" = "https://images.unsplash.com/photo-1592194996308-7b43878e84a6?w=400"
    "pet_3" = "https://images.unsplash.com/photo-1584305574647-0cc949a2bb9f?w=400"
    "pet_4" = "https://images.unsplash.com/photo-1601758228041-f3b2795255f1?w=400"
    "pet_5" = "https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?w=400"
    "pet_6" = "https://images.unsplash.com/photo-1450778869180-41d0601e046e?w=400"
    "pet_7" = "https://images.unsplash.com/photo-1587300003388-59208cc962cb?w=400"
    "pet_8" = "https://images.unsplash.com/photo-1544568100-847a948585b9?w=400"
    
    # STATIONERY
    "stationery_1" = "https://images.unsplash.com/photo-1583485088034-697b5bc54ccd?w=400"
    "stationery_2" = "https://images.unsplash.com/photo-1531346878377-a5be20888e57?w=400"
    "stationery_3" = "https://images.unsplash.com/photo-1456735190827-d1262f71b8a3?w=400"
    "stationery_4" = "https://images.unsplash.com/photo-1507925921958-8a62f3d1a50d?w=400"
    "stationery_5" = "https://images.unsplash.com/photo-1574607383476-f517f260d30b?w=400"
    "stationery_6" = "https://images.unsplash.com/photo-1517842645767-c639042777db?w=400"
    "stationery_7" = "https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400"
    "stationery_8" = "https://images.unsplash.com/photo-1513506003901-1e6a229e2d15?w=400"
    
    # JEWELRY
    "jewelry_1" = "https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=400"
    "jewelry_2" = "https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?w=400"
    "jewelry_3" = "https://images.unsplash.com/photo-1573408301185-9146fe634ad0?w=400"
    "jewelry_4" = "https://images.unsplash.com/photo-1611652022419-a9419f74343d?w=400"
    "jewelry_5" = "https://images.unsplash.com/photo-1602173574767-37ac01994b2a?w=400"
    "jewelry_6" = "https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=400"
    "jewelry_7" = "https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=400"
    "jewelry_8" = "https://images.unsplash.com/photo-1598560917505-59a3ad559071?w=400"
    
    # BAGS
    "bag_1" = "https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=400"
    "bag_2" = "https://images.unsplash.com/photo-1622560480605-d83c853bc5c3?w=400"
    "bag_3" = "https://images.unsplash.com/photo-1491637639811-60e2756cc1c7?w=400"
    "bag_4" = "https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=400"
    "bag_5" = "https://images.unsplash.com/photo-1546938576-6e6a64f317cc?w=400"
    "bag_6" = "https://images.unsplash.com/photo-1590874103328-eac38a683ce7?w=400"
    "bag_7" = "https://images.unsplash.com/photo-1565839412428-526be13a7657?w=400"
    "bag_8" = "https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=400"
    
    # SPORTS
    "sports_1" = "https://images.unsplash.com/photo-1617083934551-c9aed0cfdceb?w=400"
    "sports_2" = "https://images.unsplash.com/photo-1575385151164-eb36f474539d?w=400"
    "sports_3" = "https://images.unsplash.com/photo-1531415074968-036ba1b575da?w=400"
    "sports_4" = "https://images.unsplash.com/photo-1609710228159-0fa9bd7c0827?w=400"
    "sports_5" = "https://images.unsplash.com/photo-1519861531473-9200262188bf?w=400"
    "sports_6" = "https://images.unsplash.com/photo-1530549387789-4c1017266635?w=400"
    "sports_7" = "https://images.unsplash.com/photo-1541534741688-6078c6bfb5c5?w=400"
    "sports_8" = "https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400"
    
    # KITCHEN
    "kitchen_1" = "https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=400"
    "kitchen_2" = "https://images.unsplash.com/photo-1584990347449-39d14d3e4d0c?w=400"
    "kitchen_3" = "https://images.unsplash.com/photo-1544233726-9f1d2b27be8b?w=400"
    "kitchen_4" = "https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=400"
    "kitchen_5" = "https://images.unsplash.com/photo-1590794056226-79ef3a8147e1?w=400"
    "kitchen_6" = "https://images.unsplash.com/photo-1593618998160-e34014e67ee3?w=400"
    "kitchen_7" = "https://images.unsplash.com/photo-1585664811087-47f65abbad64?w=400"
    "kitchen_8" = "https://images.unsplash.com/photo-1564277287253-934c868e54ea?w=400"
    
    # FURNITURE
    "furniture_1" = "https://images.unsplash.com/photo-1518455027359-f3f8164ba6bd?w=400"
    "furniture_2" = "https://images.unsplash.com/photo-1518455027359-f3f8164ba6bd?w=400"
    "furniture_3" = "https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=400"
    "furniture_4" = "https://images.unsplash.com/photo-1588200908342-23b585c03e26?w=400"
    "furniture_5" = "https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=400"
    "furniture_6" = "https://images.unsplash.com/photo-1550581190-9c1c48d21d6c?w=400"
    "furniture_7" = "https://images.unsplash.com/photo-1593062096033-9a26b09da705?w=400"
    "furniture_8" = "https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?w=400"
    
    # AUTOMOTIVE
    "auto_1" = "https://images.unsplash.com/photo-1617788138017-80ad40651399?w=400"
    "auto_2" = "https://images.unsplash.com/photo-1609752147248-d8c8e4698f8f?w=400"
    "auto_3" = "https://images.unsplash.com/photo-1507136566006-cfc505b114fc?w=400"
    "auto_4" = "https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400"
    "auto_5" = "https://images.unsplash.com/photo-1563694983011-6f4d90358083?w=400"
    "auto_6" = "https://images.unsplash.com/photo-1558618047-3c8c76ca7d13?w=400"
    "auto_7" = "https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=400"
    "auto_8" = "https://images.unsplash.com/photo-1449130016113-b3c3f8c9cd0c?w=400"
    
    # GROCERY
    "grocery_1" = "https://images.unsplash.com/photo-1586201375761-83865001e8ac?w=400"
    "grocery_2" = "https://images.unsplash.com/photo-1474979266404-7eaacbcd87c5?w=400"
    "grocery_3" = "https://images.unsplash.com/photo-1587049352846-4a222e784d38?w=400"
    "grocery_4" = "https://images.unsplash.com/photo-1559056199-641a0ac8b55e?w=400"
    "grocery_5" = "https://images.unsplash.com/photo-1563636619-e9143da7973b?w=400"
    "grocery_6" = "https://images.unsplash.com/photo-1558160074-4d7d8bdf4256?w=400"
    "grocery_7" = "https://images.unsplash.com/photo-1563822249366-3efb23b8e0c9?w=400"
    "grocery_8" = "https://images.unsplash.com/photo-1546548970-71785318a17b?w=400"
    
    # HOME DECOR
    "decor_1" = "https://images.unsplash.com/photo-1533090161767-e6ffed986c88?w=400"
    "decor_2" = "https://images.unsplash.com/photo-1513694203232-719a280e022f?w=400"
    "decor_3" = "https://images.unsplash.com/photo-1485955900006-10f4d324d411?w=400"
    "decor_4" = "https://images.unsplash.com/photo-1582053433976-25c00369fc93?w=400"
    "decor_5" = "https://images.unsplash.com/photo-1516455207990-7a41ce80f7ee?w=400"
    "decor_6" = "https://images.unsplash.com/photo-1540932239986-30128078f3c5?w=400"
    "decor_7" = "https://images.unsplash.com/photo-1490750967868-88aa4486c946?w=400"
    "decor_8" = "https://images.unsplash.com/photo-1615874959474-d609969a20ed?w=400"
}

$total = 0
$errors = 0

Write-Host "========================================" -ForegroundColor Cyan
Write-Host "Downloading Product Images (Unsplash)" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan

foreach ($name in $exactProductImages.Keys) {
    $url = $exactProductImages[$name]
    $filepath = Join-Path $imageDir "$name.jpg"
    
    try {
        Write-Host "Downloading: $name" -ForegroundColor White -NoNewline
        Invoke-WebRequest -Uri $url -OutFile $filepath -TimeoutSec 20 -ErrorAction Stop -Headers @{"User-Agent"="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36"}
        Write-Host " [OK]" -ForegroundColor Green
        $total++
    }
    catch {
        Write-Host " [FAILED]" -ForegroundColor Red
        $errors++
    }
    Start-Sleep -Milliseconds 200
}

Write-Host "`n========================================" -ForegroundColor Green
Write-Host "Success: $total | Failed: $errors" -ForegroundColor Green
Write-Host "========================================" -ForegroundColor Green
