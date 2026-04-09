const { chromium } = require('playwright');
(async () => {
  const browser = await chromium.launch({ headless: true });
  const page = await browser.newPage();
  await page.goto('http://127.0.0.1:8000/it/tests/segnalazione-area-personale', { waitUntil: 'networkidle' });
  await page.waitForTimeout(2000);
  const font = await page.evaluate(() => {
    const el = document.querySelector('h1, .title-xxxlarge, p');
    return el ? getComputedStyle(el).fontFamily : 'no element found';
  });
  console.log('Computed font-family:', font);
  await browser.close();
})();
