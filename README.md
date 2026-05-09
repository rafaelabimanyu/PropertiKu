# 🏰 PropertiKu — AI-Powered Luxury Property Marketplace

[![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com)
[![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css)](https://tailwindcss.com)
[![Vite](https://img.shields.io/badge/Vite-Ready-646CFF?style=for-the-badge&logo=vite)](https://vitejs.dev)
[![Status](https://img.shields.io/badge/Status-Production--Ready-success?style=for-the-badge)](https://github.com/rafaelabimanyu/PropertiKu)

**PropertiKu** is a premium, high-end real estate marketplace built for the modern era. Designed with a focus on luxury aesthetics and intelligent user experience, it bridges the gap between buyers, agents, and administrators through a sophisticated AI-driven ecosystem.

---

## 🚀 The Vision

PropertiKu isn't just another listing site. It is a comprehensive **Role-Based Marketplace** designed to handle the entire real estate lifecycle—from smart discovery and virtual negotiation to survey scheduling and trust verification.

### ✨ Core Pillars
- **Premium Aesthetics**: Glassmorphism UI with a focus on high-quality visuals.
- **Trust-First Approach**: Integrated agent verification and transparent review systems.
- **Intelligent Discovery**: AI-driven recommendation logic matching user preferences.
- **Operational Excellence**: Dedicated workspaces for every user role.

---

## 💎 Key Features

| Feature | Description |
| :--- | :--- |
| **Multi-Role System** | Dynamic RBAC for Guests, Buyers, Agents, and Admins. |
| **AI Recommendations** | Smart property matching based on city, type, and price range. |
| **Booking & Surveys** | Integrated scheduling system for property visits. |
| **Internal Chat** | Direct messaging system between Buyers and Agents. |
| **Leads Management** | Full sales pipeline (New, Contacted, Qualified, Closed). |
| **Agent Verification** | Manual admin moderation for professional trust badges. |
| **Monetization** | Featured listing system for prioritized search visibility. |
| **Reviews & Ratings** | Multi-dimensional feedback for properties and agents. |
| **Notifications** | Real-time alerts for bookings, messages, and status updates. |
| **Responsive Design** | Perfect experience on Mobile, Tablet, and Desktop. |

---

## 👥 Role-Based Experience

### 👤 Guest
The entry point. Guests can browse properties, use advanced filters, and view detailed listings. To interact (chat, book, favorite), they are seamlessly guided to join the ecosystem.

### 🛍️ Buyer Portal
A luxury customer portal focused on discovery.
- **Personalized Feed**: AI-curated property recommendations.
- **Wishlist**: Save favorite estates for future reference.
- **Booking Manager**: Track upcoming and past property surveys.
- **Communication**: Centralized inbox for agent conversations.

### 💼 Agent Workspace
A powerful CRM and listing manager.
- **Listing Engine**: Full CRUD for premium property portfolios.
- **Leads Pipeline**: Automated lead capture from chats and bookings.
- **Performance Analytics**: Visual data on market reach and conversion.
- **Trust Center**: Manage professional verification profile.

### 🛡️ Command Center (Admin)
Full platform oversight and moderation.
- **Moderation Queue**: Review agent verification requests.
- **Market Data**: Overview of total users, properties, and bookings.
- **User Management**: Direct control over platform membership.

---

## 🛠️ Tech Stack

- **Backend**: Laravel 11.x (PHP 8.2+)
- **Frontend**: Blade Components, Tailwind CSS (Glassmorphism), Alpine.js
- **Build Tool**: Vite
- **Database**: MySQL / PostgreSQL / SQLite
- **Maps**: Leaflet.js Integration
- **Optimization**: Eager Loading, Query Caching, Route Optimization

---

## 📦 Installation Guide

Follow these steps to set up the PropertiKu environment locally:

### 1. Clone the Repository
```bash
git clone https://github.com/rafaelabimanyu/PropertiKu.git
cd PropertiKu
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```
*Configure your database settings in the `.env` file.*

### 4. Database Migration & Seeding
```bash
php artisan migrate:fresh --seed
```
*This will create the structure and populate the platform with ~50-80 realistic premium properties.*

### 5. Compile Assets & Run
```bash
npm run build
php artisan serve
```

---

## 🔑 Demo Accounts

Use these credentials to explore the different roles:

| Role | Email | Password |
| :--- | :--- | :--- |
| **Admin** | `admin@propertiku.ai` | `password` |
| **Agent** | `agent@propertiku.ai` | `password` |
| **Buyer** | `buyer@propertiku.ai` | `password` |

---

## 📂 Project Structure

```text
app/
├── Http/Controllers/      # Core logic (AI, Booking, Leads)
├── Models/                # Data structure (Property, Review, Lead)
├── Policies/              # RBAC & Security rules
resources/
├── views/
│   ├── components/        # Reusable premium UI components
│   ├── dashboard/         # Role-specific dashboard layouts
│   ├── properties/        # Marketplace & Listing views
│   └── errors/            # Custom 404/500 error pages
public/
└── storage/               # Property image repository
```

---

## 🗺️ Roadmap

- [ ] **AI Chatbot**: 24/7 automated property inquiry assistant.
- [ ] **Payment Gateway**: Integrated booking fees and premium listing payments.
- [ ] **Mortgage Calculator**: Advanced financial tools for buyers.
- [ ] **Real-time Chat**: Upgrade to WebSockets (Pusher/Soketi).
- [ ] **SaaS for Agencies**: Multi-agent organization support.

---

## 🎯 Why PropertiKu?

This project was built to demonstrate that enterprise-level real estate platforms can be both **visually stunning** and **operationally robust**. It serves as a showcase for:
1. Advanced Laravel architectural patterns.
2. High-end UI/UX implementation using modern Tailwind CSS techniques.
3. Complex role-based interaction flows in a marketplace environment.

---

## 📄 License

The PropertiKu project is open-sourced software licensed under the [MIT license](LICENSE).

---

## 👨‍💻 Developer

**Rafael Abimanyu**
*Full-Stack AI Developer & UI Enthusiast*

---
*Built with excellence for the future of Real Estate.*
