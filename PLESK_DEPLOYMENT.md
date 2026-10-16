# Philbeilts Industrial Group — Plesk Deployment & 503 Fix Guide
**Domain:** `https://philbeiltsgroup.com`  
**PHP Version on Server:** `8.3.35`  
**Repository:** `https://github.com/Bold-it/philbeilts.git`

---

## 🛑 Why the Plesk Preview shows "503 Service Temporarily Unavailable"

A 503 error on a fresh Laravel installation on Plesk is almost always caused by one of these 4 issues:

1. **Document Root is not set to `/public`:**
   By default, Plesk sets the document root to `httpdocs`. Laravel requires the document root to be `httpdocs/public` (or `<repo-folder>/public`). If it's pointing to the root folder, Apache/Nginx cannot serve `index.php` properly and will return a 503 or 403 error.
2. **Maintenance Mode is turned ON:**
   If maintenance mode was toggled on in the Plesk Laravel Toolkit or if `storage/framework/down` exists.
3. **Missing or Inaccessible SQLite Database:**
   The SQLite file `database/database.sqlite` does not exist or lacks write permissions for the web server user.
4. **Folder Permissions on `storage` and `bootstrap/cache`:**
   The web server (`psacln` / `psaadm`) must have write permissions to write session, cache, and log files.

---

## 🚀 Step-by-Step Fix and Deployment in Plesk

### Step 1: Pull the Latest Code from Git
All files and the dynamic Industry CMS have already been committed and pushed to GitHub (`main`).

1. In your Plesk Dashboard, look under **Dev Tools** and click **Git**.
2. Find the `philbeilts` repository (or `philbeiltsgroup.com`).
3. Click **Pull Updates** (Fetch & Rebase or Merge).
   * Plesk will pull the latest commit (`Add dynamic industries CMS, migrations, seeders, and responsive views`).

---

### Step 2: Set the Document Root to `public`
1. Go to the **Hosting & DNS** tab at the top of your Plesk dashboard.
2. Click **Hosting Settings**.
3. Under **Web hosting**, find **Document root**.
4. Set it to:
   ```text
   httpdocs/public
   ```
   *(or if the git repo is in a subfolder `philbeilts`, set to `philbeilts/public`)*
5. Click **OK** or **Apply** at the bottom.

---

### Step 3: Check / Toggle Off Maintenance Mode
1. In your Plesk Dashboard, look under **Dev Tools** and click the **Laravel** icon.
2. Check if **Maintenance mode** is switched ON. If so, toggle it **OFF** (or run `php artisan up`).
3. Alternatively, click **Files** -> navigate into `storage/framework/`. If you see a file named `down`, delete it.

---

### Step 4: Verify `.env` File
In Plesk **Files**, check the `.env` file in the project root:
```ini
APP_NAME="Philbeilts Industrial Group"
APP_ENV=production
APP_KEY=base64:lb+aX4F83HatQDdxdleNvd5nU4Sn6FoHNGmXNv2EA3M=
APP_DEBUG=false
APP_URL=https://philbeiltsgroup.com

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=sqlite
DB_DATABASE=/var/www/vhosts/philbeiltsgroup.com/httpdocs/database/database.sqlite

SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync

MAIL_MAILER=smtp
MAIL_HOST=mail.philbeiltsgroup.com
MAIL_PORT=465
MAIL_USERNAME=info@philbeiltsgroup.com
MAIL_PASSWORD=YourEmailPasswordHere
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="Philbeiltsindustrialgroup@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"
```
*(Note: If `DB_DATABASE` is left blank or set to `database/database.sqlite`, Laravel will default to `database/database.sqlite` relative to the project root).*

---

### Step 5: Ensure Storage & Database Permissions
1. In Plesk **Files**:
   - Check the `database` folder. Ensure `database.sqlite` exists. (If it doesn't exist, create an empty file named `database.sqlite`).
2. Right-click or select `storage`, `bootstrap/cache`, and `database/database.sqlite`.
3. Select **Change Permissions**:
   - Ensure the Plesk application user (`psacln`) has **Read & Write** permissions.

---

### Step 6: Run Migrations and Optimize via Plesk Laravel Toolkit
1. Click the **Laravel** icon in the Plesk Dashboard.
2. Click **Artisan** (or **Run Artisan Script**).
3. Run the following commands:
   * **Migrate & Seed:**
     ```bash
     migrate --force --seed
     ```
   * **Clear and Optimize Cache:**
     ```bash
     optimize:clear
     optimize
     ```

---

## 🔒 Verification & Admin Access
Once completed, visit:
- **Public Website:** `https://philbeiltsgroup.com`
- **Executive Admin Portal:** `https://philbeiltsgroup.com/admin/login`
  - **Email:** `admin@philbeiltsgroup.com`
  - **Password:** `Philbeilts@2026!`
