/**
 * Checkout Page JavaScript
 * Handles order placement
 */

document.addEventListener('DOMContentLoaded', function () {
    loadOrderSummary();
    setupCheckoutForm();
});

/**
 * Load order summary from cart
 */
function loadOrderSummary() {
    fetch('../php/cartApi.php?action=get')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                if (data.items.length === 0) {
                    // Redirect to cart if empty
                    window.location.href = 'cart.html';
                    return;
                }
                renderOrderSummary(data.items, data.total);
            } else {
                if (data.redirect) {
                    window.location.href = data.redirect;
                }
            }
        });
}

/**
 * Render order summary
 */
function renderOrderSummary(items, total) {
    const container = document.getElementById('orderItems');
    const subtotalEl = document.getElementById('subtotal');
    const totalEl = document.getElementById('total');

    subtotalEl.textContent = '$' + parseFloat(total).toFixed(2);
    totalEl.textContent = '$' + parseFloat(total).toFixed(2);

    container.innerHTML = items.map(item => `
        <div class="order-item">
            <img src="../../Admin/MVC/images/${item.image}" alt="${item.name}" class="order-item-image"
                 onerror="this.src='https://via.placeholder.com/60x60?text=No+Image'">
            <div class="order-item-info">
                <h4>${item.name}</h4>
                <span class="qty">Qty: ${item.quantity}</span>
            </div>
            <div class="order-item-price">$${parseFloat(item.subtotal).toFixed(2)}</div>
        </div>
    `).join('');
}

/**
 * Setup checkout form submission
 */
function setupCheckoutForm() {
    const form = document.getElementById('checkoutForm');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const btn = document.getElementById('placeOrderBtn');
        btn.disabled = true;
        btn.textContent = 'Processing...';

        // Gather form data
        const formData = new FormData(form);

        // Build shipping address
        const address = [
            formData.get('address'),
            formData.get('city'),
            formData.get('zip')
        ].join(', ');

        formData.append('shipping_address', address);

        // Submit order
        fetch('../php/checkoutApi.php?action=place', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('orderId').textContent = '#' + data.order_id;
                    document.getElementById('successModal').style.display = 'block';
                } else {
                    showToast(data.message, 'error');
                    btn.disabled = false;
                    btn.textContent = '🔒 Place Order';
                }
            })
            .catch(error => {
                showToast('Failed to place order. Please try again.', 'error');
                btn.disabled = false;
                btn.textContent = '🔒 Place Order';
            });
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
