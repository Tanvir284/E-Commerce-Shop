/**
 * Form Validation JavaScript
 * Client-side validation for registration and login forms
 */

document.addEventListener('DOMContentLoaded', function() {
    const registerForm = document.getElementById('registerForm');
    
    if (registerForm) {
        registerForm.addEventListener('submit', validateRegistrationForm);
        
        // Real-time validation
        const inputs = registerForm.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                validateField(this);
            });
            input.addEventListener('input', function() {
                clearFieldError(this);
            });
        });
    }
    
    // Check for URL parameters (errors from server)
    checkUrlParams();
});

/**
 * Validate registration form before submission
 */
function validateRegistrationForm(e) {
    let isValid = true;
    
    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    
    // Validate name
    if (!name.value.trim() || name.value.trim().length < 2) {
        showFieldError(name, 'Name must be at least 2 characters');
        isValid = false;
    }
    
    // Validate email
    if (!isValidEmail(email.value)) {
        showFieldError(email, 'Please enter a valid email address');
        isValid = false;
    }
    
    // Validate password
    if (password.value.length < 6) {
        showFieldError(password, 'Password must be at least 6 characters');
        isValid = false;
    }
    
    // Validate password match
    if (password.value !== confirmPassword.value) {
        showFieldError(confirmPassword, 'Passwords do not match');
        isValid = false;
    }
    
    if (!isValid) {
        e.preventDefault();
    }
    
    return isValid;
}

/**
 * Validate individual field
 */
function validateField(field) {
    const fieldId = field.id;
    const value = field.value.trim();
    
    switch (fieldId) {
        case 'name':
            if (value.length < 2) {
                showFieldError(field, 'Name must be at least 2 characters');
            }
            break;
        case 'email':
            if (!isValidEmail(value)) {
                showFieldError(field, 'Please enter a valid email address');
            }
            break;
        case 'password':
            if (value.length < 6) {
                showFieldError(field, 'Password must be at least 6 characters');
            }
            break;
        case 'confirm_password':
            const password = document.getElementById('password').value;
            if (value !== password) {
                showFieldError(field, 'Passwords do not match');
            }
            break;
    }
}

/**
 * Show error for specific field
 */
function showFieldError(field, message) {
    field.classList.add('error');
    const errorSpan = document.getElementById(field.id + 'Error');
    if (errorSpan) {
        errorSpan.textContent = message;
    }
}

/**
 * Clear error for specific field
 */
function clearFieldError(field) {
    field.classList.remove('error');
    const errorSpan = document.getElementById(field.id + 'Error');
    if (errorSpan) {
        errorSpan.textContent = '';
    }
}

/**
 * Validate email format
 */
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

/**
 * Check URL parameters for server-side errors
 */
function checkUrlParams() {
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');
    const registered = urlParams.get('registered');
    
    if (error) {
        const errorContainer = document.getElementById('error-container');
        if (errorContainer) {
            let message = 'An error occurred. Please try again.';
            switch (error) {
                case 'validation':
                    message = 'Please check your input and try again.';
                    break;
                case 'registration':
                    message = 'Registration failed. Email may already be in use.';
                    break;
                case 'server':
                    message = 'Server error. Please try again later.';
                    break;
            }
            errorContainer.innerHTML = `<ul><li>${message}</li></ul>`;
            errorContainer.classList.add('show');
        }
    }
    
    if (registered === '1') {
        // Show success message on login page
        const successDiv = document.createElement('div');
        successDiv.className = 'success-message';
        successDiv.textContent = 'Registration successful! Please login with your credentials.';
        const form = document.querySelector('.auth-form');
        if (form) {
            form.parentNode.insertBefore(successDiv, form);
        }
    }
}
