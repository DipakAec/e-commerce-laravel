# 🛒 Full E-Commerce Platform

A robust, multi-role e-commerce system built with **Laravel**, featuring **Admin**, **Seller**, and **User** levels. This project aims to deliver a scalable and feature-rich e-commerce experience with admin control, seller onboarding, and user-friendly product browsing and ordering.

---

## 👥 User Roles

### 🔑 Admin
- Full access and control over the entire platform.
- Approves or rejects seller registrations.
- Manages all products, users, and transactions.
- Views analytics and dashboards.
- Handles disputes and system configurations.

### 🛍️ Seller
- Registers and waits for admin approval.
- Once approved, can:
  - Add and manage products.
  - Track incoming orders from users.
  - Update order status (processing, shipped, etc.).
- Limited access to only their own listings and orders.

### 👤 User
- Can browse the frontend and explore all listed products.
- Registers and logs in to place orders.
- Tracks order status.
- Can leave reviews (if enabled).

---

## 🔧 Features

- ✅ Role-based authentication (Admin, Seller, User)
- ✅ Seller approval workflow
- ✅ Product management for sellers
- ✅ Order processing and status tracking
- ✅ Admin dashboard with analytics
- ✅ Secure login/register with validations
- ✅ Responsive frontend UI
- ✅ Notification system (email/SMS/in-app alerts)

---

<<<<<<< HEAD

---

## 🚀 Installation

Follow these steps to set up the project locally:

```bash
# 1. Clone the Repository
git clone https://github.com/DipakAec/e-commerce-laravel
cd e-commerce-laravel

# 2. Install PHP Dependencies
composer install

# 3. Install Frontend Assets (Optional if using Laravel Mix)
npm install && npm run dev

# 4. Set Up Environment File
cp .env.example .env
php artisan key:generate

# 5. Run Database Migrations
php artisan migrate

=======
## 🚀 Installation

Follow these steps to set up the project locally:

```bash
# 1. Clone the Repository
git clone https://github.com/DipakAec/e-commerce-laravel
cd e-commerce-laravel

# 2. Install PHP Dependencies
composer install

# 3. Install Frontend Assets (Optional if using Laravel Mix)
npm install && npm run dev

# 4. Set Up Environment File
cp .env.example .env
php artisan key:generate

# 5. Run Database Migrations
php artisan migrate

>>>>>>> 4a6b4017ca828f70ffa5866ef85e57c09c7be8ea
# 6. Start the Development Server
php artisan serve


<<<<<<< HEAD

=======
## 🚀 Installation

Follow these steps to set up the project locally:

```bash
# 1. Clone the Repository
git clone https://github.com/DipakAec/e-commerce-laravel
cd e-commerce-laravel

# 2. Install PHP Dependencies
composer install

# 3. Install Frontend Assets (Optional if using Laravel Mix)
npm install && npm run dev

# 4. Set Up Environment File
cp .env.example .env
php artisan key:generate

# 5. Run Database Migrations
php artisan migrate

# 6. Start the Development Server
php artisan serve
>>>>>>> 4a6b4017ca828f70ffa5866ef85e57c09c7be8ea
