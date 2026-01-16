# Download EXACT Branded Product Images
# This script downloads accurate images matching product names from reliable sources

$imagesDir = "C:\xampp\htdocs\E-Commerece System\Admin\MVC\images"

function Download-ProductImage {
    param (
        [string]$Url,
        [string]$FileName,
        [string]$ProductName
    )
    try {
        $destPath = "$imagesDir\$FileName"
        Write-Host "Downloading $ProductName..."
        $headers = @{
            "User-Agent" = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36"
            "Referer" = "https://www.google.com"
        }
        Invoke-WebRequest -Uri $Url -OutFile $destPath -UseBasicParsing -Headers $headers
        Write-Host "  SUCCESS: $FileName" -ForegroundColor Green
    } catch {
        Write-Host "  FAILED: $FileName - $($_.Exception.Message)" -ForegroundColor Red
    }
}

Write-Host "=== Downloading EXACT Branded Product Images ===" -ForegroundColor Cyan
Write-Host ""

# === SMARTPHONES ===
Write-Host "--- SMARTPHONES ---" -ForegroundColor Yellow

# Product 1: Samsung Galaxy S24 Ultra
Download-ProductImage "https://fdn2.gsmarena.com/vv/bigpic/samsung-galaxy-s24-ultra-5g-sm-s928.jpg" "smartphone_1.jpg" "Samsung Galaxy S24 Ultra"

# Product 2: iPhone 15 Pro Max  
Download-ProductImage "https://fdn2.gsmarena.com/vv/bigpic/apple-iphone-15-pro-max.jpg" "smartphone_2.jpg" "iPhone 15 Pro Max"

# Product 3: Xiaomi 14 Ultra
Download-ProductImage "https://fdn2.gsmarena.com/vv/bigpic/xiaomi-14-ultra.jpg" "smartphone_3.jpg" "Xiaomi 14 Ultra"

# Product 4: OnePlus 12
Download-ProductImage "https://fdn2.gsmarena.com/vv/bigpic/oneplus-12.jpg" "smartphone_4.jpg" "OnePlus 12"

# Product 5: Realme GT 5 Pro
Download-ProductImage "https://fdn2.gsmarena.com/vv/bigpic/realme-gt5-pro.jpg" "smartphone_5.jpg" "Realme GT 5 Pro"

# Product 6: Vivo X100 Pro
Download-ProductImage "https://fdn2.gsmarena.com/vv/bigpic/vivo-x100-pro.jpg" "smartphone_6.jpg" "Vivo X100 Pro"

# Product 7: OPPO Find X7
Download-ProductImage "https://fdn2.gsmarena.com/vv/bigpic/oppo-find-x7.jpg" "smartphone_7.jpg" "OPPO Find X7"

# Product 8: Google Pixel 8 Pro
Download-ProductImage "https://fdn2.gsmarena.com/vv/bigpic/google-pixel-8-pro.jpg" "smartphone_8.jpg" "Google Pixel 8 Pro"

Write-Host ""
Write-Host "--- LAPTOPS ---" -ForegroundColor Yellow

# Product 9: Dell XPS 15
Download-ProductImage "https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/dell-client-products/notebooks/xps-notebooks/xps-15-9530/media-gallery/black/notebook-xps-15-9530-t-black-gallery-1.psd?fmt=pjpg&wid=600" "laptop_1.jpg" "Dell XPS 15"

# Product 10: MacBook Air M3
Download-ProductImage "https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/mba13-midnight-select-202402?wid=600&fmt=jpeg" "laptop_2.jpg" "MacBook Air M3"

# Product 11: HP Pavilion 15
Download-ProductImage "https://ssl-product-images.www8-hp.com/digmedialib/prodimg/lowres/c08172217.png" "laptop_3.jpg" "HP Pavilion 15"

# Product 12: Lenovo ThinkPad X1 Carbon
Download-ProductImage "https://p3-ofp.static.pub/fes/cms/2023/09/28/xfxb1i14r6iomd3g1h1m5ezzwgdw4w474057.png" "laptop_4.jpg" "Lenovo ThinkPad X1"

# Product 13: ASUS ROG Strix G16
Download-ProductImage "https://dlcdnwebimgs.asus.com/gain/FC43BB35-4CE6-4FDA-9C0D-B21E728D8C5A/w800" "laptop_5.jpg" "ASUS ROG Strix G16"

# Product 14: Acer Nitro 5
Download-ProductImage "https://images.acer.com/is/image/acer/acer-laptop-nitro-5-an515-58-main-ksp-01?$responsive$" "laptop_6.jpg" "Acer Nitro 5"

# Product 15: Microsoft Surface Pro 9
Download-ProductImage "https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE4LqQX?ver=d0b7" "laptop_7.jpg" "Microsoft Surface Pro 9"

# Product 16: MSI Creator Z16
Download-ProductImage "https://storage-asset.msi.com/global/picture/image/feature/nb/Creator/CreatorZ16-A12UET/kv-pd.png" "laptop_8.jpg" "MSI Creator Z16"

Write-Host ""
Write-Host "--- HEADPHONES ---" -ForegroundColor Yellow

# Product 17: Sony WH-1000XM5
Download-ProductImage "https://electronics.sony.com/image/5d02da5df552836db894cead8a68f5d3" "headphone_1.jpg" "Sony WH-1000XM5"

# Product 18: Apple AirPods Pro 2
Download-ProductImage "https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MQD83?wid=600&fmt=jpeg" "headphone_2.jpg" "Apple AirPods Pro 2"

# Product 19: JBL Tour One M2
Download-ProductImage "https://uk.jbl.com/dw/image/v2/BFND_PRD/on/demandware.static/-/Sites-masterCatalog_Harman/default/dwaf9e10f0/JBL_Tour_One_M2_Product_Photo_Hero_Black.png?sw=600" "headphone_3.jpg" "JBL Tour One M2"

# Product 20: Bose QuietComfort Ultra
Download-ProductImage "https://assets.bose.com/content/dam/Bose_DAM/Web/consumer_electronics/global/products/headphones/qc-ultra-headphones/product_silo_images/QCUltra_Black_EC_hero.png/jcr:content/renditions/cq5dam.web.600.600.png" "headphone_4.jpg" "Bose QuietComfort Ultra"

# Product 21: Samsung Galaxy Buds2 Pro
Download-ProductImage "https://images.samsung.com/is/image/samsung/p6pim/pk/sm-r510nzaapkr/gallery/pk-galaxy-buds2-pro-r510-sm-r510nzaapkr-thumb-533238295?$600_480_PNG$" "headphone_5.jpg" "Samsung Galaxy Buds2 Pro"

# Product 22: Sennheiser Momentum 4
Download-ProductImage "https://assets.sennheiser.com/img/Asset%20Library/Product%20Pictures/Sennheiser/MOMENTUM%204%20Wireless/MOMENTUM_4_wireless_black_product_shot_foldable_03.png" "headphone_6.jpg" "Sennheiser Momentum 4"

# Product 23: Audio-Technica ATH-M50x
Download-ProductImage "https://www.audio-technica.com/en-us/media/catalog/product/cache/14f63d2f5b6aaeae0fa8bcc5dc60e9fd/a/t/ath-m50x_01.png" "headphone_7.jpg" "Audio-Technica ATH-M50x"

# Product 24: Beats Studio Pro
Download-ProductImage "https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MQTP3?wid=600&fmt=jpeg" "headphone_8.jpg" "Beats Studio Pro"

Write-Host ""
Write-Host "--- SMARTWATCHES ---" -ForegroundColor Yellow

# Product 25: Apple Watch Series 9
Download-ProductImage "https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MRH83ref_VW_34FR+watch-45-alum-midnight-nc-9s_VW_34FR_WF_CO?wid=600&fmt=jpeg" "watch_1.jpg" "Apple Watch Series 9"

# Product 26: Samsung Galaxy Watch 6
Download-ProductImage "https://images.samsung.com/is/image/samsung/p6pim/in/sm-r940nzkains/gallery/in-galaxy-watch6-r940-sm-r940nzkains-thumb-537216219?$600_480_PNG$" "watch_2.jpg" "Samsung Galaxy Watch 6"

# Product 27: Garmin Fenix 7
Download-ProductImage "https://res.garmin.com/transform/image/upload/b_rgb:FFFFFF,c_pad,dpr_2.0,f_auto,h_400,q_auto,w_400/c_pad,h_400,w_400/v1/Product_Images/en/products/010-02540-00/v/cf-lg?pgw=1" "watch_3.jpg" "Garmin Fenix 7"

# Product 28: Fitbit Sense 2
Download-ProductImage "https://ss7.vzw.com/is/image/VerizonWireless/fitbit-sense-2-bluemist-idera?wid=600" "watch_4.jpg" "Fitbit Sense 2"

# Product 29: Amazfit GTR 4
Download-ProductImage "https://cdn.shopify.com/s/files/1/0550/8225/5457/files/Amazfit_GTR_4_Black_1.png?v=1664354899" "watch_5.jpg" "Amazfit GTR 4"

# Product 30: Huawei Watch GT 4
Download-ProductImage "https://consumer.huawei.com/content/dam/huawei-cbg-site/common/mkt/pdp/wearables/watch-gt4-46mm/images/huawei-watch-gt4-46mm-kv.png" "watch_6.jpg" "Huawei Watch GT 4"

# Product 31: Xiaomi Watch S3
Download-ProductImage "https://i01.appmifile.com/v1/MI_18455B3E4DA706226CF7535A58E875F0267/pms_1709023508.95097279.png?thumb=1&w=600" "watch_7.jpg" "Xiaomi Watch S3"

# Product 32: OnePlus Watch 2
Download-ProductImage "https://oasis.opstatics.com/content/dam/oasis/page/2024/operation/0226-watch-2/specs/1.png" "watch_8.jpg" "OnePlus Watch 2"

Write-Host ""
Write-Host "--- GAMING ---" -ForegroundColor Yellow

# Product 81: PlayStation 5
Download-ProductImage "https://gmedia.playstation.com/is/image/SIEPDC/ps5-product-thumbnail-01-en-14sep21?$facebook$" "gaming_1.jpg" "PlayStation 5"

# Product 82: Xbox Series X
Download-ProductImage "https://assets.xboxservices.com/assets/bc/1e/bc1e5c2b-8e27-4edf-9633-8582ddfb0734.png?n=XBX_A-BuyBoxBGImage01-D.png" "gaming_2.jpg" "Xbox Series X"

# Product 83: Nintendo Switch OLED
Download-ProductImage "https://assets.nintendo.com/image/upload/ar_16:9,b_auto:border,c_lpad/b_white/f_auto/q_auto/dpr_1.5/c_scale,w_600/ncom/en_US/switch/site-design-update/hardware/switch-oled/oled-background-image" "gaming_3.jpg" "Nintendo Switch OLED"

# Product 84: Razer BlackWidow V4
Download-ProductImage "https://assets3.razerzone.com/Dj8lAGEHE1T_O2hLt3Tk4n9ZZnI=/600x600/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh71%2Fhfb%2F9632371728414%2F230220-blackwidow-v4-pro-500x500.png" "gaming_4.jpg" "Razer BlackWidow V4"

# Product 85: Logitech G Pro X
Download-ProductImage "https://resource.logitechg.com/w_600,c_lpad,ar_16:9,q_auto,f_auto,dpr_1.0/d_transparent.gif/content/dam/gaming/en/products/pro-x-superlight-2/gallery/pro-x-superlight-2-gallery-1-black.png" "gaming_5.jpg" "Logitech G Pro X"

# Product 86: SteelSeries Arctis Nova Pro
Download-ProductImage "https://media.steelseriescdn.com/blog/posts/arctis-nova-pro/000e9987c2094d57bcf69e34bc5f82ab.png" "gaming_6.jpg" "SteelSeries Arctis Nova Pro"

# Product 87: Elgato Stream Deck MK.2
Download-ProductImage "https://edge.elgato.com/egc/image/file/3c4b83e9-eb82-454f-b2dc-c30fcf4bed87/000_streamdeck_mk2_01.png" "gaming_7.jpg" "Elgato Stream Deck MK.2"

# Product 88: HyperX Cloud III
Download-ProductImage "https://hyperx.com/cdn/shop/files/hyperx_cloud_iii_wireless_black_1_main.png?v=1700526088&width=600" "gaming_8.jpg" "HyperX Cloud III"

Write-Host ""
Write-Host "--- CAMERAS ---" -ForegroundColor Yellow

# Product 33: Canon EOS R6 Mark II
Download-ProductImage "https://static.bhphoto.com/images/images500x500/canon_eos_r6_mark_ii_1667400316_1730821.jpg" "camera_1.jpg" "Canon EOS R6 Mark II"

# Product 34: Sony A7 IV 
Download-ProductImage "https://static.bhphoto.com/images/images500x500/sony_ilce7m4_b_alpha_a7_iv_mirrorless_1634660375_1675097.jpg" "camera_2.jpg" "Sony A7 IV"

# Product 35: Nikon Z8
Download-ProductImage "https://static.bhphoto.com/images/images500x500/nikon_1653_z_8_mirrorless_camera_1683639004_1765622.jpg" "camera_3.jpg" "Nikon Z8"

# Product 36: Fujifilm X-T5
Download-ProductImage "https://static.bhphoto.com/images/images500x500/fujifilm_x_t5_mirrorless_camera_1666787706_1731596.jpg" "camera_4.jpg" "Fujifilm X-T5"

# Product 37: GoPro Hero 12 Black
Download-ProductImage "https://gopro.com/content/dam/help/hero12-black/Product_Icons/H12_Black_side_image.png" "camera_5.jpg" "GoPro Hero 12 Black"

# Product 38: DJI Osmo Pocket 3
Download-ProductImage "https://dji-official-fe.djicdn.com/cms/uploads/7f17a46f0bea5c6d61e8aa76c33a0c87.png" "camera_6.jpg" "DJI Osmo Pocket 3"

# Product 39: Canon PowerShot G7X III
Download-ProductImage "https://static.bhphoto.com/images/images500x500/canon_3637c001_powershot_g7_x_mark_1562766920_1493729.jpg" "camera_7.jpg" "Canon PowerShot G7X III"

# Product 40: Insta360 X4
Download-ProductImage "https://www.insta360.com/product/insta360-x4/assets/images/x4-1.png" "camera_8.jpg" "Insta360 X4"

Write-Host ""
Write-Host "=== DOWNLOAD COMPLETE ===" -ForegroundColor Cyan
Write-Host "Downloaded exact branded images for key products" -ForegroundColor Green
