# CSS/JS Phase - Status Report

**Date**: 2026-04-09
**Page**: segnalazione-01-privacy

## HTML Parity Status

| Metric | Value |
|---|---|
| Reference structure lines | 850 |
| Local structure lines | 852 |
| Lines only in reference | 161 |
| Lines only in local | 163 |
| **Match %** | **~81%** |

## Missing Classes (Reference has, Local doesn't)

None - all reference classes are present in local HTML.

## Extra Classes (Local has, Reference doesn't)

- `cms-view-wrapper`
- `content`
- `page-content`
- `segnalazione-privacy-page`

These are wrapper classes added by our CMS system and don't affect visual parity.

## CSS Issues to Fix

### 1. Font Issues
- ✅ `.text-paragraph`: Fixed from Lora → Titillium Web
- ✅ Color fixed to `#5C6F82` (Bootstrap Italia standard)
- ✅ Line-height fixed to `1.6`

### 2. Stepper Issues
- Reference uses simple `<li>` with text content
- Local has same structure but may need CSS alignment fixes

### 3. Checkbox Styling
- Reference: native Bootstrap Italia checkbox
- Local: same HTML, may need visual tweaks

### 4. Button Styling
- Reference: `<button class="btn btn-primary mobile-full">`
- Local: same classes, verify visual match

## Build Commands

```bash
cd laravel/Themes/Sixteen
npm run build && npm run copy
```

## Cache Clearing (CRITICAL)

```bash
cd laravel
rm -rf storage/framework/views/*.php
php artisan optimize:clear
```

## Next Steps

1. Visual comparison via screenshots
2. Fix any remaining CSS discrepancies
3. Verify on multiple screen sizes
