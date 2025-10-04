<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

# 🌐 LNORM — Laravel Multilingual Invoice Manager

💻 **Full-Stack Developer | Laravel & PHP Specialist | Builder of LNORM**  
I build scalable, multilingual web applications using **Laravel, PHP, and MySQL** with a focus on clean architecture, responsive design, and solving real-world business problems.

---

## 🔠 What is LNORM?

**LNORM** is a multilingual invoice management system designed for small businesses.  
It helps manage **clients, invoices, admin settings, and dynamic currency formatting** — across different languages and locales.

**LNORM stands for:**
- **L** – Laravel: Clean & scalable backend framework  
- **N** – Nav Bar: Intuitive navigation  
- **O** – Authentication: Secure login & access control  
- **R** – Responsive: Mobile-friendly design  
- **M** – Multi-Lingual: Dynamic language & currency support  

---

## 🚀 Features
- ✅ Locale-based routing with middleware  
- ✅ Dynamic currency formatting using PHP Intl  
- ✅ Admin panel with settings & client management  
- ✅ Invoice CRUD operations  
- ✅ Role-based authentication (Admin/User)  
- ✅ Language switcher with session support  

---

## 🛠 Tech Stack
- **Laravel 12.x**  
- **PHP 8.2**  
- **MySQL**  
- **JavaScript (ES6)**  
- **Bootstrap 5**  

---

## 📂 Project Structure
- **Dashboard** → `/dashboard`  
- **Admin Panel** → `/admin/settings`  
- **Clients** → `/admin/clients`  
- **Invoices** → `/admin/invoices`  
- **Language Switch** → `/lang/{locale}` (e.g. `/lang/en`, `/lang/ar`, `/lang/fr`)  

---

## 📦 Installation
```bash
# Clone repository
git clone https://github.com/SyedMobinMian/LNORM.git

# Install dependencies
composer install

# Enable in Php.ini
extension=intl
extension=gd

# Setup environment
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate

# Start development server
php artisan serve
