<<<<<<< HEAD
# 🌐 Notify Local VHost Configuration
=======
# 🌐 FixCity Local VHost Configuration
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)

> **Last Updated**: 2026-03-31
> **Status**: ✅ Installato e Attivo
> **Environment**: Local Development (WSL2)
> **Server**: Apache 2.4.64 (Ubuntu)

---

## 🎯 Overview

<<<<<<< HEAD
This document describes the Apache VirtualHost configuration for local development of the Notify platform using the domain `laraxot.local`.

### Key Points

- **Domain**: `laraxot.local`
- **Document Root**: `/var/www/_bases/base_ptvx_fila5/public_html`
- **Config sorgente**: `laravel/config/vhost/laraxot.local.conf`
- **Config Apache**: `/etc/apache2/sites-available/laraxot.local.conf` ✅ abilitato
- **Hosts (Windows)**: `172.27.106.41 laraxot.local` in `C:\Windows\System32\drivers\etc\hosts`
=======
This document describes the Apache VirtualHost configuration for local development of the FixCity platform using the domain `fixcity.local`.

### Key Points

- **Domain**: `fixcity.local`
- **Document Root**: `/var/www/_bases/base_fixcity_fila5/public_html`
- **Config sorgente**: `laravel/config/vhost/fixcity.local.conf`
- **Config Apache**: `/etc/apache2/sites-available/fixcity.local.conf` ✅ abilitato
- **Hosts (Windows)**: `172.27.106.41 fixcity.local` in `C:\Windows\System32\drivers\etc\hosts`
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
- **Port**: 80 (HTTP)

---

## 📁 File Locations

```
<<<<<<< HEAD
/var/www/_bases/base_ptvx_fila5/
├── laravel/
│   └── config/
│       └── vhost/
│           └── laraxot.local.conf    # Apache vhost configuration
=======
/var/www/_bases/base_fixcity_fila5/
├── laravel/
│   └── config/
│       └── vhost/
│           └── fixcity.local.conf    # Apache vhost configuration
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
└── public_html/                      # Document root (web accessible)
    └── index.php                     # Laravel entry point
```

---

## 🚀 Quick Start

### 1. Enable the VirtualHost

```bash
# Copy configuration to Apache sites-available
<<<<<<< HEAD
sudo cp /var/www/_bases/base_ptvx_fila5/laravel/config/vhost/laraxot.local.conf /etc/apache2/sites-available/laraxot.local.conf

# Enable the site
sudo a2ensite laraxot.local
=======
sudo cp /var/www/_bases/base_fixcity_fila5/laravel/config/vhost/fixcity.local.conf /etc/apache2/sites-available/fixcity.local.conf

# Enable the site
sudo a2ensite fixcity.local
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)

# Reload Apache
sudo systemctl reload apache2
```

> **Stato attuale**: ✅ Già installato e attivo (2026-03-31)

### 2. Hosts File (WSL2)

In ambiente WSL2 il file `/etc/hosts` è auto-generato. Aggiungere l'entry nel file Windows:

`C:\Windows\System32\drivers\etc\hosts`

```
<<<<<<< HEAD
172.27.106.41 laraxot.local
=======
172.27.106.41 fixcity.local
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

> **Stato attuale**: ✅ Già presente nel file hosts Windows

### 3. Verify Configuration

```bash
# Test Apache configuration
sudo apache2ctl configtest

# Check if vhost is enabled
<<<<<<< HEAD
apache2ctl -S | grep laraxot
=======
apache2ctl -S | grep fixcity
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

### 4. Access the Application

Open your browser and navigate to:
<<<<<<< HEAD
- `http://laraxot.local`
- `http://www.laraxot.local`
=======
- `http://fixcity.local`
- `http://www.fixcity.local`
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)

---

## ⚙️ Configuration Details

### VirtualHost Structure

```apache
<VirtualHost *:80>
    # Server Configuration
<<<<<<< HEAD
    ServerName laraxot.local
    ServerAlias www.laraxot.local
    
    # Document Root - MUST point to public_html
    DocumentRoot /var/www/_bases/base_ptvx_fila5/public_html
    
    # Directory Permissions
    <Directory /var/www/_bases/base_ptvx_fila5>
=======
    ServerName fixcity.local
    ServerAlias www.fixcity.local
    
    # Document Root - MUST point to public_html
    DocumentRoot /var/www/_bases/base_fixcity_fila5/public_html
    
    # Directory Permissions
    <Directory /var/www/_bases/base_fixcity_fila5>
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    
<<<<<<< HEAD
    <Directory /var/www/_bases/base_ptvx_fila5/public_html>
=======
    <Directory /var/www/_bases/base_fixcity_fila5/public_html>
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
        Options -Indexes +FollowSymLinks +MultiViews
        AllowOverride All
        Require all granted
        
        # Laravel .htaccess rules
        <IfModule mod_rewrite.c>
            RewriteEngine On
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            RewriteRule ^(.*)$ index.php [L]
        </IfModule>
    </Directory>
    
    # Logging Configuration
<<<<<<< HEAD
    ErrorLog ${APACHE_LOG_DIR}/app_local_error.log
    CustomLog ${APACHE_LOG_DIR}/app_local_access.log combined
=======
    ErrorLog ${APACHE_LOG_DIR}/fixcity_local_error.log
    CustomLog ${APACHE_LOG_DIR}/fixcity_local_access.log combined
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
</VirtualHost>
```

### Key Directives

| Directive | Purpose | Value |
|-----------|---------|-------|
<<<<<<< HEAD
| `ServerName` | Primary domain | `laraxot.local` |
| `ServerAlias` | Additional domains | `www.laraxot.local` |
=======
| `ServerName` | Primary domain | `fixcity.local` |
| `ServerAlias` | Additional domains | `www.fixcity.local` |
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
| `DocumentRoot` | Web root directory | `public_html/` |
| `AllowOverride All` | Enable .htaccess | Required for Laravel |
| `mod_rewrite` | URL rewriting | Laravel routing |

---

## 🔧 Troubleshooting

### Issue: Site Not Loading

**Check Apache Error Log:**
```bash
<<<<<<< HEAD
sudo tail -f /var/log/apache2/app_local_error.log
=======
sudo tail -f /var/log/apache2/fixcity_local_error.log
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

**Verify Permissions:**
```bash
<<<<<<< HEAD
sudo chown -R www-data:www-data /var/www/_bases/base_ptvx_fila5/public_html
sudo chmod -R 755 /var/www/_bases/base_ptvx_fila5/public_html
=======
sudo chown -R www-data:www-data /var/www/_bases/base_fixcity_fila5/public_html
sudo chmod -R 755 /var/www/_bases/base_fixcity_fila5/public_html
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

### Issue: 403 Forbidden

**Solution:**
```bash
# Check directory permissions
<<<<<<< HEAD
ls -la /var/www/_bases/base_ptvx_fila5/public_html

# Fix permissions if needed
sudo chmod -R 755 /var/www/_bases/base_ptvx_fila5
=======
ls -la /var/www/_bases/base_fixcity_fila5/public_html

# Fix permissions if needed
sudo chmod -R 755 /var/www/_bases/base_fixcity_fila5
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

### Issue: 500 Internal Server Error

**Check Laravel Logs:**
```bash
<<<<<<< HEAD
tail -f /var/www/_bases/base_ptvx_fila5/laravel/storage/logs/laravel.log
=======
tail -f /var/www/_bases/base_fixcity_fila5/laravel/storage/logs/laravel.log
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

**Verify .env Configuration:**
```bash
<<<<<<< HEAD
cd /var/www/_bases/base_ptvx_fila5/laravel
cat .env | grep APP_URL
# Should be: APP_URL=http://laraxot.local
=======
cd /var/www/_bases/base_fixcity_fila5/laravel
cat .env | grep APP_URL
# Should be: APP_URL=http://fixcity.local
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

### Issue: mod_rewrite Not Working

**Enable mod_rewrite:**
```bash
sudo a2enmod rewrite
sudo systemctl restart apache2
```

---

## 📋 Prerequisites

### Apache Modules Required

```bash
# Enable required modules
sudo a2enmod rewrite
sudo a2enmod ssl
sudo a2enmod headers
sudo systemctl restart apache2
```

### PHP Requirements

- PHP 8.1+
- PHP extensions:
  - `php-mysql` or `php-sqlite`
  - `php-mbstring`
  - `php-xml`
  - `php-curl`
  - `php-zip`
  - `php-gd`

---

## 🔒 Security Considerations

### Development Environment

⚠️ **WARNING**: This configuration is for **LOCAL DEVELOPMENT ONLY**.

For production environments:
1. Use HTTPS (SSL/TLS)
2. Disable directory indexing
3. Add security headers
4. Restrict access by IP
5. Use environment-specific configurations

### Security Headers (Optional for Development)

```apache
<IfModule mod_headers.c>
    Header set X-Content-Type-Options "nosniff"
    Header set X-Frame-Options "SAMEORIGIN"
    Header set X-XSS-Protection "1; mode=block"
    Header set Referrer-Policy "strict-origin-when-cross-origin"
</IfModule>
```

---

## 📊 Architecture

### Request Flow

```
Browser Request
    ↓
<<<<<<< HEAD
Apache VirtualHost (laraxot.local:80)
=======
Apache VirtualHost (fixcity.local:80)
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
    ↓
DocumentRoot (public_html/)
    ↓
.htaccess (URL Rewriting)
    ↓
index.php (Laravel Entry Point)
    ↓
Laravel Application (laravel/)
    ↓
Response
```

### Directory Structure

```
<<<<<<< HEAD
base_ptvx_fila5/
=======
base_fixcity_fila5/
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
├── public_html/              ← Document Root (web accessible)
│   ├── index.php            ← Entry point
│   ├── .htaccess            ← URL rewriting rules
│   ├── robots.txt
│   └── favicon.ico
├── laravel/                  ← Application code (NOT web accessible)
│   ├── app/
│   ├── config/
│   ├── database/
│   ├── Modules/
│   ├── Themes/
│   └── vendor/
└── docs/
    └── project/
        └── vhost-configuration.md  ← This file
```

---

## 🔄 Related Configurations

### Alternative: Nginx

For Nginx users, see: `docs/project/vhost-nginx-configuration.md`

### Alternative: PHP Built-in Server

For quick testing:
```bash
<<<<<<< HEAD
cd /var/www/_bases/base_ptvx_fila5/public_html
=======
cd /var/www/_bases/base_fixcity_fila5/public_html
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
php -S localhost:8000
```

### Docker Development

For Docker-based development, see: `docker/docker-compose.yml`

---

## 📝 Maintenance

### Update VHost Configuration

<<<<<<< HEAD
1. Edit `laravel/config/vhost/laraxot.local.conf`
2. Copy to Apache: `sudo cp laravel/config/vhost/laraxot.local.conf /etc/apache2/sites-available/`
=======
1. Edit `laravel/config/vhost/fixcity.local.conf`
2. Copy to Apache: `sudo cp laravel/config/vhost/fixcity.local.conf /etc/apache2/sites-available/`
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
3. Reload Apache: `sudo systemctl reload apache2`

### Backup Configuration

```bash
# Backup current vhost
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

### Verify VirtualHost

```bash
# List all virtual hosts
apache2ctl -S

# Test configuration syntax
apache2ctl configtest

# Check if site is enabled
<<<<<<< HEAD
ls -la /etc/apache2/sites-enabled/ | grep laraxot
=======
ls -la /etc/apache2/sites-enabled/ | grep fixcity
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

### Test Domain Resolution

```bash
# Check hosts file entry
<<<<<<< HEAD
ping laraxot.local
# Should resolve to 127.0.0.1

# Or use getent
getent hosts laraxot.local
=======
ping fixcity.local
# Should resolve to 127.0.0.1

# Or use getent
getent hosts fixcity.local
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

### Test Application

```bash
# Test with curl
<<<<<<< HEAD
curl -I http://laraxot.local
=======
curl -I http://fixcity.local
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)

# Should return HTTP/1.1 200 OK
```

---

## 🔗 References

### Internal Documentation

- [Deployment Guide](deployment-guide.md)
- [Environment Configuration](environment-setup.md)
- [Apache Configuration Best Practices](apache-best-practices.md)

### External Resources

- [Apache VirtualHost Documentation](https://httpd.apache.org/docs/2.4/vhosts/)
- [Laravel Deployment](https://laravel.com/docs/deployment)
- [Apache mod_rewrite](https://httpd.apache.org/docs/current/mod/mod_rewrite.html)

---

## 📞 Support

### Getting Help

- **Slack**: #devops channel
- **GitHub**: Create issue with label `infrastructure`
- **Documentation**: Check `docs/project/` for related guides

### Common Issues

| Issue | Solution |
|-------|----------|
| 403 Forbidden | Check directory permissions |
| 500 Error | Check Laravel logs |
| Site not loading | Verify hosts file entry |
| mod_rewrite not working | Enable mod_rewrite module |

---

**Maintainer**: DevOps Team  
**Last Review**: 2026-03-31  
**Next Review**: 2026-06-30  
**Status**: ✅ Production Ready (for local development)
