# Apache VirtualHost - fixcity.local

**Status**: ✅ Active  
**Last Updated**: 2026-03-31  
**Server**: Apache 2.4.64 (Ubuntu)

---

## Configurazione

| Parametro | Valore |
|-----------|--------|
| **ServerName** | `fixcity.local` |
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
```

---

## Dipendenze Apache

- `mod_rewrite` - URL rewriting (Laravel routing)
- `mod_headers` - Security headers
- `AllowOverride All` - .htaccess processing

---

## File di Configurazione

- **Sistema**: `/etc/apache2/sites-available/fixcity.local.conf`
- **Progetto**: `docs/deployment/fixcity.local.conf`
- **/etc/hosts**: `127.0.0.1 fixcity.local`

---

## Riferimenti

- [Deployment Docs](../../docs/deployment/vhost-fixcity.md)
- [Laravel Deployment](https://laravel.com/docs/deployment)
