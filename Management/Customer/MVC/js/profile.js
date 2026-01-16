/**
 * Profile Page Logic
 */

document.addEventListener('DOMContentLoaded', () => {
    fetchProfileData();
    setupNavigation();
    setupForms();
    setupLogout();
});

const API_URL = '../php/profileApi.php';

// Fetch and display user data
async function fetchProfileData() {
    try {
        const response = await fetch(`${API_URL}?action=get_profile`);
        const result = await response.json();

        if (result.success) {
            populateProfile(result.data);
        } else {
            // If unauthorized, redirect to login
            if (result.message.includes('Unauthorized')) {
                window.location.href = 'login.html';
            } else {
                showToast(result.message, 'error');
            }
        }
    } catch (error) {
        console.error('Error fetching profile:', error);
        showToast('Failed to load profile data.', 'error');
    }
}

// Populate UI with user data
function populateProfile(user) {
    // Sidebar info
    document.getElementById('sidebarName').textContent = user.name;
    document.getElementById('sidebarEmail').textContent = user.email;
    document.getElementById('userInitials').textContent = getInitials(user.name);

    // Form fields
    document.getElementById('fullName').value = user.name;
    document.getElementById('email').value = user.email;
    document.getElementById('phone').value = user.phone || '';
    document.getElementById('address').value = user.address || '';
}

// Helper: Get initials from name
function getInitials(name) {
    return name
        .split(' ')
        .map(word => word[0])
        .join('')
        .toUpperCase()
        .substring(0, 2);
}

// Setup sidebar navigation
function setupNavigation() {
    const navItems = document.querySelectorAll('.profile-nav .nav-item[data-section]');

    navItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();

            // Remove active class from all items and sections
            document.querySelectorAll('.nav-item').forEach(nav => nav.classList.remove('active'));
            document.querySelectorAll('.profile-section').forEach(sec => sec.classList.remove('active'));

            // Add active class to clicked item
            item.classList.add('active');

            // Show corresponding section
            const sectionId = item.getAttribute('data-section');
            document.getElementById(sectionId).classList.add('active');
        });
    });
}

// Setup form submissions
function setupForms() {
    // Personal Info Update
    const profileForm = document.getElementById('profileForm');
    profileForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const btn = document.getElementById('saveProfileBtn');
        const originalText = btn.textContent;

        try {
            btn.textContent = 'Saving...';
            btn.disabled = true;

            const formData = {
                action: 'update_profile',
                name: document.getElementById('fullName').value,
                phone: document.getElementById('phone').value,
                address: document.getElementById('address').value
            };

            const response = await fetch(API_URL, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(formData)
            });

            const result = await response.json();

            if (result.success) {
                showToast(result.message, 'success');
                // Update sidebar name immediately
                document.getElementById('sidebarName').textContent = formData.name;
                document.getElementById('userInitials').textContent = getInitials(formData.name);
            } else {
                showToast(result.message, 'error');
            }
        } catch (error) {
            console.error('Error updating profile:', error);
            showToast('An error occurred. Please try again.', 'error');
        } finally {
            btn.textContent = originalText;
            btn.disabled = false;
        }
    });

    // Password Change
    const passwordForm = document.getElementById('passwordForm');
    passwordForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const currentPassword = document.getElementById('currentPassword').value;
        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        if (newPassword !== confirmPassword) {
            showToast('New passwords do not match.', 'error');
            return;
        }

        const btn = document.getElementById('changePasswordBtn');
        const originalText = btn.textContent;

        try {
            btn.textContent = 'Updating...';
            btn.disabled = true;

            const formData = {
                action: 'change_password',
                current_password: currentPassword,
                new_password: newPassword
            };

            const response = await fetch(API_URL, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(formData)
            });

            const result = await response.json();

            if (result.success) {
                showToast(result.message, 'success');
                passwordForm.reset();
            } else {
                showToast(result.message, 'error');
            }
        } catch (error) {
            console.error('Error changing password:', error);
            showToast('An error occurred.', 'error');
        } finally {
            btn.textContent = originalText;
            btn.disabled = false;
        }
    });
}

// Setup Logout
function setupLogout() {
    const logoutBtn = document.getElementById('logoutBtn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', async () => {
            try {
                const response = await fetch(API_URL, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ action: 'logout' })
                });

                const result = await response.json();

                if (result.success) {
                    window.location.href = 'index.html';
                }
            } catch (error) {
                console.error('Logout failed:', error);
                window.location.href = 'index.html'; // Fallback redirect
            }
        });
    }
}

// Toast Notification Helper
function showToast(message, type = 'success') {
    const toast = document.getElementById('toast');
    toast.textContent = message;
    toast.className = `toast ${type} show`;

    setTimeout(() => {
        toast.className = 'toast';
    }, 3000);
}
