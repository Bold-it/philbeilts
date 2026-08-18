# Philbeilts Industrial Group — cPanel Production Deployment Guide
**Target Domain:** `https://philbeiltsgroup.com`

---

## Method 1: Deploy via cPanel "Git Version Control" (Recommended)

1. **Log in to cPanel** at `https://philbeiltsgroup.com:2083` (or your host's cPanel URL).
2. Go to **Git™ Version Control** under the *Files* section.
3. Click **Create** and enter:
   - **Clone URL:** `https://github.com/Bold-it/philbeilts.git`
   - **Repository Path:** `philbeilts` (this will place the code in `/home/username/philbeilts`)
   - **Repository Name:** `philbeilts`
4. Click **Create**.

---

## Method 2: Deploy via File Manager or ZIP

If you prefer uploading directly:
1. In cPanel **File Manager**, create a folder named `philbeilts` in your home directory (e.g. `/home/username/philbeilts/`).
2. Upload and extract all files inside `/home/username/philbeilts/`.

---

## ⚙️ Step 2: Set Document Root to `public/`

### Option A: Via cPanel Domains (Best)
1. Go to **Domains** in cPanel.
2. Next to `philbeiltsgroup.com`, click **Manage**.
3. Set the **Document Root** to: `philbeilts/public` (or `/home/username/philbeilts/public`).
4. Click **Update**.

### Option B: If cPanel locks the primary root to `public_html`
1. Move the contents of `philbeilts/public/*` into `public_html/`.
2. Edit `public_html/index.php` and update the bootstrap paths:
   ```php
   require __DIR__.'/../philbeilts/vendor/autoload.php';
   $app = require_once __DIR__.'/../philbeilts/bootstrap/app.php';
   ```
3. Copy `.htaccess` into `public_html/`.

---

## 🗄️ Step 3: Production Environment (`.env`)

In your project folder (`/home/username/philbeilts/`), create or edit `.env`:

```ini
APP_NAME="Philbeilts Industrial Group"
APP_ENV=production
APP_KEY=base64:lb+aX4F83HatQDdxdleNvd5nU4Sn6FoHNGmXNv2EA3M=
APP_DEBUG=false
APP_URL=https://philbeiltsgroup.com

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=sqlite
DB_DATABASE=/home/username/philbeilts/database/database.sqlite

SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync

# Custom Host SMTP Configuration
MAIL_MAILER=smtp
MAIL_HOST=mail.philbeiltsgroup.com
MAIL_PORT=465
MAIL_USERNAME=info@philbeiltsgroup.com
MAIL_PASSWORD=YourCpanelEmailPassword
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="Philbeiltsindustrialgroup@gmail.com"
MAIL_FROM_NAME="Philbeilts Industrial Group"
```

---

## ⚡ Step 4: Run Migrations & Cache (cPanel Terminal)

Open **Terminal** in cPanel and run:

```bash
# Navigate to the project directory
cd ~/philbeilts

# Create the SQLite database file if not present
touch database/database.sqlite
chmod 775 database/database.sqlite
chmod -R 775 storage bootstrap/cache

# Run database migrations and seed default admin
php artisan migrate --force --seed

# Optimize application for lightning-fast production speed
php artisan optimize
```

---

## 🔒 Step 5: Enable Free SSL Certificate

1. In cPanel, navigate to **SSL/TLS Status** or **Let's Encrypt SSL**.
2. Select `philbeiltsgroup.com` and `www.philbeiltsgroup.com`.
3. Click **Run AutoSSL** / **Issue**.
4. The `.htaccess` file will automatically enforce `https://`.

---

## 🔑 Admin Console Credentials

- **URL:** `https://philbeiltsgroup.com/admin/login`
- **Email:** `admin@philbeiltsgroup.com`
- **Password:** `Philbeilts@2026!` *(Change this in the admin panel or via DB after first login)*
