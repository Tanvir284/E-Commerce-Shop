/**
 * E-Shop Bangladesh - Shop JavaScript
 * Clean, minimal functionality with BD Taka
 */

let allProducts = [];
let displayedProducts = [];

document.addEventListener('DOMContentLoaded', function () {
    loadProducts();
    loadCategories();
    updateCartBadge();

    // Search on Enter
    document.getElementById('searchInput').addEventListener('keypress', function (e) {
        if (e.key === 'Enter') searchProducts();
    });
});

/**
 * Load products
 */
function loadProducts() {
    fetch('../php/productsApi.php?action=list')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                allProducts = data.products;
                displayedProducts = [...allProducts];
                renderProducts(displayedProducts);
            }
        })
        .catch(error => {
            document.getElementById('productsGrid').innerHTML = `
                <div class="empty-state">
                    <div class="empty-state-icon">�</div>
                    <h3>Failed to load products</h3>
                    <p>Please refresh the page</p>
                </div>
            `;
        });
}

/**
 * Load categories
 */
function loadCategories() {
    fetch('../php/productsApi.php?action=categories')
        .then(response => response.json())
        .then(data => {
            if (data.success && data.categories.length > 0) {
                const container = document.getElementById('categoryPills');
                const pills = data.categories.map(cat =>
                    `<button class="category-pill" onclick="filterCategory('${cat}', this)">${cat}</button>`
                ).join('');
                container.innerHTML = `<button class="category-pill active" onclick="filterCategory('all', this)">All</button>` + pills;
            }
        });
}

/**
 * Render products
 */
function renderProducts(products) {
    const grid = document.getElementById('productsGrid');
    const countEl = document.getElementById('productCount');

    countEl.textContent = `${products.length} products available`;

    if (products.length === 0) {
        grid.innerHTML = `
            <div class="empty-state">
                <div class="empty-state-icon">🔍</div>
                <h3>No products found</h3>
                <p>Try a different search term</p>
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

        return `
            <div class="product-card">
                ${hasDiscount ? `<span class="sale-badge">-${discountPercent}%</span>` : ''}
                <div class="product-image-wrapper">
                    <img src="../../../Admin/MVC/images/${product.image}" alt="${product.name}" class="product-image"
                         onerror="this.src='https://via.placeholder.com/300x300?text=Product'">
                    <button class="quick-add" onclick="event.stopPropagation(); addToCart(${product.id})">
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

/**
 * Filter by category
 */
function filterCategory(category, btn) {
    // Update active state
    document.querySelectorAll('.category-pill').forEach(p => p.classList.remove('active'));
    btn.classList.add('active');

    // Update title
    document.getElementById('sectionTitle').textContent =
        category === 'all' ? 'Featured Products' : category;

    // Filter
    displayedProducts = category === 'all' ?
        [...allProducts] :
        allProducts.filter(p => p.category === category);

    renderProducts(displayedProducts);
}

/**
 * Search products
 */
function searchProducts() {
    const query = document.getElementById('searchInput').value.trim();

    if (!query) {
        displayedProducts = [...allProducts];
        document.getElementById('sectionTitle').textContent = 'Featured Products';
        renderProducts(displayedProducts);
        return;
    }

    fetch(`../php/productsApi.php?action=search&q=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('sectionTitle').textContent = `Results for "${query}"`;
                displayedProducts = data.products;
                renderProducts(displayedProducts);
            }
        });
}

/**
 * Add to cart
 */
function addToCart(productId) {
    const formData = new FormData();
    formData.append('product_id', productId);
    formData.append('quantity', 1);

    fetch('../php/cartApi.php?action=add', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showToast('✓ Added to cart!', 'success');
                updateCartBadge(data.cart_count);
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

/**
 * Update cart badge
 */
function updateCartBadge(count = null) {
    const badge = document.getElementById('cartBadge');
    if (count !== null) {
        badge.textContent = count;
        return;
    }

    fetch('../php/cartApi.php?action=count')
        .then(response => response.json())
        .then(data => {
            if (data.success) badge.textContent = data.count;
        })
        .catch(() => badge.textContent = '0');
}

/**
 * Show toast
 */
function showToast(message, type = 'success') {
    const toast = document.getElementById('toast');
    toast.textContent = message;
    toast.className = 'toast ' + type + ' show';
    setTimeout(() => toast.classList.remove('show'), 3000);
}
