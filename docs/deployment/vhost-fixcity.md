# Apache VirtualHost - <nome progetto>.local

**Status**: ✅ Active  
**Last Updated**: 2026-03-31  
**Server**: Apache 2.4.64 (Ubuntu)

---

## Configuration Summary

| Parametro | Valore |
|-----------|--------|
| **ServerName** | `<nome progetto>.local` |
| **ServerAlias** | `www.<nome progetto>.local` |
| **DocumentRoot** | `/var/www/_bases/<repo progetto>/public_html` |
| **Port** | 80 (HTTP) |
| **mod_rewrite** | ✅ Enabled |
| **mod_headers** | ✅ Enabled |

---

## File Locations

| File | Path |
|------|------|
| **VHost config** | `/etc/apache2/sites-available/<nome progetto>.local.conf` |
| **Enabled symlink** | `/etc/apache2/sites-enabled/<nome progetto>.local.conf` |
| **Project copy** | `docs/deployment/<nome progetto>.local.conf` |
| **Error log** | `/var/log/apache2/<nome progetto>.local-error.log` |
| **Access log** | `/var/log/apache2/<nome progetto>.local-access.log` |
| **/etc/hosts** | `127.0.0.1 <nome progetto>.local www.<nome progetto>.local` |

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
sudo cp docs/deployment/<nome progetto>.local.conf /etc/apache2/sites-available/
```

### 2. Abilitare il sito

```bash
sudo a2ensite <nome progetto>.local.conf
```

### 3. Aggiungere a /etc/hosts

```bash
echo "127.0.0.1 <nome progetto>.local www.<nome progetto>.local" | sudo tee -a /etc/hosts
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
ls -la /var/www/_bases/<repo progetto>/public_html/
# Deve essere leggibile da www-data
sudo chown -R www-data:www-data /var/www/_bases/<repo progetto>/public_html/
```

### 500 Internal Server Error
```bash
# Controlla error log
tail -f /var/log/apache2/<nome progetto>.local-error.log
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
