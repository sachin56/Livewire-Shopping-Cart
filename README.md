# Shopping Cart System

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.4%2B-777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql)
![Livewire](https://img.shields.io/badge/Livewire-3-4E87B2?style=for-the-badge&logo=laravel)
![Vite](https://img.shields.io/badge/Vite-5-646CFF?style=for-the-badge&logo=vite)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap)
![License](https://img.shields.io/badge/license-MIT-blue.svg?style=for-the-badge)


A feature-rich web application built with **Laravel 12** to provide seamless travel experiences. It uses **MySQL** as its database and includes powerful third-party libraries for enhanced functionality.

- **Project Start Date:** 2025-10-31
- **Version 1 Completion Date:** 2025-11-01


## 🛠️ Tech Stack

-   **Backend:** Laravel 12, PHP 8.4+
-   **Database:** MySQL
-   **Frontend:** Frontend: Blade Templates, Vite, Bootstrap 5, Livewire 3
-   **DevOps:** Git, Composer

---

## 🚀 Getting Started

Follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

Make sure you have the following software installed on your system:
-   PHP >= 8.4
-   Composer
-   Node.js & npm
-   A local MySQL server

### Installation Guide

1.  **Clone the Repository**
    Open your terminal and clone the project repository.

    ```bash
    git clone [https://github.com/sachin56/Livewire-Shopping-Cart.git](https://github.com/sachin56/Livewire-Shopping-Cart.git)
    cd livewire-cart-challenge
    ```

2.  **Install PHP Dependencies**
    Install all the required backend packages using Composer.

    ```bash
    composer install
    ```

3.  **Create Environment File**
    Copy the example environment file and generate a unique application key.

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Configure Your Database**
    Open the `.env` file you just created and update the database connection details to match your local mysql setup. You will need to create a new database named `cart_challenge_db`.

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306 # The default port for MySQL is 3306
    DB_DATABASE=cart_challenge_db
    DB_USERNAME=your_db_user_name # <-- IMPORTANT: Change this to your actual user name
    DB_PASSWORD=your_secret_password # <-- IMPORTANT: Change this to your actual password
    ```

5.  **Run Database Migrations**
    This command will create all the necessary tables in your database.

    ```bash
    php artisan migrate
    ```
    *Optional: To populate the database with seed data, run `php artisan migrate --seed`.*

6.  **Install Frontend Dependencies**
    Install the necessary Node.js packages.

    ```bash
    npm install
    ```


7.  **Run the Application**
    You're all set! Start the Laravel development server.

    ```bash
    php artisan serve
    ```

    Your application will now be running at **[http://127.0.0.1:8000](http://127.0.0.1:8000)**.

---

## 🧪 Running Tests

To run the application's test suite, use the following command:

```bash
php artisan test