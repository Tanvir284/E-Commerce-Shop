/**
 * Cart Page JavaScript
 * Handles cart display and operations
 */

document.addEventListener('DOMContentLoaded', function () {
    loadCart();
});

/**
 * Load cart items
 */
function loadCart() {
    fetch('../php/cartApi.php?action=get')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                renderCart(data.items, data.total, data.count);
            } else {
                if (data.redirect) {
                    window.location.href = data.redirect;
                }
            }
        })
        .catch(error => {
            document.getElementById('cartItems').innerHTML = `
                <div class="empty-cart">
                    <div class="empty-cart-icon">⚠️</div>
                    <h2>Error loading cart</h2>
                    <p>Please try again later</p>
                </div>
            `;
        });
}

/**
 * Render cart items
 */
function renderCart(items, total, count) {
    const container = document.getElementById('cartItems');
    const badge = document.getElementById('cartBadge');
    const subtotalEl = document.getElementById('subtotal');
    const totalEl = document.getElementById('total');
    const checkoutBtn = document.getElementById('checkoutBtn');

    badge.textContent = count;
    subtotalEl.textContent = '$' + parseFloat(total).toFixed(2);
    totalEl.textContent = '$' + parseFloat(total).toFixed(2);

    if (items.length === 0) {
        container.innerHTML = `
            <div class="empty-cart">
                <div class="empty-cart-icon">🛒</div>
                <h2>Your cart is empty</h2>
                <p>Add some products to get started!</p>
                <a href="index.html" class="btn btn-primary">Browse Products</a>
            </div>
        `;
        checkoutBtn.style.display = 'none';
        return;
    }

    checkoutBtn.style.display = 'block';

    container.innerHTML = items.map(item => `
        <div class="cart-item" data-product-id="${item.product_id}">
            <img src="../../Admin/MVC/images/${item.image}" alt="${item.name}" class="cart-item-image"
                 onerror="this.src='https://via.placeholder.com/100x100?text=No+Image'">
            <div class="cart-item-info">
                <h3>${item.name}</h3>
                <p class="category">${item.category || 'General'}</p>
                <p class="price">$${parseFloat(item.price).toFixed(2)}</p>
            </div>
            <div class="quantity-control">
                <button class="quantity-btn" onclick="updateQuantity(${item.product_id}, ${item.quantity - 1})">−</button>
                <input type="number" class="quantity-input" value="${item.quantity}" min="1" max="${item.stock}"
                       onchange="updateQuantity(${item.product_id}, this.value)">
                <button class="quantity-btn" onclick="updateQuantity(${item.product_id}, ${item.quantity + 1})">+</button>
            </div>
            <div class="cart-item-total">$${parseFloat(item.subtotal).toFixed(2)}</div>
            <button class="remove-btn" onclick="removeItem(${item.product_id})" title="Remove">×</button>
        </div>
    `).join('');
}

/**
 * Update item quantity
 */
function updateQuantity(productId, quantity) {
    quantity = parseInt(quantity);
    if (quantity < 0) quantity = 0;

    const formData = new FormData();
    formData.append('product_id', productId);
    formData.append('quantity', quantity);

    fetch('../php/cartApi.php?action=update', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadCart(); // Reload cart to show updated values
            } else {
                showToast(data.message, 'error');
            }
        });
}

/**
 * Remove item from cart
 */
function removeItem(productId) {
    const formData = new FormData();
    formData.append('product_id', productId);

    fetch('../php/cartApi.php?action=remove', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showToast('Item removed', 'success');
                loadCart();
            } else {
                showToast(data.message, 'error');
            }
        });
}

/**
 * Show toast notification
 */
function showToast(message, type = 'success') {
    const toast = document.getElementById('toast');
    toast.textContent = message;
    toast.className = 'toast ' + type + ' show';

    setTimeout(() => {
        toast.classList.remove('show');
    }, 3000);
}
