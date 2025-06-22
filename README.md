# Restaurant Admin Panel

A modern and responsive admin dashboard for managing a restaurant's operations, including orders, menu items, users, and delivery personnel. This project is built with vanilla HTML, CSS, and JavaScript on the frontend, and PHP for the backend data handling.

## Features

- **Dashboard Overview:** At-a-glance statistics for total orders, pending orders, total revenue, and active users.
- **Interactive Charts:** Visual representations of daily revenue and order status distribution.
- **Order Management:** View all orders, see order details, and update order statuses (Accepted, Preparing, Delivered, Cancelled, Refunded).
- **Menu Management:** Full CRUD (Create, Read, Update, Delete) functionality for menu items, including image uploads.
- **User Management:** Full CRUD functionality for user profiles.
- **Delivery Management:** View and manage delivery personnel information.
- **Modern UI:** A clean, professional, and fully responsive user interface.
- **Local Data Storage:** Uses JSON files for data persistence, managed via PHP.

## Technologies Used

- **Frontend:** HTML5, CSS3, JavaScript (ES6+)
- **Backend:** PHP
- **Charting Library:** Chart.js
- **Image Hosting:** ImgBB API for image uploads

## Project Structure

```
.
├── delivery.json
├── index.html
├── menu.json
├── orders.json
├── photo_2025-06-22_17-46-14.jpg
├── README.md
├── update_delivery.php
├── update_menu.php
├── update_order.php
├── update_user.php
└── users.json
```

## Setup and Installation

To run this project locally, you will need to have PHP installed on your system.

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/chamika1/resturant_admin_panel.git
    ```

2.  **Navigate to the project directory:**
    ```bash
    cd resturant_admin_panel
    ```

3.  **Start the local PHP server:**
    ```bash
    php -S localhost:8000
    ```

4.  **Open your browser** and go to `http://localhost:8000`.

## Login Credentials

- **Username:** admin
- **Password:** admin123
