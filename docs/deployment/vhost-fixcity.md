<<<<<<< HEAD
<<<<<<< HEAD
# Apache VirtualHost - <nome progetto>.local
=======
# Apache VirtualHost - fixcity.local
>>>>>>> laraxot/dev
=======
# Apache VirtualHost - fixcity.local
>>>>>>> laraxot/dev

**Status**: ✅ Active  
**Last Updated**: 2026-03-31  
**Server**: Apache 2.4.64 (Ubuntu)

---

## Configuration Summary

| Parametro | Valore |
|-----------|--------|
<<<<<<< HEAD
<<<<<<< HEAD
| **ServerName** | `<nome progetto>.local` |
| **ServerAlias** | `www.<nome progetto>.local` |
| **DocumentRoot** | `/var/www/_bases/<repo progetto>/public_html` |
=======
| **ServerName** | `fixcity.local` |
| **ServerAlias** | `www.fixcity.local` |
| **DocumentRoot** | `/var/www/_bases/base_fixcity_fila5/public_html` |
>>>>>>> laraxot/dev
=======
| **ServerName** | `fixcity.local` |
| **ServerAlias** | `www.fixcity.local` |
| **DocumentRoot** | `/var/www/_bases/base_fixcity_fila5/public_html` |
>>>>>>> laraxot/dev
| **Port** | 80 (HTTP) |
| **mod_rewrite** | ✅ Enabled |
| **mod_headers** | ✅ Enabled |

---

## File Locations

| File | Path |
|------|------|
<<<<<<< HEAD
<<<<<<< HEAD
| **VHost config** | `/etc/apache2/sites-available/<nome progetto>.local.conf` |
| **Enabled symlink** | `/etc/apache2/sites-enabled/<nome progetto>.local.conf` |
| **Project copy** | `docs/deployment/<nome progetto>.local.conf` |
| **Error log** | `/var/log/apache2/<nome progetto>.local-error.log` |
| **Access log** | `/var/log/apache2/<nome progetto>.local-access.log` |
| **/etc/hosts** | `127.0.0.1 <nome progetto>.local www.<nome progetto>.local` |
=======
=======
>>>>>>> laraxot/dev
| **VHost config** | `/etc/apache2/sites-available/fixcity.local.conf` |
| **Enabled symlink** | `/etc/apache2/sites-enabled/fixcity.local.conf` |
| **Project copy** | `docs/deployment/fixcity.local.conf` |
| **Error log** | `/var/log/apache2/fixcity.local-error.log` |
| **Access log** | `/var/log/apache2/fixcity.local-access.log` |
| **/etc/hosts** | `127.0.0.1 fixcity.local www.fixcity.local` |
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev

---

## Document Root Structure

Il `public_html` è la directory esposta al web. `index.php` punta a `../laravel/`:

```
public_html/
├── index.php          # Front controller → ../laravel/bootstrap/app.php
├── .htaccess          # Rewrite rules (Laravel standard)
├── assets/            # Compiled theme assets
├── css/
├── js/
├── fonts/
├── images/
├── modules/           # Module public assets
├── themes/            # Theme compiled assets
└── uploads/           # User uploads
```

**Nota**: `public_html` e `laravel/` sono fratelli nella stessa base directory.

---

## Installazione

### 1. Copiare il file di configurazione

```bash
<<<<<<< HEAD
<<<<<<< HEAD
sudo cp docs/deployment/<nome progetto>.local.conf /etc/apache2/sites-available/
=======
sudo cp docs/deployment/fixcity.local.conf /etc/apache2/sites-available/
>>>>>>> laraxot/dev
=======
sudo cp docs/deployment/fixcity.local.conf /etc/apache2/sites-available/
>>>>>>> laraxot/dev
```

### 2. Abilitare il sito

```bash
<<<<<<< HEAD
<<<<<<< HEAD
sudo a2ensite <nome progetto>.local.conf
=======
sudo a2ensite fixcity.local.conf
>>>>>>> laraxot/dev
=======
sudo a2ensite fixcity.local.conf
>>>>>>> laraxot/dev
```

### 3. Aggiungere a /etc/hosts

```bash
<<<<<<< HEAD
<<<<<<< HEAD
echo "127.0.0.1 <nome progetto>.local www.<nome progetto>.local" | sudo tee -a /etc/hosts
=======
echo "127.0.0.1 fixcity.local www.fixcity.local" | sudo tee -a /etc/hosts
>>>>>>> laraxot/dev
=======
echo "127.0.0.1 fixcity.local www.fixcity.local" | sudo tee -a /etc/hosts
>>>>>>> laraxot/dev
```

### 4. Verificare e ricaricare Apache

```bash
sudo apache2ctl configtest
sudo systemctl reload apache2
```

---

## Security Headers

La configurazione include:

- **X-Content-Type-Options**: `nosniff` - Previene MIME type sniffing
- **X-Frame-Options**: `SAMEORIGIN` - Previene clickjacking
- **X-XSS-Protection**: `1; mode=block` - Attiva filtro XSS del browser

---

## .htaccess

Il file `public_html/.htaccess` gestisce il routing Laravel:

- Redirect trailing slashes (301)
- Authorization header passthrough
- Front controller pattern (tutto → `index.php`)
- Disabilita MultiViews e Indexes

---

## Troubleshooting

### 403 Forbidden
```bash
# Verifica permessi
<<<<<<< HEAD
<<<<<<< HEAD
ls -la /var/www/_bases/<repo progetto>/public_html/
# Deve essere leggibile da www-data
sudo chown -R www-data:www-data /var/www/_bases/<repo progetto>/public_html/
=======
ls -la /var/www/_bases/base_fixcity_fila5/public_html/
# Deve essere leggibile da www-data
sudo chown -R www-data:www-data /var/www/_bases/base_fixcity_fila5/public_html/
>>>>>>> laraxot/dev
=======
ls -la /var/www/_bases/base_fixcity_fila5/public_html/
# Deve essere leggibile da www-data
sudo chown -R www-data:www-data /var/www/_bases/base_fixcity_fila5/public_html/
>>>>>>> laraxot/dev
```

### 500 Internal Server Error
```bash
# Controlla error log
<<<<<<< HEAD
<<<<<<< HEAD
tail -f /var/log/apache2/<nome progetto>.local-error.log
=======
tail -f /var/log/apache2/fixcity.local-error.log
>>>>>>> laraxot/dev
=======
tail -f /var/log/apache2/fixcity.local-error.log
>>>>>>> laraxot/dev
```

### mod_rewrite non funziona
```bash
sudo a2enmod rewrite
sudo systemctl restart apache2
```

---

## Riferimenti

- [Laravel Deployment](https://laravel.com/docs/deployment)
- [Apache VirtualHost](https://httpd.apache.org/docs/2.4/vhosts/)
- [Rule 013: Design Comuni HTML Match](../../.kilo/rules/013-design-comuni-html-match.md)
