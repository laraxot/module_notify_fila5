# 🛠️ Build Scripts Documentation

**Version**: 1.0  
**Created**: 2026-03-30  
**Status**: ✅ Active  
**Owner**: Multi-Agent Team

---

## 📦 Package.json Scripts

**Location**: `laravel/Themes/Sixteen/package.json`

---

## Development Scripts

### `npm run dev`

**Command**: `vite`  
**Purpose**: Start development server with Hot Module Replacement (HMR)

**Usage**:
```bash
cd laravel/Themes/Sixteen
npm run dev
```

**What it does**:
- Starts Vite dev server on `http://localhost:5173`
- Watches `resources/` directory for changes
- Auto-refreshes browser on CSS/JS changes
- Source maps enabled for debugging
- **NOT minified** (readable code)

**When to use**:
- ✅ Developing new features
- ✅ Testing CSS changes
- ✅ Debugging JavaScript
- ✅ Working with Blade components

**Output**:
```
VITE v7.0.7  ready in 1200 ms

➜  Local:   http://localhost:5173/
➜  Network: use --host to expose
➜  press h + enter to show help
```

---

### `npm run build`

**Command**: `vite build`  
**Purpose**: Production build (minified, optimized)

**Usage**:
```bash
cd laravel/Themes/Sixteen
npm run build
```

**What it does**:
- Compiles `resources/css/app.css` → `public/css/app.css`
- Compiles `resources/js/app.js` → `public/js/app.js`
- Minifies CSS (removes whitespace, comments)
- Minifies JS (Terser compression)
- Generates source maps (`.map` files)
- Optimizes assets (images, fonts)
- Tree-shaking (removes unused code)

**Output Files**:
```
public/
├── css/
│   ├── app.css              # Compiled CSS (minified)
│   └── app.css.map          # Source map
└── js/
    ├── app.js               # Compiled JS (minified)
    └── app.js.map           # Source map
```

**When to use**:
- ✅ Before deploying to production
- ✅ After completing a feature
- ✅ Before running `npm run copy`
- ✅ CI/CD pipeline

**Build Stats**:
```
VITE v7.0.7  ready in 3500 ms

✓ built in 3.2s
✓ 45 modules transformed.
✓ built in 350ms

public/css/app.css    245.6 kB │ gzip: 32.4 kB
public/js/app.js       89.2 kB │ gzip: 28.1 kB
```

---

### `npm run build:production`

**Command**: `vite build --mode production`  
**Purpose**: Optimized production build (same as `build` but explicit)

**Usage**:
```bash
npm run build:production
```

**Difference from `build`**:
- Same output, but explicitly sets `NODE_ENV=production`
- More aggressive optimizations
- Smaller file sizes

---

### `npm run build:analyze`

**Command**: `vite build --mode analyze`  
**Purpose**: Generate bundle size report

**Usage**:
```bash
npm run build:analyze
```

**Output**:
- Creates `dist/stats.html`
- Visual breakdown of bundle sizes
- Shows which modules are largest
- Helps identify optimization opportunities

**Open report**:
```bash
npm run bundle-report
# or
npx serve dist
```

---

## Copy Scripts

### `npm run copy`

**Command**: `cp -r ./public/* ../../../public_html/themes/Sixteen/`  
**Purpose**: Copy built assets to public theme directory

**Usage**:
```bash
npm run copy
```

**What it does**:
- Copies `public/css/*` → `public_html/themes/Sixteen/css/`
- Copies `public/js/*` → `public_html/themes/Sixteen/js/`
- Copies `public/images/*` → `public_html/themes/Sixteen/images/`
- Preserves directory structure

**When to use**:
- ✅ After `npm run build`
- ✅ Before testing in browser
- ✅ Before deploying

**Example Flow**:
```bash
npm run build    # Compile assets
npm run copy     # Copy to public_html
# Now test at http://fixcity.local/
```

---

### `npm run copy:watch`

**Command**: `nodemon --watch ./public --exec 'npm run copy'`  
**Purpose**: Auto-copy on file changes

**Usage**:
```bash
npm run copy:watch
```

**What it does**:
- Watches `public/` directory
- Automatically runs `npm run copy` when files change
- No manual intervention needed

**When to use**:
- ✅ Development workflow
- ✅ Testing build output
- ✅ Avoiding manual copy

**Example Session**:
```bash
# Terminal 1: Dev server
npm run dev

# Terminal 2: Copy watcher
npm run copy:watch

# Now: Edit CSS → Auto-compile → Auto-copy → Browser refresh
```

---

### `npm run copy:filament`

**Command**: `cp -r ./public/* ../../../public_html/themes/Sixteen/ && cp -r ./resources/dist/* ../../../public_html/themes/Sixteen/`  
**Purpose**: Copy both public and Filament assets

**Usage**:
```bash
npm run copy:filament
```

**What it does**:
- Copies `public/*` (standard assets)
- Copies `resources/dist/*` (Filament assets)
- Used when Filament components are modified

---

## Filament Scripts

### `npm run build:filament`

**Command**: `vite build --mode filament`  
**Purpose**: Build Filament-specific assets

**Usage**:
```bash
npm run build:filament
```

**When to use**:
- ✅ Modifying Filament components
- ✅ Building admin panel assets
- ✅ Custom Filament themes

---

### `npm run build:filament:dev`

**Command**: `vite build --mode filament --watch`  
**Purpose**: Build Filament assets with watch mode

**Usage**:
```bash
npm run build:filament:dev
```

**What it does**:
- Builds Filament assets
- Watches for changes
- Auto-rebuilds on modification

---

### `npm run filament:dev`

**Command**: `concurrently "npm run dev" "npm run build:filament:dev"`  
**Purpose**: Run both dev servers simultaneously

**Usage**:
```bash
npm run filament:dev
```

**What it does**:
- Starts main dev server
- Starts Filament dev server
- Both run in parallel

---

## Utility Scripts

### `npm run lint`

**Command**: `eslint resources/js/**/*.js`  
**Purpose**: Check JavaScript code quality

**Usage**:
```bash
npm run lint
```

**What it checks**:
- Syntax errors
- Code style violations
- Unused variables
- Missing semicolons

---

### `npm run lint:fix`

**Command**: `eslint resources/js/**/*.js --fix`  
**Purpose**: Auto-fix linting errors

**Usage**:
```bash
npm run lint:fix
```

**What it fixes**:
- Formatting issues
- Missing semicolons
- Trailing whitespace
- Quote style

---

### `npm run format`

**Command**: `prettier --write resources/**/*.{js,css,blade.php}`  
**Purpose**: Format all code files

**Usage**:
```bash
npm run format
```

**What it formats**:
- JavaScript files
- CSS files
- Blade templates

---

### `npm run preview`

**Command**: `vite preview`  
**Purpose**: Preview production build locally

**Usage**:
```bash
npm run build
npm run preview
```

**What it does**:
- Serves `public/` directory
- Simulates production environment
- Accessible at `http://localhost:4173`

---

## Complete Workflows

### Development Workflow

```bash
# 1. Enter theme directory
cd laravel/Themes/Sixteen

# 2. Install dependencies (first time)
npm install

# 3. Start dev server
npm run dev

# 4. Make changes to:
#    - resources/css/app.css
#    - resources/js/app.js
#    - resources/views/**/*.blade.php

# 5. Browser auto-refreshes (HMR)

# 6. When done, build for production
npm run build

# 7. Copy to public_html
npm run copy

# 8. Test at http://fixcity.local/
```

### Production Deployment

```bash
# 1. Enter theme directory
cd laravel/Themes/Sixteen

# 2. Install production dependencies
npm ci --production

# 3. Build optimized assets
npm run build:production

# 4. Copy to public directory
npm run copy

# 5. Clear Laravel cache
cd ../../../laravel
php artisan cache:clear
php artisan view:clear

# 6. Test production site
```

### Filament Development

```bash
# 1. Enter theme directory
cd laravel/Themes/Sixteen

# 2. Start Filament dev workflow
npm run filament:dev

# 3. Make changes to:
#    - Filament components
#    - Admin panel views
#    - Filament CSS

# 4. Auto-rebuilds on change

# 5. When done, build
npm run build:filament
npm run copy:filament
```

---

## Troubleshooting

### Error: `npm run dev` doesn't auto-refresh

**Cause**: HMR not configured properly

**Fix**:
```bash
# Check vite.config.js
cat vite.config.js

# Ensure HMR is enabled
export default defineConfig({
  server: {
    hmr: true
  }
})
```

### Error: `npm run copy` fails

**Cause**: Directory doesn't exist

**Fix**:
```bash
# Create directory
mkdir -p ../../../public_html/themes/Sixteen/

# Run copy again
npm run copy
```

### Error: CSS changes not visible

**Cause**: Browser cache or wrong build

**Fix**:
```bash
# Clear browser cache (hard refresh)
Ctrl+Shift+R (Windows/Linux)
Cmd+Shift+R (Mac)

# Or rebuild
npm run build
npm run copy
```

### Error: JavaScript errors in production

**Cause**: Minification issues

**Fix**:
```bash
# Check source maps
# Open browser DevTools → Sources → app.js.map

# Rebuild with verbose output
npm run build -- --debug
```

---

## File Structure

```
laravel/Themes/Sixteen/
├── resources/
│   ├── css/
│   │   ├── app.css              # Main CSS entry
│   │   └── bootstrap-italia.css
│   ├── js/
│   │   ├── app.js               # Main JS entry
│   │   └── bootstrap-italia.js
│   └── views/
│       └── components/
├── public/
│   ├── css/
│   │   ├── app.css              # Compiled CSS
│   │   └── app.css.map
│   └── js/
│       ├── app.js               # Compiled JS
│       └── app.js.map
├── package.json                 # Scripts defined here
└── vite.config.js              # Build configuration
```

---

## Related Documentation

- [Header Analysis & Fix Plan](./screenshots/HEADER_ANALYSIS_FIX_PLAN.md)
- [Folio + Volt Philosophy](./FOLIO_VOLT_PHILOSOPHY.md)
- [Universal Block Types Taxonomy](./UNIVERSAL_BLOCK_TYPES_TAXONOMY.md)

---

**Last Updated**: 2026-03-30  
**Next Review**: After header fix completion  
**Owner**: Multi-Agent Team
