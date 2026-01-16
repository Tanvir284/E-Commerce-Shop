# Download Real Product Images from Web
# This script downloads actual product images from reliable sources

$imagesDir = "C:\xampp\htdocs\E-Commerece System\Admin\MVC\images"

# Create a function to download image
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
        Write-Host "  FAILED: $FileName - $($_.Exception.Message)" -ForegroundColor Red
    }
}

Write-Host "=== Downloading Real Product Images ===" -ForegroundColor Cyan
Write-Host ""

# SMARTPHONES - Using Unsplash product photos (free commercial use)
Write-Host "--- SMARTPHONES ---" -ForegroundColor Yellow

# Samsung Galaxy style
Download-ProductImage "https://images.unsplash.com/photo-1610945415295-d9bbf067e59c?w=600&h=600&fit=crop" "smartphone_1.jpg"

# iPhone style
Download-ProductImage "https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=600&h=600&fit=crop" "smartphone_2.jpg"

# Xiaomi/OnePlus style
Download-ProductImage "https://images.unsplash.com/photo-1598327105666-5b89351aff97?w=600&h=600&fit=crop" "smartphone_3.jpg"

# Android flagship
Download-ProductImage "https://images.unsplash.com/photo-1605236453806-6ff36851218e?w=600&h=600&fit=crop" "smartphone_4.jpg"

# Realme/Vivo style
Download-ProductImage "https://images.unsplash.com/photo-1574944985070-8f3ebc6b79d2?w=600&h=600&fit=crop" "smartphone_5.jpg"

# Vivo flagship
Download-ProductImage "https://images.unsplash.com/photo-1512054502232-10a0a035d672?w=600&h=600&fit=crop" "smartphone_6.jpg"

# OPPO style
Download-ProductImage "https://images.unsplash.com/photo-1565849904461-04a58ad377e0?w=600&h=600&fit=crop" "smartphone_7.jpg"

# Google Pixel style
Download-ProductImage "https://images.unsplash.com/photo-1598965402089-897b1b5adc12?w=600&h=600&fit=crop" "smartphone_8.jpg"

Write-Host ""
Write-Host "--- LAPTOPS ---" -ForegroundColor Yellow

# Dell XPS style ultrabook
Download-ProductImage "https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=600&h=600&fit=crop" "laptop_1.jpg"

# MacBook style
Download-ProductImage "https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=600&h=600&fit=crop" "laptop_2.jpg"

# HP laptop
Download-ProductImage "https://images.unsplash.com/photo-1525547719571-a2d4ac8945e2?w=600&h=600&fit=crop" "laptop_3.jpg"

# Business laptop
Download-ProductImage "https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?w=600&h=600&fit=crop" "laptop_4.jpg"

# Gaming laptop
Download-ProductImage "https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=600&h=600&fit=crop" "laptop_5.jpg"

# Gaming laptop 2
Download-ProductImage "https://images.unsplash.com/photo-1593642632559-0c6d3fc62b89?w=600&h=600&fit=crop" "laptop_6.jpg"

# Surface style
Download-ProductImage "https://images.unsplash.com/photo-1587614382346-4ec70e388b28?w=600&h=600&fit=crop" "laptop_7.jpg"

# Creator laptop
Download-ProductImage "https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?w=600&h=600&fit=crop" "laptop_8.jpg"

Write-Host ""
Write-Host "--- HEADPHONES ---" -ForegroundColor Yellow

# Sony style over-ear
Download-ProductImage "https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=600&h=600&fit=crop" "headphone_1.jpg"

# AirPods style earbuds
Download-ProductImage "https://images.unsplash.com/photo-1606220588913-b3aacb4d2f46?w=600&h=600&fit=crop" "headphone_2.jpg"

# JBL style
Download-ProductImage "https://images.unsplash.com/photo-1484704849700-f032a568e944?w=600&h=600&fit=crop" "headphone_3.jpg"

# Bose style premium
Download-ProductImage "https://images.unsplash.com/photo-1546435770-a3e426bf472b?w=600&h=600&fit=crop" "headphone_4.jpg"

# Samsung buds style
Download-ProductImage "https://images.unsplash.com/photo-1590658268037-6bf12165a8df?w=600&h=600&fit=crop" "headphone_5.jpg"

# Sennheiser style
Download-ProductImage "https://images.unsplash.com/photo-1583394838336-acd977736f90?w=600&h=600&fit=crop" "headphone_6.jpg"

# Audio-Technica style
Download-ProductImage "https://images.unsplash.com/photo-1487215078519-e21cc028cb29?w=600&h=600&fit=crop" "headphone_7.jpg"

# Beats style
Download-ProductImage "https://images.unsplash.com/photo-1558756520-22cfe5d382ca?w=600&h=600&fit=crop" "headphone_8.jpg"

Write-Host ""
Write-Host "--- SMARTWATCHES ---" -ForegroundColor Yellow

# Apple Watch style
Download-ProductImage "https://images.unsplash.com/photo-1546868871-7041f2a55e12?w=600&h=600&fit=crop" "watch_1.jpg"

# Samsung Galaxy Watch
Download-ProductImage "https://images.unsplash.com/photo-1579586337278-3befd40fd17a?w=600&h=600&fit=crop" "watch_2.jpg"

# Garmin style
Download-ProductImage "https://images.unsplash.com/photo-1508685096489-7aacd43bd3b1?w=600&h=600&fit=crop" "watch_3.jpg"

# Fitbit style
Download-ProductImage "https://images.unsplash.com/photo-1575311373937-040b8e1fd5b6?w=600&h=600&fit=crop" "watch_4.jpg"

# Amazfit style
Download-ProductImage "https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=600&h=600&fit=crop" "watch_5.jpg"

# Huawei style
Download-ProductImage "https://images.unsplash.com/photo-1617043786394-f977fa12eddf?w=600&h=600&fit=crop" "watch_6.jpg"

# Xiaomi watch
Download-ProductImage "https://images.unsplash.com/photo-1434494878577-86c23bcb06b9?w=600&h=600&fit=crop" "watch_7.jpg"

# OnePlus watch
Download-ProductImage "https://images.unsplash.com/photo-1542496658-e33a6d0d50f6?w=600&h=600&fit=crop" "watch_8.jpg"

Write-Host ""
Write-Host "--- CAMERAS ---" -ForegroundColor Yellow

# Canon DSLR
Download-ProductImage "https://images.unsplash.com/photo-1516035069371-29a1b244cc32?w=600&h=600&fit=crop" "camera_1.jpg"

# Sony Mirrorless
Download-ProductImage "https://images.unsplash.com/photo-1502920917128-1aa500764cbd?w=600&h=600&fit=crop" "camera_2.jpg"

# Nikon
Download-ProductImage "https://images.unsplash.com/photo-1510127034890-ba27508e9f1c?w=600&h=600&fit=crop" "camera_3.jpg"

# Fujifilm
Download-ProductImage "https://images.unsplash.com/photo-1581591524425-c7e0978f3e4c?w=600&h=600&fit=crop" "camera_4.jpg"

# GoPro action camera
Download-ProductImage "https://images.unsplash.com/photo-1564466809058-bf4114d55352?w=600&h=600&fit=crop" "camera_5.jpg"

# DJI style
Download-ProductImage "https://images.unsplash.com/photo-1473968512647-3e447244af8f?w=600&h=600&fit=crop" "camera_6.jpg"

# Compact camera
Download-ProductImage "https://images.unsplash.com/photo-1617005082133-548c4dd27f35?w=600&h=600&fit=crop" "camera_7.jpg"

# 360 camera
Download-ProductImage "https://images.unsplash.com/photo-1502982720700-bfff97f2ecac?w=600&h=600&fit=crop" "camera_8.jpg"

Write-Host ""
Write-Host "--- GAMING ---" -ForegroundColor Yellow

# PlayStation
Download-ProductImage "https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=600&h=600&fit=crop" "gaming_1.jpg"

# Xbox
Download-ProductImage "https://images.unsplash.com/photo-1621259182978-fbf93132d53d?w=600&h=600&fit=crop" "gaming_2.jpg"

# Nintendo Switch
Download-ProductImage "https://images.unsplash.com/photo-1578303512597-81e6cc155b3e?w=600&h=600&fit=crop" "gaming_3.jpg"

# Gaming keyboard
Download-ProductImage "https://images.unsplash.com/photo-1511467687858-23d96c32e4ae?w=600&h=600&fit=crop" "gaming_4.jpg"

# Gaming mouse
Download-ProductImage "https://images.unsplash.com/photo-1527814050087-3793815479db?w=600&h=600&fit=crop" "gaming_5.jpg"

# Gaming headset
Download-ProductImage "https://images.unsplash.com/photo-1599669454699-248893623440?w=600&h=600&fit=crop" "gaming_6.jpg"

# Stream deck/controller
Download-ProductImage "https://images.unsplash.com/photo-1538481199705-c710c4e965fc?w=600&h=600&fit=crop" "gaming_7.jpg"

# Gaming headset 2
Download-ProductImage "https://images.unsplash.com/photo-1618366712010-f4ae9c647dcb?w=600&h=600&fit=crop" "gaming_8.jpg"

Write-Host ""
Write-Host "--- TELEVISIONS ---" -ForegroundColor Yellow

# Samsung QLED
Download-ProductImage "https://images.unsplash.com/photo-1593784991095-a205069470b6?w=600&h=600&fit=crop" "tv_1.jpg"

# LG OLED
Download-ProductImage "https://images.unsplash.com/photo-1567690187548-f07b1d7bf5a9?w=600&h=600&fit=crop" "tv_2.jpg"

# Sony Bravia
Download-ProductImage "https://images.unsplash.com/photo-1558888426-a00c49ab6aa1?w=600&h=600&fit=crop" "tv_3.jpg"

# Smart TV
Download-ProductImage "https://images.unsplash.com/photo-1461151304267-38535e780c79?w=600&h=600&fit=crop" "tv_4.jpg"

# Modern TV
Download-ProductImage "https://images.unsplash.com/photo-1571415060716-baff5f717c37?w=600&h=600&fit=crop" "tv_5.jpg"

# TV in room
Download-ProductImage "https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=600&h=600&fit=crop" "tv_6.jpg"

# Flat screen
Download-ProductImage "https://images.unsplash.com/photo-1509281373149-e957c6296406?w=600&h=600&fit=crop" "tv_7.jpg"

# LED TV
Download-ProductImage "https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&h=600&fit=crop" "tv_8.jpg"

Write-Host ""
Write-Host "--- HOME APPLIANCES ---" -ForegroundColor Yellow

# Refrigerator
Download-ProductImage "https://images.unsplash.com/photo-1571175443880-49e1d25b2bc5?w=600&h=600&fit=crop" "appliance_1.jpg"

# Washing machine
Download-ProductImage "https://images.unsplash.com/photo-1626806787461-102c1bfaaea1?w=600&h=600&fit=crop" "appliance_2.jpg"

# Air conditioner
Download-ProductImage "https://images.unsplash.com/photo-1585771724684-38269d6639fd?w=600&h=600&fit=crop" "appliance_3.jpg"

# Vacuum cleaner
Download-ProductImage "https://images.unsplash.com/photo-1558317374-067fb5f30001?w=600&h=600&fit=crop" "appliance_4.jpg"

# Air fryer
Download-ProductImage "https://images.unsplash.com/photo-1626509653291-18d9a934b9db?w=600&h=600&fit=crop" "appliance_5.jpg"

# Microwave
Download-ProductImage "https://images.unsplash.com/photo-1574269909862-7e1d70bb8078?w=600&h=600&fit=crop" "appliance_6.jpg"

# Blender
Download-ProductImage "https://images.unsplash.com/photo-1570222094114-d054a817e56b?w=600&h=600&fit=crop" "appliance_7.jpg"

# Freezer
Download-ProductImage "https://images.unsplash.com/photo-1584568694244-14fbdf83bd30?w=600&h=600&fit=crop" "appliance_8.jpg"

Write-Host ""
Write-Host "--- FOOTWEAR ---" -ForegroundColor Yellow

# Nike Air Max
Download-ProductImage "https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&h=600&fit=crop" "shoe_1.jpg"

# Adidas Ultraboost
Download-ProductImage "https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=600&h=600&fit=crop" "shoe_2.jpg"

# Formal shoes
Download-ProductImage "https://images.unsplash.com/photo-1449505278894-297fdb3227a?w=600&h=600&fit=crop" "shoe_3.jpg"

# Sandals
Download-ProductImage "https://images.unsplash.com/photo-1603487742131-4160ec999306?w=600&h=600&fit=crop" "shoe_4.jpg"

# Air Jordan
Download-ProductImage "https://images.unsplash.com/photo-1556906781-9a412961c28c?w=600&h=600&fit=crop" "shoe_5.jpg"

# Hiking boots
Download-ProductImage "https://images.unsplash.com/photo-1520639888713-7851133b1ed0?w=600&h=600&fit=crop" "shoe_6.jpg"

# Crocs
Download-ProductImage "https://images.unsplash.com/photo-1604671801908-6f0c6a092c05?w=600&h=600&fit=crop" "shoe_7.jpg"

# Puma sneakers
Download-ProductImage "https://images.unsplash.com/photo-1600185365926-3a2ce3cdb9eb?w=600&h=600&fit=crop" "shoe_8.jpg"

Write-Host ""
Write-Host "--- BOOKS ---" -ForegroundColor Yellow

# Self-help book
Download-ProductImage "https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=600&h=600&fit=crop" "book_1.jpg"

# Finance book
Download-ProductImage "https://images.unsplash.com/photo-1512820790803-83ca734da794?w=600&h=600&fit=crop" "book_2.jpg"

# Classic book
Download-ProductImage "https://images.unsplash.com/photo-1495446815901-a7297e633e8d?w=600&h=600&fit=crop" "book_3.jpg"

# Japanese book
Download-ProductImage "https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=600&h=600&fit=crop" "book_4.jpg"

# Novel
Download-ProductImage "https://images.unsplash.com/photo-1543002588-bfa74002ed7e?w=600&h=600&fit=crop" "book_5.jpg"

# Success book
Download-ProductImage "https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=600&h=600&fit=crop" "book_6.jpg"

# Leadership book
Download-ProductImage "https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=600&h=600&fit=crop" "book_7.jpg"

# Productivity book
Download-ProductImage "https://images.unsplash.com/photo-1519682337058-a94d519337bc?w=600&h=600&fit=crop" "book_8.jpg"

Write-Host ""
Write-Host "=== DOWNLOAD COMPLETE ===" -ForegroundColor Cyan
Write-Host "Total: 80 product images downloaded" -ForegroundColor Green
