/**
 * Admin Panel JavaScript
 * Handles image upload preview and form interactions
 */

document.addEventListener('DOMContentLoaded', function () {
    // Image upload handling
    setupImageUpload();

    // Check for URL parameters
    checkUrlParams();

    // Form validation
    setupFormValidation();
});

/**
 * Setup image upload preview
 */
function setupImageUpload() {
    const uploadArea = document.getElementById('imageUploadArea');
    const fileInput = document.getElementById('image');
    const preview = document.getElementById('imagePreview');
    const placeholder = document.getElementById('uploadPlaceholder');

    if (!uploadArea || !fileInput) return;

    // Click to upload
    uploadArea.addEventListener('click', function () {
        fileInput.click();
    });

    // Handle file selection
    fileInput.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            if (validateImageFile(file)) {
                displayImagePreview(file, preview, placeholder);
            } else {
                fileInput.value = '';
            }
        }
    });

    // Drag and drop
    uploadArea.addEventListener('dragover', function (e) {
        e.preventDefault();
        this.style.borderColor = 'var(--primary-color)';
        this.style.background = '#F0F0FF';
    });

    uploadArea.addEventListener('dragleave', function (e) {
        e.preventDefault();
        this.style.borderColor = '';
        this.style.background = '';
    });

    uploadArea.addEventListener('drop', function (e) {
        e.preventDefault();
        this.style.borderColor = '';
        this.style.background = '';

        const file = e.dataTransfer.files[0];
        if (file) {
            if (validateImageFile(file)) {
                // Create a new FileList-like object
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                fileInput.files = dataTransfer.files;
                displayImagePreview(file, preview, placeholder);
            }
        }
    });
}

/**
 * Validate image file
 */
function validateImageFile(file) {
    const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    const maxSize = 5 * 1024 * 1024; // 5MB

    if (!allowedTypes.includes(file.type)) {
        showMessage('Invalid file type. Please upload JPG, PNG, GIF, or WEBP.', 'error');
        return false;
    }

    if (file.size > maxSize) {
        showMessage('File too large. Maximum size is 5MB.', 'error');
        return false;
    }

    return true;
}

/**
 * Display image preview
 */
function displayImagePreview(file, preview, placeholder) {
    const reader = new FileReader();

    reader.onload = function (e) {
        preview.src = e.target.result;
        preview.classList.add('show');
        placeholder.style.display = 'none';
    };

    reader.readAsDataURL(file);
}

/**
 * Check URL parameters for messages
 */
function checkUrlParams() {
    const urlParams = new URLSearchParams(window.location.search);
    const success = urlParams.get('success');
    const error = urlParams.get('error');

    if (success === '1') {
        showMessage('Product added successfully!', 'success');
        // Clear form
        const form = document.getElementById('productForm');
        if (form) form.reset();

        // Reset image preview
        const preview = document.getElementById('imagePreview');
        const placeholder = document.getElementById('uploadPlaceholder');
        if (preview) preview.classList.remove('show');
        if (placeholder) placeholder.style.display = 'flex';
    }

    if (error) {
        let message = 'An error occurred.';
        switch (error) {
            case 'validation':
                message = 'Please check your input and try again.';
                break;
            case 'database':
                message = 'Database error. Please try again.';
                break;
            case 'server':
                message = 'Server error. Please try again later.';
                break;
        }
        showMessage(message, 'error');
    }

    // Clean URL
    if (success || error) {
        window.history.replaceState({}, document.title, window.location.pathname);
    }
}

/**
 * Show message
 */
function showMessage(text, type) {
    const container = document.getElementById('message-container');
    if (!container) return;

    const messageDiv = document.createElement('div');
    messageDiv.className = `message message-${type}`;
    messageDiv.textContent = text;

    container.innerHTML = '';
    container.appendChild(messageDiv);

    // Auto-hide after 5 seconds
    setTimeout(() => {
        messageDiv.style.opacity = '0';
        setTimeout(() => messageDiv.remove(), 300);
    }, 5000);
}

/**
 * Setup form validation
 */
function setupFormValidation() {
    const form = document.getElementById('productForm');
    if (!form) return;

    form.addEventListener('submit', function (e) {
        const name = document.getElementById('name').value.trim();
        const price = parseFloat(document.getElementById('price').value);
        const stock = parseInt(document.getElementById('stock').value);
        const category = document.getElementById('category').value;

        let errors = [];

        if (!name) errors.push('Product name is required');
        if (isNaN(price) || price <= 0) errors.push('Valid price is required');
        if (isNaN(stock) || stock < 0) errors.push('Valid stock quantity is required');
        if (!category) errors.push('Please select a category');

        if (errors.length > 0) {
            e.preventDefault();
            showMessage(errors.join('. '), 'error');
        }
    });
}
