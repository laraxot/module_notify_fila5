const { chromium } = require('playwright');

(async () => {
  const browser = await chromium.launch({ headless: true });
  const context = await browser.newContext({ viewport: { width: 1440, height: 900 } });
  const page = await context.newPage();
  const OUTPUT = '/var/www/_bases/base_fixcity_fila5/bashscripts/compare-html/output';

  // Reference
  console.log('📸 Reference segnalazione-02-dati...');
  await page.goto('https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-02-dati.html', { waitUntil: 'networkidle' });
  await page.screenshot({ path: `${OUTPUT}/screenshot-02-dati-ref.png`, fullPage: true });
  
  // Scroll to upload section
  const uploadBtn = await page.$('button[aria-label*="Carica file"]');
  if (uploadBtn) {
    await uploadBtn.scrollIntoViewIfNeeded();
    await page.screenshot({ path: `${OUTPUT}/screenshot-02-dati-ref-upload.png` });
    console.log('✅ Reference upload section captured');
  }

  // Local
  console.log('📸 Local segnalazione-02-dati...');
  await page.goto('http://127.0.0.1:8000/it/tests/segnalazione-02-dati', { waitUntil: 'networkidle' });
  await page.waitForTimeout(2000);
  await page.screenshot({ path: `${OUTPUT}/screenshot-02-dati-local.png`, fullPage: true });
  
  const localUploadBtn = await page.$('button[aria-label*="Carica file"]');
  if (localUploadBtn) {
    await localUploadBtn.scrollIntoViewIfNeeded();
    await page.screenshot({ path: `${OUTPUT}/screenshot-02-dati-local-upload.png` });
    console.log('✅ Local upload section captured');
  } else {
    console.log('⚠️ Upload button not found locally');
  }

  await browser.close();
  console.log('\n✅ Done! Check bashscripts/compare-html/output/screenshot-02-dati-*.png');
})();
