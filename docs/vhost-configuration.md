# 🌐 VHost Configuration Guide

> **Last Updated**: 2026-03-31  
> **Status**: ✅ Active  
> **Environment**: Local Development

---

## 📋 Overview

<<<<<<< HEAD
This guide covers the Apache VirtualHost configuration for Notify local development environments.

### Primary Domain

- **Domain**: `laraxot.local`
- **Alias**: `www.laraxot.local`
=======
This guide covers the Apache VirtualHost configuration for FixCity local development environments.

### Primary Domain

- **Domain**: `fixcity.local`
- **Alias**: `www.fixcity.local`
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
- **Document Root**: `public_html/`
- **Port**: 80 (HTTP)

---

## 📁 Configuration Files

### Master Configuration

<<<<<<< HEAD
**Location**: `laravel/config/vhost/laraxot.local.conf`
=======
**Location**: `laravel/config/vhost/fixcity.local.conf`
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)

This is the **Single Source of Truth (SSOT)** for vhost configuration.

### Related Documentation

- **Project Docs**: [`docs/project/vhost-configuration.md`](../../../../docs/project/vhost-configuration.md)
- **Themes Docs**: [`../../Themes/docs/vhost-configuration.md`](../../Themes/docs/vhost-configuration.md)

---

## 🚀 Setup Instructions

### 1. Enable VirtualHost

```bash
# Copy to Apache sites-available
<<<<<<< HEAD
sudo cp laravel/config/vhost/laraxot.local.conf /etc/apache2/sites-available/

# Enable site
sudo a2ensite laraxot.local.conf
=======
sudo cp laravel/config/vhost/fixcity.local.conf /etc/apache2/sites-available/

# Enable site
sudo a2ensite fixcity.local.conf
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)

# Reload Apache
sudo systemctl reload apache2
```

### 2. Update Hosts File

Edit `/etc/hosts`:

```bash
<<<<<<< HEAD
127.0.0.1    laraxot.local
127.0.0.1    www.laraxot.local
=======
127.0.0.1    fixcity.local
127.0.0.1    www.fixcity.local
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

### 3. Verify

```bash
# Test configuration
sudo apache2ctl configtest

# Check vhost is enabled
<<<<<<< HEAD
apache2ctl -S | grep laraxot
=======
apache2ctl -S | grep fixcity
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

---

## 🏗️ Architecture

### Directory Structure

```
<<<<<<< HEAD
base_ptvx_fila5/
=======
base_fixcity_fila5/
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
├── public_html/              ← Document Root
│   ├── index.php            ← Entry point
│   └── .htaccess            ← URL rewriting
├── laravel/                  ← Application code
│   ├── config/
│   │   └── vhost/
<<<<<<< HEAD
│   │       └── laraxot.local.conf  ← VHost config
=======
│   │       └── fixcity.local.conf  ← VHost config
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
│   ├── Modules/             ← All modules
│   └── Themes/              ← All themes
└── docs/
    └── project/
        └── vhost-configuration.md  ← Full documentation
```

### Request Flow

```
<<<<<<< HEAD
Browser → Apache vhost (laraxot.local:80)
=======
Browser → Apache vhost (fixcity.local:80)
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
    ↓
DocumentRoot (public_html/)
    ↓
.htaccess (URL rewriting)
    ↓
index.php (Laravel entry point)
    ↓
laravel/ (application code)
    ↓
Modules/ + Themes/
```

---

## ⚙️ Configuration Highlights

### Key Directives

```apache
<VirtualHost *:80>
<<<<<<< HEAD
    ServerName laraxot.local
    ServerAlias www.laraxot.local
    DocumentRoot /var/www/_bases/base_ptvx_fila5/public_html
    
    <Directory /var/www/_bases/base_ptvx_fila5/public_html>
=======
    ServerName fixcity.local
    ServerAlias www.fixcity.local
    DocumentRoot /var/www/_bases/base_fixcity_fila5/public_html
    
    <Directory /var/www/_bases/base_fixcity_fila5/public_html>
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
        Options -Indexes +FollowSymLinks +MultiViews
        AllowOverride All
        Require all granted
        
        # Laravel routing
        <IfModule mod_rewrite.c>
            RewriteEngine On
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            RewriteRule ^(.*)$ index.php [L]
        </IfModule>
    </Directory>
    
<<<<<<< HEAD
    ErrorLog ${APACHE_LOG_DIR}/app_local_error.log
    CustomLog ${APACHE_LOG_DIR}/app_local_access.log combined
=======
    ErrorLog ${APACHE_LOG_DIR}/fixcity_local_error.log
    CustomLog ${APACHE_LOG_DIR}/fixcity_local_access.log combined
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
</VirtualHost>
```

### Important Notes

1. **Document Root MUST be `public_html/`** - Never point to `laravel/` directly
2. **AllowOverride All** - Required for Laravel `.htaccess`
3. **mod_rewrite** - Essential for Laravel routing
4. **Directory permissions** - Must be readable by Apache

---

## 🔧 Troubleshooting

### Common Issues

| Issue | Solution |
|-------|----------|
| 403 Forbidden | Check directory permissions |
| 500 Error | Check Laravel logs |
| Site not loading | Verify `/etc/hosts` entry |
| mod_rewrite not working | `sudo a2enmod rewrite` |

### Logs

```bash
# Apache error log
<<<<<<< HEAD
tail -f /var/log/apache2/app_local_error.log
=======
tail -f /var/log/apache2/fixcity_local_error.log
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)

# Laravel log
tail -f laravel/storage/logs/laravel.log
```

---

## 📊 Module Integration

### All Modules Use Same VHost

Every module in `laravel/Modules/` is accessible through the same vhost:

<<<<<<< HEAD
- **Xot**: `laraxot.local/admin` (Filament)
- **User**: `laraxot.local/login`, `laraxot.local/register`
- **Cms**: `laraxot.local/pages/*` (CMS pages)
- **Blog**: `laraxot.local/blog/*`
- **App**: `laraxot.local/tickets/*`
=======
- **Xot**: `fixcity.local/admin` (Filament)
- **User**: `fixcity.local/login`, `fixcity.local/register`
- **Cms**: `fixcity.local/pages/*` (CMS pages)
- **Blog**: `fixcity.local/blog/*`
- **Fixcity**: `fixcity.local/tickets/*`
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
- **All others**: Via their respective routes

### Theme Selection

Active theme is configured in `laravel/config/localhost/xra.php`:

```php
'pub_theme' => 'sixteen',  // or 'twentyone'
```

Theme assets are served from:
- `public_html/themes/{theme-name}/`

---

## 🔒 Security Notes

### Development Only

⚠️ **WARNING**: This configuration is for **LOCAL DEVELOPMENT ONLY**.

For production:
1. Use HTTPS (SSL/TLS)
2. Add security headers
3. Restrict access by IP
4. Use environment-specific configs

### Security Headers (Optional)

```apache
<IfModule mod_headers.c>
    Header set X-Content-Type-Options "nosniff"
    Header set X-Frame-Options "SAMEORIGIN"
    Header set X-XSS-Protection "1; mode=block"
</IfModule>
```

---

## 📝 Maintenance

### Update VHost Config

<<<<<<< HEAD
1. Edit `laravel/config/vhost/laraxot.local.conf`
2. Copy to Apache: `sudo cp laravel/config/vhost/laraxot.local.conf /etc/apache2/sites-available/`
=======
1. Edit `laravel/config/vhost/fixcity.local.conf`
2. Copy to Apache: `sudo cp laravel/config/vhost/fixcity.local.conf /etc/apache2/sites-available/`
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
3. Reload: `sudo systemctl reload apache2`

### Backup

```bash
<<<<<<< HEAD
sudo cp /etc/apache2/sites-available/laraxot.local.conf \
        /etc/apache2/sites-available/laraxot.local.conf.backup.$(date +%Y%m%d)
=======
sudo cp /etc/apache2/sites-available/fixcity.local.conf \
        /etc/apache2/sites-available/fixcity.local.conf.backup.$(date +%Y%m%d)
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

---

## 🧪 Testing

### Verify Configuration

```bash
# List all vhosts
apache2ctl -S

# Test syntax
apache2ctl configtest

# Check enabled sites
<<<<<<< HEAD
ls -la /etc/apache2/sites-enabled/ | grep laraxot
=======
ls -la /etc/apache2/sites-enabled/ | grep fixcity
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

### Test Domain

```bash
# Ping test
<<<<<<< HEAD
ping laraxot.local

# Curl test
curl -I http://laraxot.local
=======
ping fixcity.local

# Curl test
curl -I http://fixcity.local
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

---

## 🔗 Related Documentation

### Internal

- [Project VHost Docs](../../../../docs/project/vhost-configuration.md) - Complete guide
- [Themes VHost Docs](../../Themes/docs/vhost-configuration.md) - Theme-specific
- [Deployment Guide](../../../../docs/deployment/README.md)
- [Environment Setup](../../../../docs/project/environment-setup.md)

### External

- [Apache VirtualHost Docs](https://httpd.apache.org/docs/2.4/vhosts/)
- [Laravel Deployment](https://laravel.com/docs/deployment)
- [mod_rewrite Guide](https://httpd.apache.org/docs/current/mod/mod_rewrite.html)

---

## 📞 Support

- **Slack**: #devops
- **GitHub**: Issue with label `infrastructure`
- **Team**: DevOps Team

---

**Maintainer**: DevOps Team  
**Last Review**: 2026-03-31  
**Next Review**: 2026-06-30  
**Status**: ✅ Active
