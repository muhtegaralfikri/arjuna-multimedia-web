# Panduan Deployment - Arjuna Net Website

**Environment:** aaPanel pada Ubuntu 22.04 LTS VPS
**Stack:** Laravel 10.x + PHP 8.3 + MariaDB/MySQL 8.0 + Nginx

---

## 📋 Prasyarat VPS

| Resource | Minimum | Recommended |
|----------|---------|-------------|
| CPU | 2 vCPU | 2+ vCPU |
| RAM | 2 GB | 4 GB |
| Storage | 15 GB SSD | 20+ GB SSD |
| OS | Ubuntu 22.04 LTS | Ubuntu 22.04 LTS |

---

## 🚀 Langkah 1: Setup aaPanel

### 1.1 Install aaPanel

```bash
# SSH ke VPS
ssh root@your-vps-ip

# Download dan install aaPanel
wget -O install.sh https://www.aapanel.com/script/install-ubuntu_6.0_en.sh && sudo bash install.sh aapanel

# Simpan URL dan password yang ditampilkan
```

### 1.2 Install Software via aaPanel

Setelah login ke aaPanel:

1. Buka **App Store**
2. Install software berikut:

| Software | Version | Action |
|----------|---------|--------|
| Nginx | 1.24+ | Install |
| MySQL | 8.0+ | Install (atau MariaDB 10.6+) |
| PHP | 8.3 | Install |
| phpMyAdmin | Latest | Install (optional) |

### 1.3 Install PHP Extensions

Di aaPanel: **Settings > PHP 8.3 > Install Extension**

Install extensions:
- ✅ bcmath
- ✅ ctype
- ✅ curl
- ✅ fileinfo
- ✅ json
- ✅ mbstring
- ✅ openssl
- ✅ pdo
- ✅ pdo_mysql
- ✅ tokenizer
- ✅ xml
- ✅ zip

---

## 📁 Langkah 2: Deploy Application

### 2.1 Clone Repository

```bash
# Via SSH
cd /www/wwwroot
git clone https://github.com/your-username/arjuna-multimedia-web.git
cd arjuna-multimedia-web
```

### 2.2 Setup Environment

```bash
# Copy .env.example ke .env
cp .env.example .env

# Edit .env
nano .env
```

**Konfigurasi .env untuk Production:**

```env
APP_NAME="Arjuna Net"
APP_ENV=production
APP_KEY=base64:your-generated-key
APP_DEBUG=false
APP_URL=https://arjuna-multimedia.com

LOG_CHANNEL=stack
LOG_LEVEL=error

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=arjuna_db
DB_USERNAME=arjuna_user
DB_PASSWORD=your-secure-password

# Session & Cache
BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

### 2.3 Generate Application Key

```bash
php artisan key:generate
```

### 2.4 Setup Database via aaPanel

1. Buka **Databases** di aaPanel
2. Create new database:
   - Database name: `arjuna_db`
   - Username: `arjuna_user`
   - Password: (generate strong password)

### 2.5 Run Migrations & Seed

```bash
# Clear cached config
php artisan config:clear

# Run migrations
php artisan migrate --force

# Seed data
php artisan db:seed --force
```

### 2.6 Setup Storage Link

```bash
php artisan storage:link
```

### 2.7 Set Permissions

```bash
# Set ownership
sudo chown -R www-data:www-data /www/wwwroot/arjuna-multimedia-web

# Set permissions
sudo chmod -R 755 /www/wwwroot/arjuna-multimedia-web
sudo chmod -R 775 /www/wwwroot/arjuna-multimedia-web/storage
sudo chmod -R 775 /www/wwwroot/arjuna-multimedia-web/bootstrap/cache
```

---

## 🌐 Langkah 3: Nginx Configuration

### 3.1 Add Site di aaPanel

1. Buka **Website > Add Site**
2. Pilih **Domain**: `arjuna-multimedia.com`
3. Pilih **Root Directory**: `/www/wwwroot/arjuna-multimedia-web/public`
4. Pilih **PHP**: PHP 8.3
5. Create

### 3.2 Edit Nginx Configuration

Buka **Website > Settings > Config file**, replace dengan:

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name arjuna-multimedia.com www.arjuna-multimedia.com;
    root /www/wwwroot/arjuna-multimedia-web/public;
    index index.php index.html;

    # Logging
    access_log /www/wwwroot/arjuna-multimedia-web/storage/logs/nginx-access.log;
    error_log /www/wwwroot/arjuna-multimedia-web/storage/logs/nginx-error.log;

    # Security headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header X-XSS-Protection "1; mode=block" always;

    # Gzip compression
    gzip on;
    gzip_vary on;
    gzip_min_length 1024;
    gzip_types text/plain text/css text/xml text/javascript application/x-javascript application/xml+rss application/json;

    # Laravel
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    # PHP-FPM
    location ~ \.php$ {
        fastcgi_pass unix:/tmp/php-cgi-83.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # Deny access to hidden files
    location ~ /\. {
        deny all;
        access_log off;
        log_not_found off;
    }

    # Deny access to sensitive files
    location ~ /\.(?:svn|git|hg|bzr|env|gitignore)$ {
        deny all;
    }
}
```

---

## 🔒 Langkah 4: SSL Setup (Let's Encrypt)

### 4.1 Install SSL via aaPanel

1. Buka **Website > arjuna-multimedia.com > SSL**
2. Pilih **Let's Encrypt**
3. Masukkan email: `admin@arjuna-multimedia.com`
4. Check domain:
   - `arjuna-multimedia.com`
   - `www.arjuna-multimedia.com`
5. Click **Apply**

### 4.2 Force HTTPS

Setelah SSL terinstall:

1. Buka **Website > Settings > Config file**
2. Edit redirect ke HTTPS:

```nginx
server {
    listen 80;
    server_name arjuna-multimedia.com www.arjuna-multimedia.com;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    server_name arjuna-multimedia.com www.arjuna-multimedia.com;

    # SSL certificate (auto-generated by aaPanel)
    ssl_certificate /www/server/panel/vhost/cert/arjuna-multimedia.com/fullchain.pem;
    ssl_certificate_key /www/server/panel/vhost/cert/arjuna-multimedia.com/privkey.pem;
    ssl_protocols TLSv1.2 TLSv1.3;
    ssl_ciphers HIGH:!aNULL:!MD5;

    # ... rest of config from above ...
}
```

---

## 🔧 Langkah 5: Production Optimization

### 5.1 Optimize Composer

```bash
# Install production dependencies only
composer install --optimize-autoloader --no-dev
```

### 5.2 Build Assets

```bash
# Install and build frontend assets
npm ci
npm run build
```

### 5.3 Cache Configuration

```bash
# Cache config untuk production
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache
```

### 5.4 Setup Queue Worker (Optional)

```bash
# Install Supervisor untuk queue worker
sudo apt install supervisor

# Create supervisor config
sudo nano /etc/supervisor/conf.d/laravel-worker.conf
```

```ini
[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /www/wwwroot/arjuna-multimedia-web/artisan queue:work --sleep=3 --tries=3
autostart=true
autorestart=true
user=www-data
numprocs=1
redirect_stderr=true
stdout_logfile=/www/wwwroot/arjuna-multimedia-web/storage/logs/worker.log
```

```bash
# Restart supervisor
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start laravel-worker:*
```

---

## ✅ Langkah 6: Verification Checklist

### 6.1 Website Check

- [ ] Homepage loads correctly
- [ ] All pages are accessible (Tentang, Paket, Area, Kontak, FAQ)
- [ ] Forms work properly
- [ ] WhatsApp links are correct
- [ ] Images load properly
- [ ] SSL certificate valid (https://arjuna-multimedia.com)

### 6.2 Admin Panel Check

- [ ] Admin login works (`/admin/login`)
- [ ] Dashboard loads
- [ ] CRUD operations work (Packages, Areas, FAQs)
- [ ] Contact editor works
- [ ] Page editor works
- [ ] Settings work

### 6.3 SEO Check

- [ ] Meta title & description correct
- [ ] Sitemap accessible (`/sitemap.xml`)
- [ ] Robots.txt accessible (`/robots.txt`)
- [ ] Schema markup present

### 6.4 Security Check

- [ ] `APP_DEBUG=false`
- [ ] Database password secure
- [ ] Admin password strong
- [ ] Only HTTPS enabled
- [ ] `/admin` routes protected

---

## 📊 Langkah 7: Monitoring Setup

### 7.1 Setup Log Monitoring

```bash
# Setup log rotation
sudo nano /etc/logrotate.d/laravel
```

```
/www/wwwroot/arjuna-multimedia-web/storage/logs/*.log {
    daily
    missingok
    rotate 14
    compress
    delaycompress
    notifempty
}
```

### 7.2 Uptime Monitoring

Gunakan salah satu:
- UptimeRobot (free)
- StatusCake
- Pingdom

### 7.3 Backup Setup

Via aaPanel **Backup**:
- Daily database backup
- Weekly file backup
- Store to remote storage (Google Drive, S3, etc)

---

## 🔄 Langkah 8: Update Process

### 8.1 Update Application

```bash
# SSH to server
cd /www/wwwroot/arjuna-multimedia-web

# Pull latest code
git pull origin main

# Install dependencies
composer install --optimize-autoloader --no-dev
npm ci && npm run build

# Run migrations
php artisan migrate --force

# Clear and cache
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Restart services if needed
sudo systemctl reload nginx
```

---

## 🆘 Troubleshooting

### Issue 1: 500 Error

```bash
# Check Laravel logs
tail -f storage/logs/laravel.log

# Check Nginx logs
tail -f /www/wwwroot/arjuna-multimedia-web/storage/logs/nginx-error.log
```

### Issue 2: Permission Denied

```bash
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R www-data:www-data .
```

### Issue 3: Database Connection Failed

```bash
# Check MySQL service
sudo systemctl status mysql

# Test connection
mysql -u arjuna_user -p arjuna_db
```

### Issue 4: SSL Not Working

```bash
# Check Nginx config
nginx -t

# Reload Nginx
sudo systemctl reload nginx

# Check port 443
sudo netstat -tulpn | grep :443
```

---

## 📞 Kontak Support

Jika ada masalah:
- **Laravel Docs**: https://laravel.com/docs
- **aaPanel Docs**: https://www.aapanel.com/docs.html
- **Nginx Docs**: https://nginx.org/en/docs/

---

**Dokumen Version:** 1.0
**Last Updated:** 23 Maret 2026
