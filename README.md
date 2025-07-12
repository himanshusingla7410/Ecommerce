# 🌸 Dilkash - Women's Apparel E-commerce Website

**Dilkash** is a modern and elegant online store for women's fashion. Built using Laravel and Tailwind CSS, it offers a smooth shopping experience, powerful product filtering, secure payments, and automated order communication — all hosted on AWS with continuous deployment.

---

## 🛍️ Features

- 👗 Elegant UI with Tailwind CSS for seamless UX
- 🔎 Advanced product filtering using **noUiSlider**
- 🛒 Add to Cart, Wishlist, and Checkout flows
- 💳 Integrated **Razorpay** for secure online payments
- 📧 Auto-generated order confirmation emails using Laravel **Mailable**
- ⚡ Response caching with Laravel's **Spatie** package
- 🚀 CI/CD with **GitHub Actions** for deployment to **AWS Lightsail**

---

## 💻 Tech Stack

- **Backend:** PHP, Laravel
- **Frontend:** Tailwind CSS, HTML, CSS, JavaScript
- **Build Tool:** Vite
- **Database:** MySQL
- **Payment Gateway:** Razorpay
- **Caching:** Spatie Laravel Response Cache
- **Slider/Filtering:** noUiSlider
- **Deployment:** AWS Lightsail
- **CI/CD:** GitHub Actions

---

## ⚙️ Installation

> Follow the steps below to run this project locally

```bash
# Clone the repository
git clone https://github.com/himanshusingla7410/Ecommerce.git
cd dilkash

# Install dependencies
composer install
npm install

# Copy and configure environment variables
cp .env.example .env
php artisan key:generate

# Set up the database
php artisan migrate --seed

# Start development server
php artisan serve
npm run dev
```
---
## 🚀 Deployment (CI/CD)
Code is pushed to production server on AWS Lightsail via GitHub Actions pipeline.

The CI/CD pipeline handles:

Composer and npm install

Laravel migration and caching

Restarting the web service

---
## 📧 Order Email Notification
Laravel's Mailable feature is used to send customers:

Order confirmation

Payment status

Shipping updates (optional)

---
## 📷 Screenshots
<img width="1897" height="827" alt="image" src="https://github.com/user-attachments/assets/47ba85e0-cbc9-4e1d-9ae6-ac56ca791ad4" />
<img width="1867" height="821" alt="image" src="https://github.com/user-attachments/assets/203a1e2f-5cf0-4735-974e-efb8eb3861f6" />
<img width="1829" height="815" alt="image" src="https://github.com/user-attachments/assets/260d32d3-e3c7-42db-a52d-2df55662ad7e" />

---
## 👤 Author
Developed with ❤️ by Himanshu Singla

