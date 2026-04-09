const { chromium } = require('playwright');

(async () => {
  const browser = await chromium.launch({ headless: true });
  const context = await browser.newContext({ viewport: { width: 1440, height: 900 } });
  const page = await context.newPage();

  const OUTPUT_DIR = '/var/www/_bases/base_fixcity_fila5/bashscripts/compare-html/output';

  // 1. Reference
  console.log('📸 Reference page...');
  await page.goto('https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-01-privacy.html', { waitUntil: 'networkidle' });
  await page.screenshot({ path: `${OUTPUT_DIR}/screenshot-ref-full.png`, fullPage: true });
  const refEl = await page.$('#main-container');
  if (refEl) await refEl.screenshot({ path: `${OUTPUT_DIR}/screenshot-ref-main.png` });

  // 2. Local
  console.log('📸 Local page...');
  await page.goto('http://127.0.0.1:8000/it/tests/segnalazione-01-privacy', { waitUntil: 'networkidle' });
  await page.waitForTimeout(2000);
  await page.screenshot({ path: `${OUTPUT_DIR}/screenshot-local-full.png`, fullPage: true });
  const localEl = await page.$('#main-container');
  if (localEl) await localEl.screenshot({ path: `${OUTPUT_DIR}/screenshot-local-main.png` });

  // 3. Viewport
  await page.goto('https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-01-privacy.html', { waitUntil: 'networkidle' });
  await page.screenshot({ path: `${OUTPUT_DIR}/screenshot-ref-viewport.png` });

  await page.goto('http://127.0.0.1:8000/it/tests/segnalazione-01-privacy', { waitUntil: 'networkidle' });
  await page.waitForTimeout(2000);
  await page.screenshot({ path: `${OUTPUT_DIR}/screenshot-local-viewport.png` });

  // 4. Fonts analysis
  async function getFonts(url, label) {
    await page.goto(url, { waitUntil: 'networkidle' });
    await page.waitForTimeout(1000);
    const fonts = await page.evaluate(() => {
      const elements = document.querySelectorAll('p, h1, h2, h3, h4, h5, h6, span, a, label, button, input, li');
      const fontMap = new Map();
      elements.forEach(el => {
        const style = window.getComputedStyle(el);
        const key = `${style.fontFamily}|${style.fontSize}|${style.fontWeight}|${style.lineHeight}`;
        fontMap.set(key, (fontMap.get(key) || 0) + 1);
      });
      return Array.from(fontMap.entries()).sort((a, b) => b[1] - a[1]);
    });
    console.log(`\n📝 Fonts [${label}]:`);
    fonts.slice(0, 8).forEach(([font, count]) => console.log(`  ${count}x → ${font.replace(/\|/g, ' | ')}`));
    return fonts;
  }

  const refFonts = await getFonts('https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-01-privacy.html', 'REFERENCE');
  const locFonts = await getFonts('http://127.0.0.1:8000/it/tests/segnalazione-01-privacy', 'LOCAL');

  // 5. Font comparison
  console.log('\n🔍 FONT DIFF ANALYSIS:');
  const refFontKeys = new Set(refFonts.map(f => f[0]));
  const locFontKeys = new Set(locFonts.map(f => f[0]));
  
  const onlyInRef = [...refFontKeys].filter(k => !locFontKeys.has(k));
  const onlyInLoc = [...locFontKeys].filter(k => !refFontKeys.has(k));
  const common = [...refFontKeys].filter(k => locFontKeys.has(k));
  
  if (common.length > 0) console.log(`  ✅ ${common.length} font combinations match`);
  if (onlyInRef.length > 0) {
    console.log(`  ❌ ${onlyInRef.length} font combinations ONLY in reference:`);
    onlyInRef.slice(0, 5).forEach(k => console.log(`    REF → ${k.replace(/\|/g, ' | ')}`));
  }
  if (onlyInLoc.length > 0) {
    console.log(`  ⚠️ ${onlyInLoc.length} font combinations ONLY in local:`);
    onlyInLoc.slice(0, 5).forEach(k => console.log(`    LOC → ${k.replace(/\|/g, ' | ')}`));
  }

  await browser.close();
  console.log('\n✅ Screenshots: bashscripts/compare-html/output/screenshot-*.png');
})();
