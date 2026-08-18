# Philbeilts Industrial Group — Project Archive & Chat History
**Date:** August 17–18, 2026  
**Repository:** [https://github.com/Bold-it/philbeilts.git](https://github.com/Bold-it/philbeilts.git)  
**Production Domain:** `https://philbeiltsgroup.com`  
**Local Dev URL:** `http://127.0.0.1:8000`

---

## 📌 1. Project Background & Source Materials
- **Company Name:** PHILBEILTS INDUSTRIAL GROUP OF COMPANIES LTD
- **Headquarters / Office:** Tema Ashaiman, Ghana
- **Incorporated:** 2023
- **Official Contact Numbers:**
  - Phone: `0303 982 238` / `0303 959 290`
  - Mobile: `0208 576 980` / `0549 206 739`
- **Email:** `Philbeiltsindustrialgroup@gmail.com`
- **Vision:** *"To become a leading diversified group company recognized globally for excellence, integrity, and sustainable growth."*
- **Mission:** *"To create long-term value through strategic investments, innovative solutions, and strong partnerships across multiple industries."*
- **Core Values:** Integrity · Excellence · Innovation · Accountability

---

## 🏗️ 2. Core Industry Divisions (9) & Subsidiaries (7)

### 9 Strategic Industries:
1. **Real Estate & Infrastructure** (`/industries/real-estate`)
2. **Banking & Finance** (`/industries/banking`)
3. **Oil, Gas & Energy** (`/industries/oil-gas-energy`)
4. **Mining & Industrial Operations** (`/industries/mining`)
5. **Pharmaceuticals** (`/industries/pharmaceuticals`)
6. **Logistics, Shipping & Transportation** (`/industries/logistics`)
7. **Agriculture & Agro-Processing** (`/industries/agriculture`)
8. **Marine & Heavy Equipment Services** (`/industries/marine`)
9. **Commercial & Social Infrastructure** (`/industries/commercial`)

### 7 Operating Subsidiaries:
1. `01` **Philbeilts Mining** (Mineral exploration & processing)
2. `02` **Philbeilts Construction** (Civil engineering, highways, design-build)
3. `03` **Philbeilts Energy** (Substations civil works & transmission systems)
4. `04` **Philbeilts Maritime** (Ports, harbor management & logistics)
5. `05` **Philbeilts Agro** (Farm production, cold storage & warehousing)
6. `06` **Philbeilts Capital** (Corporate finance, asset management & project funding)
7. `07` **Philbeilts Pharma** (GMP manufacturing & distribution)

---

## ⚙️ 3. Tech Stack & Architecture

- **Framework:** Laravel 11 (PHP 8.3 & 8.4 compatible)
- **Frontend:** Laravel Blade + Custom Vanilla CSS Design System (no heavy runtime overhead)
- **Database:** SQLite (zero-config, high-performance, single-file DB at `database/database.sqlite`)
- **Email System:** Laravel Mailables with custom SMTP host support (`mail.philbeiltsgroup.com`)
- **Admin Panel:** Custom bespoke executive interface at `/admin`

---

## 🔒 4. Admin Portal Access

- **Login URL:** `/admin/login` (or `https://philbeiltsgroup.com/admin/login`)
- **Default Email:** `admin@philbeiltsgroup.com`
- **Default Password:** `Philbeilts@2026!`

### Admin Capabilities:
- **Dashboard:** Unread inquiry counters, live post statistics, active job vacancies.
- **Blog / News CMS (`/admin/posts`):** Full CRUD for company news, SEO slugs, publication statuses.
- **Inbox (`/admin/messages`):** Real-time inbox for website inquiries with direct email reply.
- **Careers (`/admin/jobs`):** Post and toggle job vacancies with auto-fill application links.
- **Settings (`/admin/settings`):** SMTP email testing tool and 1-click cache clearing.

---

## 📧 5. Email Flow & Configuration

When a visitor submits the contact form at `/contact`:
1. Submission is stored in `contact_messages` table (accessible in `/admin/messages`).
2. An HTML notification is dispatched to `Philbeiltsindustrialgroup@gmail.com`.
3. An automatic branded confirmation email is sent to the customer with their tracking reference `#MSG-0000X`.

---

## 🖥️ 6. Useful Local & Production Commands

### Run Locally:
```bash
cd D:\PHILBEILTS\philbeilts-site
php artisan serve
```

### Run Migrations & Seed Admin:
```bash
php artisan migrate --force --seed
```

### Optimize for Production:
```bash
php artisan optimize
```

### Clear Caches:
```bash
php artisan optimize:clear
```

---

## 🌐 7. Plesk / cPanel Deployment Reference

- **Git Repository URL:** `https://github.com/Bold-it/philbeilts.git` (or `git@github.com:Bold-it/philbeilts.git`)
- **Document Root:** Must point to `philbeilts/public` (or `public_html/public`)
- **PHP Version:** PHP 8.3 or PHP 8.4
- **Dependencies:** Locked to Symfony 7.4 (guarantees 100% compatibility across PHP 8.2, 8.3, and 8.4).

---

## 💬 8. Antigravity IDE Memory & Continuity
- To persist instructions and learnings permanently across new sessions in this IDE, use the `/learn` slash command in chat.
- This document is saved locally in `d:\PHILBEILTS\philbeilts-site\PROJECT_ARCHIVE_AND_CHAT_LOG.md` and committed to your Git repository for permanent access anytime.
