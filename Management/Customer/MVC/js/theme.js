/**
 * E-Commerce Theme Manager
 * Handles Day/Night Mode toggling and persistent storage
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Check for saved theme preference in localStorage
    const savedTheme = localStorage.getItem('ecommerce_theme');

    // 2. Default to 'light' if none saved, otherwise apply saved theme
    const initialTheme = savedTheme ? savedTheme : 'light';
    document.documentElement.setAttribute('data-theme', initialTheme);

    // 3. Update the toggle button icon based on the initial theme
    const themeToggles = document.querySelectorAll('.theme-toggle');
    updateToggleIcons(themeToggles, initialTheme);

    // 4. Attach click listeners to all toggle buttons (Storefront + Admin)
    themeToggles.forEach(toggle => {
        toggle.addEventListener('click', () => {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';

            // Apply new theme
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('ecommerce_theme', newTheme);

            // Update icons
            updateToggleIcons(themeToggles, newTheme);
        });
    });
});

/**
 * Updates the text/icon of the theme toggle button based on active theme
 * @param {NodeList} toggles 
 * @param {String} theme 
 */
function updateToggleIcons(toggles, theme) {
    toggles.forEach(toggle => {
        if (theme === 'dark') {
            toggle.innerHTML = '☀️ Day Mode';
        } else {
            toggle.innerHTML = '🌙 Night Mode';
        }
    });
}
