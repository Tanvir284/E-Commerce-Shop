/**
 * E-Shop Bangladesh - Modern Features JavaScript
 * All 8 Feature Implementations
 */

// ============================================
// GLOBAL STATE
// ============================================
let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
let recentlyViewed = JSON.parse(localStorage.getItem('recentlyViewed')) || [];
let compareList = JSON.parse(localStorage.getItem('compareList')) || [];
let recentSearches = JSON.parse(localStorage.getItem('recentSearches')) || [];
let currentQuickViewProduct = null;
let maxPrice = 500000;
let minRating = 0;
let searchTimeout = null;

// ============================================
// INITIALIZATION
// ============================================
document.addEventListener('DOMContentLoaded', function () {
    initializeFeatures();
});

function initializeFeatures() {
    // Update badges
    updateWishlistBadge();
    updateCompareButton();

    // Initialize flash sale countdown
    initFlashSaleCountdown();

    // Initialize recently viewed
    displayRecentlyViewed();

    // Initialize search autocomplete
    initSearchAutocomplete();

    // Load flash sale products after main products load
    setTimeout(loadFlashSaleProducts, 500);
}

// ============================================
// 1. LIVE SEARCH AUTOCOMPLETE
// ============================================
function initSearchAutocomplete() {
    const searchInput = document.getElementById('searchInput');
    const suggestionsDiv = document.getElementById('searchSuggestions');

    if (!searchInput || !suggestionsDiv) return;

    let selectedIndex = -1;

    searchInput.addEventListener('input', function () {
        const query = this.value.trim();
        clearTimeout(searchTimeout);

        if (query.length < 2) {
            if (recentSearches.length > 0 && query.length === 0) {
                showRecentSearches();
            } else {
                hideSuggestions();
            }
            return;
        }

        searchTimeout = setTimeout(() => {
            fetchSuggestions(query);
        }, 300);
    });

    searchInput.addEventListener('focus', function () {
        if (this.value.length === 0 && recentSearches.length > 0) {
            showRecentSearches();
        }
    });

    searchInput.addEventListener('keydown', function (e) {
        const items = suggestionsDiv.querySelectorAll('.suggestion-item');

        if (e.key === 'ArrowDown') {
            e.preventDefault();
            selectedIndex = Math.min(selectedIndex + 1, items.length - 1);
            updateSelectedItem(items);
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            selectedIndex = Math.max(selectedIndex - 1, -1);
            updateSelectedItem(items);
        } else if (e.key === 'Enter' && selectedIndex >= 0) {
            e.preventDefault();
            items[selectedIndex].click();
        } else if (e.key === 'Escape') {
            hideSuggestions();
        }
    });

    document.addEventListener('click', function (e) {
        if (!searchInput.contains(e.target) && !suggestionsDiv.contains(e.target)) {
            hideSuggestions();
        }
    });
}

function fetchSuggestions(query) {
    const suggestionsDiv = document.getElementById('searchSuggestions');
    const matchingProducts = allProducts.filter(p =>
        p.name.toLowerCase().includes(query.toLowerCase()) ||
        p.category.toLowerCase().includes(query.toLowerCase())
    ).slice(0, 6);

    if (matchingProducts.length === 0) {
        hideSuggestions();
        return;
    }

    suggestionsDiv.innerHTML = matchingProducts.map(p => `
        <div class="suggestion-item" onclick="selectSuggestion(${p.id}, '${escapeHtml(p.name)}')">
            <img src="../../../Admin/MVC/images/${p.image}" class="suggestion-image" 
                 onerror="this.src='https://via.placeholder.com/50'">
            <div class="suggestion-info">
                <div class="suggestion-name">${highlightMatch(p.name, query)}</div>
                <div class="suggestion-category">${p.category}</div>
            </div>
            <div class="suggestion-price">৳${parseFloat(p.price).toLocaleString()}</div>
        </div>
    `).join('');

    suggestionsDiv.classList.add('active');
}

function showRecentSearches() {
    const suggestionsDiv = document.getElementById('searchSuggestions');
    if (recentSearches.length === 0) return;

    suggestionsDiv.innerHTML = `
        <div class="recent-searches">
            <h4>Recent Searches</h4>
            ${recentSearches.slice(0, 5).map(s =>
        `<span class="recent-search-item" onclick="searchFromRecent('${escapeHtml(s)}')">${escapeHtml(s)}</span>`
    ).join('')}
        </div>
    `;
    suggestionsDiv.classList.add('active');
}

function selectSuggestion(productId, productName) {
    saveRecentSearch(productName);
    document.getElementById('searchInput').value = productName;
    hideSuggestions();
    openQuickView(productId);
}

function searchFromRecent(query) {
    document.getElementById('searchInput').value = query;
    hideSuggestions();
    searchProducts();
}

function saveRecentSearch(query) {
    recentSearches = recentSearches.filter(s => s !== query);
    recentSearches.unshift(query);
    recentSearches = recentSearches.slice(0, 10);
    localStorage.setItem('recentSearches', JSON.stringify(recentSearches));
}

function hideSuggestions() {
    document.getElementById('searchSuggestions')?.classList.remove('active');
}

function updateSelectedItem(items) {
    items.forEach((item, i) => {
        item.classList.toggle('selected', i === selectedIndex);
    });
}

function highlightMatch(text, query) {
    const regex = new RegExp(`(${escapeRegex(query)})`, 'gi');
    return text.replace(regex, '<strong>$1</strong>');
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

function escapeRegex(string) {
    return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
}

// ============================================
// 2. QUICK VIEW MODAL
// ============================================
function openQuickView(productId) {
    const product = allProducts.find(p => p.id == productId);
    if (!product) return;

    currentQuickViewProduct = product;

    // Add to recently viewed
    addToRecentlyViewed(product);

    // Populate modal
    document.getElementById('quickViewImage').src = `../../../Admin/MVC/images/${product.image}`;
    document.getElementById('quickViewImage').alt = product.name;
    document.getElementById('quickViewCategory').textContent = product.category;
    document.getElementById('quickViewName').textContent = product.name;
    document.getElementById('quickViewDescription').textContent = product.description || 'Premium quality product with excellent features.';

    const price = parseFloat(product.price);
    const hasDiscount = Math.random() > 0.5;
    const originalPrice = hasDiscount ? Math.round(price * 1.2) : null;

    document.getElementById('quickViewPrice').innerHTML = `
        ৳${price.toLocaleString()}
        ${originalPrice ? `<span class="original">৳${originalPrice.toLocaleString()}</span>` : ''}
    `;

    const stockEl = document.getElementById('quickViewStock');
    if (product.stock < 10) {
        stockEl.innerHTML = `⚠️ Only ${product.stock} left in stock!`;
        stockEl.className = 'quick-view-stock low-stock';
    } else {
        stockEl.innerHTML = `✓ In Stock (${product.stock} available)`;
        stockEl.className = 'quick-view-stock in-stock';
    }

    // Rating
    const rating = (Math.random() * 1.5 + 3.5).toFixed(1);
    const reviews = Math.floor(Math.random() * 100) + 5;
    document.getElementById('quickViewRating').innerHTML = `
        <span style="color: #FBBF24;">★★★★★</span>
        <span>${rating} (${reviews} reviews)</span>
    `;

    // Update wishlist icon
    const isWishlisted = wishlist.includes(productId);
    document.getElementById('modalWishlistIcon').textContent = isWishlisted ? '❤️' : '🤍';

    // Reset quantity
    document.getElementById('quickViewQuantity').value = 1;

    // Show modal
    document.getElementById('quickViewModal').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeQuickView(event) {
    if (event && event.target !== event.currentTarget) return;
    document.getElementById('quickViewModal').classList.remove('active');
    document.body.style.overflow = '';
    currentQuickViewProduct = null;
}

function changeQuantity(delta) {
    const input = document.getElementById('quickViewQuantity');
    let value = parseInt(input.value) + delta;
    value = Math.max(1, Math.min(99, value));
    input.value = value;
}

function addToCartFromModal() {
    if (!currentQuickViewProduct) return;

    const quantity = parseInt(document.getElementById('quickViewQuantity').value);
    addToCartWithAnimation(currentQuickViewProduct.id, quantity);
    closeQuickView();
}

function toggleWishlistFromModal() {
    if (!currentQuickViewProduct) return;
    toggleWishlist(currentQuickViewProduct.id);
    const isWishlisted = wishlist.includes(currentQuickViewProduct.id);
    document.getElementById('modalWishlistIcon').textContent = isWishlisted ? '❤️' : '🤍';
}

function toggleCompareFromModal() {
    if (!currentQuickViewProduct) return;
    toggleCompare(currentQuickViewProduct.id);
}

// ============================================
// 3. WISHLIST SYSTEM
// ============================================
function toggleWishlist(productId) {
    const index = wishlist.indexOf(productId);

    if (index > -1) {
        wishlist.splice(index, 1);
        showToast('Removed from wishlist', 'success');
    } else {
        wishlist.push(productId);
        showToast('❤️ Added to wishlist!', 'success');
    }

    localStorage.setItem('wishlist', JSON.stringify(wishlist));
    updateWishlistBadge();
    updateWishlistButtons();
}

function updateWishlistBadge() {
    const badge = document.getElementById('wishlistBadge');
    if (badge) {
        badge.textContent = wishlist.length;
    }
}

function updateWishlistButtons() {
    document.querySelectorAll('.wishlist-btn').forEach(btn => {
        const productId = parseInt(btn.dataset.productId);
        const isWishlisted = wishlist.includes(productId);
        btn.textContent = isWishlisted ? '❤️' : '🤍';
        btn.classList.toggle('active', isWishlisted);
    });
}

function isInWishlist(productId) {
    return wishlist.includes(productId);
}

// ============================================
// 4. FLASH SALE COUNTDOWN
// ============================================
function initFlashSaleCountdown() {
    // Set end time to 6 hours from now
    const endTime = new Date();
    endTime.setHours(endTime.getHours() + 6);

    function updateCountdown() {
        const now = new Date();
        const diff = endTime - now;

        if (diff <= 0) {
            // Reset for another 6 hours
            endTime.setHours(endTime.getHours() + 6);
            return;
        }

        const hours = Math.floor(diff / (1000 * 60 * 60));
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((diff % (1000 * 60)) / 1000);

        document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
        document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
        document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);
}

function loadFlashSaleProducts() {
    const container = document.getElementById('flashSaleProducts');
    if (!container || allProducts.length === 0) return;

    // Get 6 random products for flash sale
    const shuffled = [...allProducts].sort(() => 0.5 - Math.random());
    const flashProducts = shuffled.slice(0, 6);

    container.innerHTML = flashProducts.map(product => {
        const price = parseFloat(product.price);
        const discountPercent = Math.floor(Math.random() * 30) + 20; // 20-50% discount
        const salePrice = Math.round(price * (1 - discountPercent / 100));

        return `
            <div class="flash-product-card" onclick="openQuickView(${product.id})">
                <span class="flash-badge">-${discountPercent}%</span>
                <img src="../../../Admin/MVC/images/${product.image}" alt="${product.name}" 
                     style="width:100%; height:150px; object-fit:contain; padding:1rem; background:var(--gray-100);"
                     onerror="this.src='https://via.placeholder.com/150'">
                <div style="padding: 1rem;">
                    <h4 style="font-size:0.9rem; margin-bottom:0.5rem; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                        ${product.name}
                    </h4>
                    <div style="display:flex; gap:8px; align-items:baseline;">
                        <span style="font-weight:700; color:var(--primary);">৳${salePrice.toLocaleString()}</span>
                        <span style="font-size:0.8rem; color:var(--gray-400); text-decoration:line-through;">৳${price.toLocaleString()}</span>
                    </div>
                </div>
            </div>
        `;
    }).join('');
}

// ============================================
// 5. RECENTLY VIEWED PRODUCTS
// ============================================
function addToRecentlyViewed(product) {
    // Remove if already exists
    recentlyViewed = recentlyViewed.filter(p => p.id !== product.id);

    // Add to beginning
    recentlyViewed.unshift({
        id: product.id,
        name: product.name,
        image: product.image,
        price: product.price
    });

    // Keep only last 8
    recentlyViewed = recentlyViewed.slice(0, 8);

    localStorage.setItem('recentlyViewed', JSON.stringify(recentlyViewed));
    displayRecentlyViewed();
}

function displayRecentlyViewed() {
    const section = document.getElementById('recentlyViewedSection');
    const carousel = document.getElementById('recentlyViewedCarousel');

    if (!section || !carousel || recentlyViewed.length === 0) {
        if (section) section.style.display = 'none';
        return;
    }

    section.style.display = 'block';

    carousel.innerHTML = recentlyViewed.map(p => `
        <div class="recent-product-card" onclick="openQuickView(${p.id})">
            <img src="../../../Admin/MVC/images/${p.image}" alt="${p.name}" class="recent-product-image"
                 onerror="this.src='https://via.placeholder.com/140'">
            <div class="recent-product-info">
                <div class="recent-product-name">${p.name}</div>
                <div class="recent-product-price">৳${parseFloat(p.price).toLocaleString()}</div>
            </div>
        </div>
    `).join('');
}

// ============================================
// 6. PRODUCT COMPARISON
// ============================================
function toggleCompare(productId) {
    const index = compareList.indexOf(productId);

    if (index > -1) {
        compareList.splice(index, 1);
        showToast('Removed from comparison', 'success');
    } else {
        if (compareList.length >= 3) {
            showToast('Maximum 3 products can be compared', 'error');
            return;
        }
        compareList.push(productId);
        showToast('📊 Added to comparison!', 'success');
    }

    localStorage.setItem('compareList', JSON.stringify(compareList));
    updateCompareButton();
    updateCompareButtons();
}

function updateCompareButton() {
    const btn = document.getElementById('compareBtn');
    const countSpan = document.getElementById('compareCount');

    if (btn && countSpan) {
        countSpan.textContent = compareList.length;
        btn.style.display = compareList.length > 0 ? 'block' : 'none';
    }
}

function updateCompareButtons() {
    document.querySelectorAll('.compare-badge').forEach(btn => {
        const productId = parseInt(btn.dataset.productId);
        const isComparing = compareList.includes(productId);
        btn.textContent = isComparing ? '✓' : '📊';
        btn.classList.toggle('active', isComparing);
    });
}

function openComparison() {
    if (compareList.length < 2) {
        showToast('Add at least 2 products to compare', 'error');
        return;
    }

    const products = compareList.map(id => allProducts.find(p => p.id == id)).filter(Boolean);

    const table = document.getElementById('comparisonTable');
    table.innerHTML = `
        <tr>
            <th>Product</th>
            ${products.map(p => `
                <th>
                    <img src="../../../Admin/MVC/images/${p.image}" class="comparison-product-img"
                         onerror="this.src='https://via.placeholder.com/100'">
                    <div style="margin-top:8px; font-size:0.9rem;">${p.name}</div>
                    <button class="comparison-remove" onclick="removeFromComparison(${p.id})">Remove</button>
                </th>
            `).join('')}
        </tr>
        <tr>
            <td><strong>Price</strong></td>
            ${products.map(p => `<td style="font-size:1.25rem; font-weight:700; color:var(--primary);">৳${parseFloat(p.price).toLocaleString()}</td>`).join('')}
        </tr>
        <tr>
            <td><strong>Category</strong></td>
            ${products.map(p => `<td>${p.category}</td>`).join('')}
        </tr>
        <tr>
            <td><strong>Stock</strong></td>
            ${products.map(p => `<td>${p.stock} units</td>`).join('')}
        </tr>
        <tr>
            <td><strong>Description</strong></td>
            ${products.map(p => `<td style="font-size:0.85rem;">${p.description || 'Premium quality product'}</td>`).join('')}
        </tr>
        <tr>
            <td><strong>Action</strong></td>
            ${products.map(p => `<td><button class="btn-add-cart" style="padding:0.5rem 1rem; font-size:0.85rem;" onclick="addToCart(${p.id}); closeComparison();">Add to Cart</button></td>`).join('')}
        </tr>
    `;

    document.getElementById('comparisonModal').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeComparison(event) {
    if (event && event.target !== event.currentTarget) return;
    document.getElementById('comparisonModal').classList.remove('active');
    document.body.style.overflow = '';
}

function removeFromComparison(productId) {
    toggleCompare(productId);
    if (compareList.length < 2) {
        closeComparison();
    } else {
        openComparison();
    }
}

// ============================================
// 7. ENHANCED ANIMATIONS
// ============================================
function addToCartWithAnimation(productId, quantity = 1) {
    const productCard = document.querySelector(`[data-product-id="${productId}"]`)?.closest('.product-card');
    const cartIcon = document.querySelector('.cart-link');

    if (productCard && cartIcon) {
        // Get positions
        const productRect = productCard.getBoundingClientRect();
        const cartRect = cartIcon.getBoundingClientRect();

        // Get product image
        const productImg = productCard.querySelector('.product-image');
        const imgSrc = productImg ? productImg.src : '';

        // Create flying element
        const flyEl = document.getElementById('flyToCart');
        flyEl.style.backgroundImage = `url(${imgSrc})`;
        flyEl.style.left = productRect.left + productRect.width / 2 - 30 + 'px';
        flyEl.style.top = productRect.top + productRect.height / 2 - 30 + 'px';

        // Animate
        flyEl.classList.add('flying');

        // Animate to cart
        setTimeout(() => {
            flyEl.style.left = cartRect.left + 'px';
            flyEl.style.top = cartRect.top + 'px';
        }, 50);

        // Remove animation class
        setTimeout(() => {
            flyEl.classList.remove('flying');
        }, 800);
    }

    // Call original add to cart
    const formData = new FormData();
    formData.append('product_id', productId);
    formData.append('quantity', quantity);

    fetch('../php/cartApi.php?action=add', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showToast('✓ Added to cart!', 'success');
                updateCartBadge(data.cart_count);

                // Animate cart badge
                const badge = document.getElementById('cartBadge');
                badge.style.transform = 'scale(1.3)';
                setTimeout(() => badge.style.transform = 'scale(1)', 200);
            } else {
                if (data.redirect) {
                    showToast('Please login first', 'error');
                    setTimeout(() => window.location.href = data.redirect, 1500);
                } else {
                    showToast(data.message, 'error');
                }
            }
        });
}

// ============================================
// 8. ADVANCED FILTERS
// ============================================
function toggleFilters() {
    const toggle = document.querySelector('.filter-toggle');
    const panel = document.getElementById('filtersPanel');
    toggle.classList.toggle('active');
    panel.classList.toggle('active');
}

function updatePriceFilter(value) {
    maxPrice = parseInt(value);
    document.getElementById('maxPriceLabel').textContent = `৳${maxPrice.toLocaleString()}`;
    applyFilters();
}

function filterByRating(rating) {
    minRating = rating;
    document.querySelectorAll('.rating-btn').forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
    applyFilters();
}

function sortProducts(sortBy) {
    let sorted = [...displayedProducts];

    switch (sortBy) {
        case 'price-low':
            sorted.sort((a, b) => parseFloat(a.price) - parseFloat(b.price));
            break;
        case 'price-high':
            sorted.sort((a, b) => parseFloat(b.price) - parseFloat(a.price));
            break;
        case 'name-asc':
            sorted.sort((a, b) => a.name.localeCompare(b.name));
            break;
        case 'name-desc':
            sorted.sort((a, b) => b.name.localeCompare(a.name));
            break;
        default:
            // Default order
            break;
    }

    renderProductsWithFeatures(sorted);
}

function applyFilters() {
    let filtered = [...allProducts];

    // Price filter
    filtered = filtered.filter(p => parseFloat(p.price) <= maxPrice);

    // Rating filter (simulated since we don't have real ratings)
    // This would be connected to real data in production

    displayedProducts = filtered;
    renderProductsWithFeatures(displayedProducts);
}

// ============================================
// ENHANCED RENDER PRODUCTS (with new features)
// ============================================
function renderProductsWithFeatures(products) {
    const grid = document.getElementById('productsGrid');
    const countEl = document.getElementById('productCount');

    countEl.textContent = `${products.length} products available`;

    if (products.length === 0) {
        grid.innerHTML = `
            <div class="empty-state">
                <div class="empty-state-icon">🔍</div>
                <h3>No products found</h3>
                <p>Try adjusting your filters</p>
            </div>
        `;
        return;
    }

    grid.innerHTML = products.map(product => {
        const price = parseFloat(product.price);
        const hasDiscount = Math.random() > 0.5;
        const discountPercent = hasDiscount ? Math.floor(Math.random() * 20) + 10 : 0;
        const originalPrice = hasDiscount ? Math.round(price / (1 - discountPercent / 100)) : null;
        const rating = (Math.random() * 1.5 + 3.5).toFixed(1);
        const reviews = Math.floor(Math.random() * 100) + 5;
        const isWishlisted = wishlist.includes(product.id);
        const isComparing = compareList.includes(product.id);

        return `
            <div class="product-card" data-product-id="${product.id}">
                ${hasDiscount ? `<span class="sale-badge">-${discountPercent}%</span>` : ''}
                
                <!-- Wishlist Button -->
                <button class="wishlist-btn ${isWishlisted ? 'active' : ''}" 
                        data-product-id="${product.id}"
                        onclick="event.stopPropagation(); toggleWishlist(${product.id})">
                    ${isWishlisted ? '❤️' : '🤍'}
                </button>
                
                <!-- Compare Badge -->
                <button class="compare-badge ${isComparing ? 'active' : ''}" 
                        data-product-id="${product.id}"
                        onclick="event.stopPropagation(); toggleCompare(${product.id})"
                        style="left: auto; right: 54px;">
                    ${isComparing ? '✓' : '📊'}
                </button>
                
                <div class="product-image-wrapper" onclick="openQuickView(${product.id})">
                    <img src="../../../Admin/MVC/images/${product.image}" alt="${product.name}" class="product-image"
                         onerror="this.src='https://via.placeholder.com/300x300?text=Product'">
                    <button class="quick-view-btn" onclick="event.stopPropagation(); openQuickView(${product.id})">
                        👁️ Quick View
                    </button>
                    <button class="quick-add" onclick="event.stopPropagation(); addToCartWithAnimation(${product.id})">
                        Add to Cart
                    </button>
                </div>
                <div class="product-details">
                    <span class="product-category">${product.category || 'General'}</span>
                    <h3 class="product-name">${product.name}</h3>
                    <div class="product-rating">
                        <span class="stars">★★★★★</span>
                        <span class="rating-count">(${reviews})</span>
                    </div>
                    <div class="product-price">
                        <span class="current-price">৳${price.toLocaleString()}</span>
                        ${originalPrice ? `<span class="original-price">৳${originalPrice.toLocaleString()}</span>` : ''}
                    </div>
                    <p class="stock-status ${product.stock < 10 ? 'low' : ''}">
                        ${product.stock < 10 ? `Only ${product.stock} left!` : 'In Stock'}
                    </p>
                </div>
            </div>
        `;
    }).join('');
}

// Override the original renderProducts to use the enhanced version
const originalRenderProducts = window.renderProducts;
window.renderProducts = function (products) {
    renderProductsWithFeatures(products);
};
