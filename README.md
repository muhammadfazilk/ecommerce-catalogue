# Laravel E-commerce Catalog with Cart & Document Management

A simple Laravel 12-based e-commerce application with:
- Product catalog & filtering
- Cart functionality (session-based)
- Multi-level access control (admin, manager, customer)
- Compliance document management for products
- Simple storefront for browsing & shopping

## Features

### 🛍️ Storefront
- Browse products with category filter
- Product detail view
- Add to cart, View cart & Remove from cart
- Cart quantity & subtotal calculation

### 🔐 Access Control
- Admin: full access
- Manager: manage products, category management & compliance documents
- Customer: view products, use cart

### 📄 Compliance Document Management
- Upload and associate documents to products
- Supported types: Product Certifications, User Manuals
- Metadata: title, issue date, document type
- PDF download with metadata rendered in template

## Tech Stack

- **Laravel 12**
- **Tailwind CSS + Bootstrap 5** (for hybrid UI)
- Blade templating
- Session-based cart
- Eloquent ORM

## Installation

```bash
git clone https://github.com/yourname/laravel-catalog.git
cd laravel-catalog

# Install dependencies
composer install
npm install && npm run dev

# Set up environment
cp .env.example .env
php artisan key:generate

# DB setup
php artisan migrate --seed

php artisan serve
