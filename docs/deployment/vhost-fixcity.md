# Apache VirtualHost - fixcity.local

**Status**: ✅ Active  
**Last Updated**: 2026-03-31  
**Server**: Apache 2.4.64 (Ubuntu)

---

<<<<<<< HEAD
## Configuration Summary
=======
## Configurazione
>>>>>>> origin/dev

| Parametro | Valore |
|-----------|--------|
| **ServerName** | `fixcity.local` |
<<<<<<< HEAD
| **ServerAlias** | `www.fixcity.local` |
| **DocumentRoot** | `/var/www/_bases/base_fixcity_fila5/public_html` |
| **Port** | 80 (HTTP) |
| **mod_rewrite** | ✅ Enabled |
| **mod_headers** | ✅ Enabled |

---

## File Locations

| File | Path |
|------|------|
| **VHost config** | `/etc/apache2/sites-available/fixcity.local.conf` |
| **Enabled symlink** | `/etc/apache2/sites-enabled/fixcity.local.conf` |
| **Project copy** | `docs/deployment/fixcity.local.conf` |
| **Error log** | `/var/log/apache2/fixcity.local-error.log` |
| **Access log** | `/var/log/apache2/fixcity.local-access.log` |
| **/etc/hosts** | `127.0.0.1 fixcity.local www.fixcity.local` |

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
sudo cp docs/deployment/fixcity.local.conf /etc/apache2/sites-available/
```

### 2. Abilitare il sito

```bash
sudo a2ensite fixcity.local.conf
```

### 3. Aggiungere a /etc/hosts

```bash
echo "127.0.0.1 fixcity.local www.fixcity.local" | sudo tee -a /etc/hosts
```

### 4. Verificare e ricaricare Apache

```bash
sudo apache2ctl configtest
sudo systemctl reload apache2
=======
| **DocumentRoot** | `/var/www/_bases/base_fixcity_fila5/public_html` |
| **Port** | 80 |

---

## Document Root

Il `public_html` è la directory esposta. `index.php` bootstrappa Laravel da `../laravel/`.

```
public_html/
├── index.php       # Front controller
├── .htaccess       # Rewrite rules
├── assets/css/js/  # Compiled theme assets
├── modules/        # Module public assets
├── themes/         # Theme compiled assets
└── uploads/        # User uploads
>>>>>>> origin/dev
```

---

<<<<<<< HEAD
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
ls -la /var/www/_bases/base_fixcity_fila5/public_html/
# Deve essere leggibile da www-data
sudo chown -R www-data:www-data /var/www/_bases/base_fixcity_fila5/public_html/
```

### 500 Internal Server Error
```bash
# Controlla error log
tail -f /var/log/apache2/fixcity.local-error.log
```

### mod_rewrite non funziona
```bash
sudo a2enmod rewrite
sudo systemctl restart apache2
```
=======
## Dipendenze Apache

- `mod_rewrite` - URL rewriting (Laravel routing)
- `mod_headers` - Security headers
- `AllowOverride All` - .htaccess processing

---

## File di Configurazione

- **Sistema**: `/etc/apache2/sites-available/fixcity.local.conf`
- **Progetto**: `docs/deployment/fixcity.local.conf`
- **/etc/hosts**: `127.0.0.1 fixcity.local`
>>>>>>> origin/dev

---

## Riferimenti

<<<<<<< HEAD
- [Laravel Deployment](https://laravel.com/docs/deployment)
- [Apache VirtualHost](https://httpd.apache.org/docs/2.4/vhosts/)
- [Rule 013: Design Comuni HTML Match](../../.kilo/rules/013-design-comuni-html-match.md)
=======
- [Deployment Docs](../../docs/deployment/vhost-fixcity.md)
- [Laravel Deployment](https://laravel.com/docs/deployment)
>>>>>>> origin/dev
