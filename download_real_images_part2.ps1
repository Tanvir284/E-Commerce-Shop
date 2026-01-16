# Download More Real Product Images from Web - Part 2
# Remaining categories

$imagesDir = "C:\xampp\htdocs\E-Commerece System\Admin\MVC\images"

function Download-ProductImage {
    param (
        [string]$Url,
        [string]$FileName
    )
    try {
        $destPath = "$imagesDir\$FileName"
        Write-Host "Downloading: $FileName..."
        Invoke-WebRequest -Uri $Url -OutFile $destPath -UseBasicParsing
        Write-Host "  SUCCESS: $FileName" -ForegroundColor Green
    } catch {
        Write-Host "  FAILED: $FileName" -ForegroundColor Red
    }
}

Write-Host "=== Downloading More Product Images ===" -ForegroundColor Cyan

# MEN'S FASHION
Write-Host "--- MEN'S FASHION ---" -ForegroundColor Yellow
Download-ProductImage "https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=600&h=600&fit=crop" "men_1.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1542272604-787c3835535d?w=600&h=600&fit=crop" "men_2.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=600&h=600&fit=crop" "men_3.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=600&h=600&fit=crop" "men_4.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&h=600&fit=crop" "men_5.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1473966968600-fa801b869a1a?w=600&h=600&fit=crop" "men_6.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600&h=600&fit=crop" "men_7.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1627123424574-724758594e93?w=600&h=600&fit=crop" "men_8.jpg"

# WOMEN'S FASHION
Write-Host "--- WOMEN'S FASHION ---" -ForegroundColor Yellow
Download-ProductImage "https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=600&h=600&fit=crop" "women_1.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1583391733956-6c78276477e2?w=600&h=600&fit=crop" "women_2.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1585487000160-6ebcfceb0d03?w=600&h=600&fit=crop" "women_3.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1572804013309-59a88b7e92f1?w=600&h=600&fit=crop" "women_4.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1506629082955-511b1aa562c8?w=600&h=600&fit=crop" "women_5.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=600&h=600&fit=crop" "women_6.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=600&h=600&fit=crop" "women_7.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1583292650898-7d22cd27ca6f?w=600&h=600&fit=crop" "women_8.jpg"

# BEAUTY
Write-Host "--- BEAUTY ---" -ForegroundColor Yellow
Download-ProductImage "https://images.unsplash.com/photo-1596462502278-27bfdc403348?w=600&h=600&fit=crop" "beauty_1.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1571781926291-c477ebfd024b?w=600&h=600&fit=crop" "beauty_2.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1512496015851-a90fb38ba796?w=600&h=600&fit=crop" "beauty_3.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1526947425960-945c6e72858f?w=600&h=600&fit=crop" "beauty_4.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1570194065650-d99fb4b8ccb0?w=600&h=600&fit=crop" "beauty_5.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1556228720-195a672e8a03?w=600&h=600&fit=crop" "beauty_6.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1586495777744-4413f21062fa?w=600&h=600&fit=crop" "beauty_7.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1608248597279-f99d160bfcbc?w=600&h=600&fit=crop" "beauty_8.jpg"

# HEALTH & FITNESS
Write-Host "--- HEALTH & FITNESS ---" -ForegroundColor Yellow
Download-ProductImage "https://images.unsplash.com/photo-1593095948071-474c5cc2989d?w=600&h=600&fit=crop" "fitness_1.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1598289431512-b97b0917affc?w=600&h=600&fit=crop" "fitness_2.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=600&h=600&fit=crop" "fitness_3.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=600&h=600&fit=crop" "fitness_4.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=600&h=600&fit=crop" "fitness_5.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1550572017-edd951aa8f72?w=600&h=600&fit=crop" "fitness_6.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1517836357463-d25dfeac3438?w=600&h=600&fit=crop" "fitness_7.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=600&h=600&fit=crop" "fitness_8.jpg"

# BABY PRODUCTS
Write-Host "--- BABY PRODUCTS ---" -ForegroundColor Yellow
Download-ProductImage "https://images.unsplash.com/photo-1515488042361-ee00e0ddd4e4?w=600&h=600&fit=crop" "baby_1.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1566004100631-35d015d6a491?w=600&h=600&fit=crop" "baby_2.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1584839404054-29db8de629b6?w=600&h=600&fit=crop" "baby_3.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1519689680058-324335c77eba?w=600&h=600&fit=crop" "baby_4.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1559454403-b8fb88521f11?w=600&h=600&fit=crop" "baby_5.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1555252333-9f8e92e65df9?w=600&h=600&fit=crop" "baby_6.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1522771930-78b80b0c3d43?w=600&h=600&fit=crop" "baby_7.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1519340241574-2cec6aef0c01?w=600&h=600&fit=crop" "baby_8.jpg"

# PET SUPPLIES
Write-Host "--- PET SUPPLIES ---" -ForegroundColor Yellow
Download-ProductImage "https://images.unsplash.com/photo-1568640347023-a616a30bc3bd?w=600&h=600&fit=crop" "pet_1.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1545249390-6bdfa286032f?w=600&h=600&fit=crop" "pet_2.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1601758124510-52d02ddb7c3f?w=600&h=600&fit=crop" "pet_3.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1587300003388-59208cc962cb?w=600&h=600&fit=crop" "pet_4.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1526336024786-1ead8c178e3a?w=600&h=600&fit=crop" "pet_5.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1560807707-8cc77767d783?w=600&h=600&fit=crop" "pet_6.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1583337130417-3346a1be7dee?w=600&h=600&fit=crop" "pet_7.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1601758228008-db49db75f173?w=600&h=600&fit=crop" "pet_8.jpg"

# STATIONERY
Write-Host "--- STATIONERY ---" -ForegroundColor Yellow
Download-ProductImage "https://images.unsplash.com/photo-1583485088034-697b5bc54ccd?w=600&h=600&fit=crop" "stationery_1.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1531346878377-a5be20888e57?w=600&h=600&fit=crop" "stationery_2.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1513542789411-b6a5d4f31634?w=600&h=600&fit=crop" "stationery_3.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1507925921958-8a62f3d1a50d?w=600&h=600&fit=crop" "stationery_4.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1564052718180-2adcab98ee82?w=600&h=600&fit=crop" "stationery_5.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1472289065668-ce650ac443d2?w=600&h=600&fit=crop" "stationery_6.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1586281380349-632531db7ed4?w=600&h=600&fit=crop" "stationery_7.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1568377210220-5b4b3c93a5c5?w=600&h=600&fit=crop" "stationery_8.jpg"

# JEWELRY
Write-Host "--- JEWELRY ---" -ForegroundColor Yellow
Download-ProductImage "https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=600&h=600&fit=crop" "jewelry_1.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=600&h=600&fit=crop" "jewelry_2.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1573408301185-9146fe634ad0?w=600&h=600&fit=crop" "jewelry_3.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?w=600&h=600&fit=crop" "jewelry_4.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1515377905703-c4788e51af15?w=600&h=600&fit=crop" "jewelry_5.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1601821765780-754fa98637c1?w=600&h=600&fit=crop" "jewelry_6.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1611591437281-460bfbe1220a?w=600&h=600&fit=crop" "jewelry_7.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=600&h=600&fit=crop" "jewelry_8.jpg"

# BAGS & LUGGAGE
Write-Host "--- BAGS & LUGGAGE ---" -ForegroundColor Yellow
Download-ProductImage "https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=600&h=600&fit=crop" "bag_1.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1553062407-98eeb64c6a45?w=600&h=600&fit=crop" "bag_2.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=600&h=600&fit=crop" "bag_3.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1566150905458-1bf1fc113f0d?w=600&h=600&fit=crop" "bag_4.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1577733966973-d680bffd2e80?w=600&h=600&fit=crop" "bag_5.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1547949003-9792a18a2601?w=600&h=600&fit=crop" "bag_6.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1565026057447-bc90a3dceb87?w=600&h=600&fit=crop" "bag_7.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1606522754091-a3bbf9ad4cb3?w=600&h=600&fit=crop" "bag_8.jpg"

# SPORTS
Write-Host "--- SPORTS ---" -ForegroundColor Yellow
Download-ProductImage "https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=600&h=600&fit=crop" "sports_1.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1552674605-db6ffd4facb5?w=600&h=600&fit=crop" "sports_2.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1531415074968-036ba1b575da?w=600&h=600&fit=crop" "sports_3.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1554068865-24cecd4e34b8?w=600&h=600&fit=crop" "sports_4.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1546519638-68e109498ffc?w=600&h=600&fit=crop" "sports_5.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1519315901367-f34ff9154487?w=600&h=600&fit=crop" "sports_6.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1574680178050-55c6a6a96e0a?w=600&h=600&fit=crop" "sports_7.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1541625602330-2277a4c46182?w=600&h=600&fit=crop" "sports_8.jpg"

# KITCHEN
Write-Host "--- KITCHEN ---" -ForegroundColor Yellow
Download-ProductImage "https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=600&h=600&fit=crop" "kitchen_1.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1466637574441-749b8f19452f?w=600&h=600&fit=crop" "kitchen_2.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1574180566232-aaad1b5b8450?w=600&h=600&fit=crop" "kitchen_3.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=600&h=600&fit=crop" "kitchen_4.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1622372738946-62e02505feb3?w=600&h=600&fit=crop" "kitchen_5.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1593618998160-e34014e67546?w=600&h=600&fit=crop" "kitchen_6.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1544233726-9f1d2b27be8b?w=600&h=600&fit=crop" "kitchen_7.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1584622781564-1d987f7333c1?w=600&h=600&fit=crop" "kitchen_8.jpg"

# FURNITURE
Write-Host "--- FURNITURE ---" -ForegroundColor Yellow
Download-ProductImage "https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=600&h=600&fit=crop" "furniture_1.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1518455027359-f3f8164ba6bd?w=600&h=600&fit=crop" "furniture_2.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?w=600&h=600&fit=crop" "furniture_3.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1594026112284-02bb6f3352fe?w=600&h=600&fit=crop" "furniture_4.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=600&h=600&fit=crop" "furniture_5.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1551298370-9d3d53f2b4c8?w=600&h=600&fit=crop" "furniture_6.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?w=600&h=600&fit=crop" "furniture_7.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1595428774223-ef52624120d2?w=600&h=600&fit=crop" "furniture_8.jpg"

# AUTOMOTIVE
Write-Host "--- AUTOMOTIVE ---" -ForegroundColor Yellow
Download-ProductImage "https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?w=600&h=600&fit=crop" "auto_1.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1609599006353-e629aaabfeae?w=600&h=600&fit=crop" "auto_2.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1494976388531-d1058494cdd8?w=600&h=600&fit=crop" "auto_3.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1542282088-72c9c27ed0cd?w=600&h=600&fit=crop" "auto_4.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1493238792000-8113da705763?w=600&h=600&fit=crop" "auto_5.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&h=600&fit=crop" "auto_6.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&h=600&fit=crop" "auto_7.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1489824904134-891ab64532f1?w=600&h=600&fit=crop" "auto_8.jpg"

# GROCERIES
Write-Host "--- GROCERIES ---" -ForegroundColor Yellow
Download-ProductImage "https://images.unsplash.com/photo-1536304993881-ff6e9eefa2a6?w=600&h=600&fit=crop" "grocery_1.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1474979266404-7eaacbcd87c5?w=600&h=600&fit=crop" "grocery_2.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1587049352846-4a222e784d38?w=600&h=600&fit=crop" "grocery_3.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?w=600&h=600&fit=crop" "grocery_4.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1563636619-e9143da7973b?w=600&h=600&fit=crop" "grocery_5.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1564890369478-c89ca6d9cde9?w=600&h=600&fit=crop" "grocery_6.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1593791436228-09b19f37f2da?w=600&h=600&fit=crop" "grocery_7.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1597714026720-8f74c62310ba?w=600&h=600&fit=crop" "grocery_8.jpg"

# HOME DECOR
Write-Host "--- HOME DECOR ---" -ForegroundColor Yellow
Download-ProductImage "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&h=600&fit=crop" "decor_1.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1513506003901-1e6a229e2d15?w=600&h=600&fit=crop" "decor_2.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1485955900006-10f4d324d411?w=600&h=600&fit=crop" "decor_3.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1499955085172-a104c9463ece?w=600&h=600&fit=crop" "decor_4.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1582582621959-48d27397dc69?w=600&h=600&fit=crop" "decor_5.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=600&h=600&fit=crop" "decor_6.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&h=600&fit=crop" "decor_7.jpg"
Download-ProductImage "https://images.unsplash.com/photo-1538688525198-9b88f6f53126?w=600&h=600&fit=crop" "decor_8.jpg"

Write-Host ""
Write-Host "=== PART 2 DOWNLOAD COMPLETE ===" -ForegroundColor Cyan
Write-Host "Total: 120 more product images downloaded" -ForegroundColor Green
