# Deployment Checklist - Arjuna Net

**Date:** _____________
**Deployer:** _____________
**Environment:** Production

---

## Pre-Deployment Checklist

### Code & Configuration
- [ ] All code committed to git
- [ ] `.env.production.example` is up to date
- [ ] `.env` file prepared with production values
- [ ] `APP_DEBUG=false` in production `.env`
- [ ] `APP_ENV=production` in production `.env`
- [ ] `APP_KEY` generated (php artisan key:generate)
- [ ] Database credentials confirmed
- [ ] Admin credentials documented

### Backup
- [ ] Current production database backed up (if upgrading)
- [ ] Current production files backed up (if upgrading)
- [ ] Rollback plan documented

---

## aaPanel Setup

### Software Installation
- [ ] aaPanel installed
- [ ] Nginx installed
- [ ] PHP 8.3 installed
- [ ] MySQL 8.0+ or MariaDB 10.6+ installed
- [ ] PHP extensions installed:
  - [ ] bcmath
  - [ ] ctype
  - [ ] curl
  - [ ] fileinfo
  - [ ] json
  - [ ] mbstring
  - [ ] openssl
  - [ ] pdo
  - [ ] pdo_mysql
  - [ ] tokenizer
  - [ ] xml
  - [ ] zip

### Database Setup
- [ ] Database created: `arjuna_db`
- [ ] Database user created: `arjuna_user`
- [ ] Database permissions granted
- [ ] Database credentials stored securely

---

## Deployment Steps

### Files
- [ ] Repository cloned to `/www/wwwroot/arjuna-multimedia-web`
- [ ] `.env` file configured
- [ ] `composer install --optimize-autoloader --no-dev` run
- [ ] `npm ci && npm run build` run
- [ ] `php artisan key:generate` run
- [ ] `php artisan storage:link` run
- [ ] File permissions set:
  - [ ] `chmod -R 755` for app root
  - [ ] `chmod -R 775` for storage/
  - [ ] `chmod -R 775` for bootstrap/cache/

### Database
- [ ] `php artisan migrate --force` run
- [ ] `php artisan db:seed --force` run
- [ ] Tables verified:
  - [ ] admin_users
  - [ ] packages
  - [ ] service_areas
  - [ ] faqs
  - [ ] contacts
  - [ ] pages
  - [ ] form_submissions
  - [ ] site_settings
  - [ ] activity_logs

### Caching
- [ ] `php artisan config:cache` run
- [ ] `php artisan route:cache` run
- [ ] `php artisan view:cache` run

---

## Nginx Configuration

- [ ] Site added in aaPanel
- [ ] Domain configured: `arjuna-multimedia.com`
- [ ] Root directory: `/www/wwwroot/arjuna-multimedia-web/public`
- [ ] PHP version: 8.3
- [ ] Custom config applied (see DEPLOYMENT.md)
- [ ] Config tested: `nginx -t`
- [ ] Nginx reloaded

---

## SSL Certificate

- [ ] Let's Encrypt applied via aaPanel
- [ ] Certificate valid for:
  - [ ] arjuna-multimedia.com
  - [ ] www.arjuna-multimedia.com
- [ ] Auto-renewal enabled
- [ ] HTTP to HTTPS redirect enabled
- [ ] SSL rating checked (SSL Labs)

---

## Post-Deployment Verification

### Website Functionality
- [ ] Homepage loads (https://arjuna-multimedia.com)
- [ ] All pages accessible:
  - [ ] /tentang
  - [ ] /paket
  - [ ] /area
  - [ ] /kontak
  - [ ] /faq
- [ ] Form submission works
- [ ] WhatsApp links functional
- [ ] All images load
- [ ] No console errors

### Admin Panel
- [ ] Admin login works (/admin/login)
- [ ] Dashboard loads
- [ ] CRUD operations tested:
  - [ ] Packages - Create, Read, Update, Delete
  - [ ] Areas - Create, Read, Update, Delete
  - [ ] FAQs - Create, Read, Update, Delete
- [ ] Contact editor works
- [ ] Page editor works
- [ ] Settings page works
- [ ] Form submissions view works
- [ ] Logout works

### SEO Verification
- [ ] Meta title present on all pages
- [ ] Meta description present on all pages
- [ ] Sitemap accessible: `/sitemap.xml`
- [ ] Robots.txt accessible: `/robots.txt`
- [ ] Schema markup present (LocalBusiness)
- [ ] OG tags present

### Performance
- [ ] Page load time < 3 seconds
- [ ] Mobile responsive verified
- [ ] Images optimized
- [ ] Gzip compression enabled
- [ ] Browser caching enabled

### Security
- [ ] `APP_DEBUG=false` confirmed
- [ ] Admin password strong
- [ ] Database password strong
- [ ] HTTPS enforced
- [ ] Security headers present:
  - [ ] X-Frame-Options
  - [ ] X-Content-Type-Options
  - [ ] X-XSS-Protection

---

## Monitoring & Logging

- [ ] Application logging working
- [ ] Nginx access/error logs working
- [ ] Log rotation configured
- [ ] Uptime monitoring setup
- [ ] Backup schedule configured:
  - [ ] Database backup (daily)
  - [ ] File backup (weekly)

---

## Documentation & Handover

- [ ] Admin credentials documented
- [ ] Database credentials documented
- [ ] aaPanel credentials documented
- [ ] Server login credentials documented
- [ ] Admin user training completed
- [ ] Update process documented

---

## Go-Live

- [ ] DNS configured (A record)
- [ ] DNS propagated
- [ ] Domain accessible
- [ ] SSL certificate active
- [ ] All final checks passed
- [ ] Stakeholder notified
- [ ] Website live!

---

## Post-Live

### First 24 Hours
- [ ] Monitor error logs
- [ ] Check form submissions
- [ ] Verify backups running
- [ ] Test all critical functions

### First Week
- [ ] Review performance metrics
- [ ] Check uptime
- [ ] Verify SEO indexing
- [ ] Gather user feedback

---

## Notes

```
Any issues encountered during deployment:


Resolution:


```

---

**Checked by:** _____________
**Approved by:** _____________
**Date:** _____________

---

*This checklist should be completed for every deployment to production.*
