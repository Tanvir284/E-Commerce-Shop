# Download category-specific product images from Unsplash
# Each category gets appropriate search terms

$imageDir = "c:\Users\MD Tanvir Islam\Videos\E-Commerece System\Management\Admin\MVC\images"

# Category to search term mapping for relevant product images
$categoryTerms = @{
    "smartphone" = "smartphone,iphone,android-phone"
    "laptop" = "laptop,macbook,notebook-computer"
    "headphone" = "headphones,earbuds,airpods"
    "watch" = "smartwatch,wristwatch,luxury-watch"
    "camera" = "camera,dslr,photography-camera"
    "tv" = "television,smart-tv,flat-screen"
    "appliance" = "home-appliance,refrigerator,washing-machine"
    "men" = "mens-fashion,mens-clothing,suit"
    "women" = "womens-fashion,dress,womens-clothing"
    "shoe" = "sneakers,running-shoes,footwear"
    "gaming" = "gaming,playstation,xbox-controller"
    "book" = "books,reading,library"
    "beauty" = "cosmetics,skincare,makeup"
    "fitness" = "gym,fitness-equipment,dumbbells"
    "baby" = "baby-products,toys,stroller"
    "pet" = "pet-food,dog,cat-supplies"
    "stationery" = "office-supplies,pens,notebook"
    "jewelry" = "jewelry,necklace,gold-ring"
    "bag" = "backpack,handbag,luggage"
    "sports" = "sports-equipment,football,cricket"
    "kitchen" = "kitchen,cookware,pots"
    "furniture" = "furniture,office-chair,desk"
    "auto" = "car-accessories,dashboard,automotive"
    "grocery" = "groceries,organic-food,rice"
    "decor" = "home-decor,interior-design,wall-art"
}

$total = 0
$errors = 0

foreach ($cat in $categoryTerms.Keys) {
    $searchTerm = $categoryTerms[$cat]
    
    for ($i = 1; $i -le 8; $i++) {
        $filename = "${cat}_${i}.jpg"
        $filepath = Join-Path $imageDir $filename
        
        # Use source.unsplash.com with specific search term and unique signature
        $sig = Get-Random -Maximum 10000
        $url = "https://source.unsplash.com/400x400/?$searchTerm&sig=$sig"
        
        try {
            Write-Host "Downloading: $filename ($searchTerm)" -ForegroundColor Cyan
            Invoke-WebRequest -Uri $url -OutFile $filepath -TimeoutSec 20 -ErrorAction Stop
            $total++
            Start-Sleep -Milliseconds 300
        }
        catch {
            Write-Host "Failed: $filename" -ForegroundColor Red
            $errors++
        }
    }
    Write-Host "Completed category: $cat" -ForegroundColor Green
}

Write-Host "`n==================================="
Write-Host "Download Complete!"
Write-Host "Total downloaded: $total"
Write-Host "Errors: $errors"
Write-Host "==================================="
