const { chromium } = require('playwright');

const PAGES = [
  'segnalazione-area-personale',
  'segnalazioni-elenco',
  'segnalazione-dettaglio',
  'segnalazione-01-privacy',
  'segnalazione-02-dati',
  'segnalazione-03-riepilogo',
  'segnalazione-04-conferma',
];

const OUTPUT_DIR = '/var/www/_bases/base_fixcity_fila5/bashscripts/compare-html/output';
const REF_BASE = 'https://italia.github.io/design-comuni-pagine-statiche/sito';
const LOCAL_BASE = 'http://127.0.0.1:8000/it/tests';

(async () => {
  const browser = await chromium.launch({ headless: true });
  const context = await browser.newContext({ viewport: { width: 1440, height: 900 } });
  const page = await context.newPage();

  // Disable font analysis (takes too long) - just capture screenshots
  for (const slug of PAGES) {
    console.log(`\n📸 ${slug}...`);

    // Reference
    try {
      await page.goto(`${REF_BASE}/${slug}.html`, { waitUntil: 'networkidle', timeout: 30000 });
      await page.screenshot({ path: `${OUTPUT_DIR}/screenshot-${slug}-ref.png`, fullPage: true });
      console.log(`  ✅ Ref captured`);
    } catch (e) {
      console.log(`  ❌ Ref failed: ${e.message}`);
    }

    // Local
    try {
      await page.goto(`${LOCAL_BASE}/${slug}`, { waitUntil: 'networkidle', timeout: 30000 });
      await page.waitForTimeout(1500); // Let Alpine/Livewire settle
      await page.screenshot({ path: `${OUTPUT_DIR}/screenshot-${slug}-local.png`, fullPage: true });
      console.log(`  ✅ Local captured`);
    } catch (e) {
      console.log(`  ❌ Local failed: ${e.message}`);
    }
  }

  await browser.close();
  console.log('\n✅ All screenshots saved!');
  console.log(`📁 ${OUTPUT_DIR}/screenshot-*.png`);
})();
