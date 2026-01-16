# 🛍️ E-Shop Bangladesh

![Project Status](https://img.shields.io/badge/status-active-success.svg)
![License](https://img.shields.io/badge/license-MIT-blue.svg)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4.svg)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1.svg)

A premium, full-featured E-Commerce application built with vanilla PHP, MySQL, and modern frontend technologies. Designed to provide a seamless shopping experience with features like flash sales, advanced filtering, user profiles, and a robust admin dashboard.

---

## ✨ Key Features

### 👤 Customer Features
*   **Modern UI/UX**: Responsive design with glassmorphism effects and smooth animations.
*   **Product Discovery**:
    *   Advanced search with auto-suggestions.
    *   Category filtering and sorting.
    *   Price range and star rating filters.
*   **Shopping Experience**:
    *   🛒 **Smart Cart**: Real-time updates and fly-to-cart animations.
    *   ❤️ **Wishlist**: Save favorite items for later.
    *   ⚡ **Flash Sales**: Countdown timer for limited-time offers.
    *   📊 **Compare**: Side-by-side product comparison.
    *   👀 **Quick View**: Modal for instant product details.
*   **User Account**:
    *   **Profile Management**: Update personal details and address.
    *   **Order History**: Track past orders and status.
    *   **Security**: Secure password management.

### 🛠️ Admin Dashboard
*   **Dashboard Overview**: Real-time statistics on sales, orders, and users.
*   **Product Management**: Add, edit, and remove products with image support.
*   **Order Management**: View and update order statuses (Pending, Shipped, Delivered).
*   **User Management**: Manage registered customers.

---

## 🚀 Getting Started

### Prerequisites
*   [XAMPP](https://www.apachefriends.org/) or any PHP/MySQL development environment.
*   A web browser.

### Installation

1.  **Clone the Repository**
    ```bash
    git clone https://github.com/Tanvir284/E-Commerce-Shop.git
    ```

2.  **Setup Database**
    *   Open **phpMyAdmin** (`http://localhost/phpmyadmin`).
    *   Create a new database named `ecommerce_db` (or check `dbConnection.php` for the exact name).
    *   Import the provided SQL files:
        1.  `schema.sql` (Structure)
        2.  `products_200.sql` (Seed Data)

3.  **Configure Project**
    *   Move the project folder to your server directory (e.g., `C:\xampp\htdocs\E-Commerece System`).
    *   Ensure database credentials in `Management/Customer/MVC/db/dbConnection.php` match your local setup.

4.  **Run the Application**
    *   Open your browser and visit:
        ```
        http://localhost/E-Commerece System/Customer/MVC/html/index.html
        ```

---

## 📂 Project Structure

```
E-Commerce-Shop/
├── Management/
│   ├── Admin/              # Admin Panel Source
│   │   ├── MVC/
│   │   │   ├── html/       # Dashboard Views
│   │   │   ├── php/        # Admin Logic/API
│   │   │   └── ...
│   ├── Customer/           # Storefront Source
│   │   ├── MVC/
│   │   │   ├── html/       # Shop Pages (Index, Cart, Profile)
│   │   │   ├── css/        # Stylesheets (shop.css, profile.css)
│   │   │   ├── js/         # Logic (features.js, profile.js)
│   │   │   ├── php/        # Backend APIs
│   │   │   └── ...
├── products_200.sql        # Sample Data
├── schema.sql              # Database Schema
└── README.md               # Documentation
```

---

## 💻 Technologies Used

*   **Frontend**: HTML5, CSS3 (Custom + Responsive), JavaScript (ES6+).
*   **Backend**: PHP (Vanilla).
*   **Database**: MySQL.
*   **Tools**: PowerShell (for image scraping scripts), Git.

---

## 📸 Screenshots

*(Add screenshots of your project here)*

---

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1.  Fork the Project
2.  Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3.  Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4.  Push to the Branch (`git push origin feature/AmazingFeature`)
5.  Open a Pull Request

---

## 📄 License

Distributed under the MIT License. See `LICENSE` for more information.

---

<p align="center">
  Made with ❤️ by <a href="https://github.com/Tanvir284">Tanvir Islam</a>
</p>