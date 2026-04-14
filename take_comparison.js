const { chromium } = require('playwright');
const path = require('path');

const REF_URL = 'https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-02-dati.html';
const LOCAL_URL = 'http://127.0.0.1:8000/it/tests/segnalazione-02-dati';

async function takeScreenshots() {
  const browser = await chromium.launch({ args: ['--no-sandbox'] });
  
  // Desktop
  console.log('Taking desktop screenshots...');
  const desktop = await browser.newContext({ viewport: { width: 1280, height: 900 } });
  const dpage = await desktop.newPage();
  
  await dpage.goto(REF_URL, { waitUntil: 'networkidle' });
  await dpage.screenshot({ path: 'ref_desktop.png', fullPage: true });
  
  await dpage.goto(LOCAL_URL, { waitUntil: 'networkidle' });
  await dpage.screenshot({ path: 'local_desktop.png', fullPage: true });
  await desktop.close();

  // Mobile
  console.log('Taking mobile screenshots...');
  const mobile = await browser.newContext({ 
    viewport: { width: 375, height: 812 },
    isMobile: true
  });
  const mpage = await mobile.newPage();
  
  await mpage.goto(REF_URL, { waitUntil: 'networkidle' });
  await mpage.screenshot({ path: 'ref_mobile.png' });
  
  await mpage.goto(LOCAL_URL, { waitUntil: 'networkidle' });
  await mpage.screenshot({ path: 'local_mobile.png' });
  await mobile.close();

  await browser.close();
  console.log('Done!');
}

takeScreenshots().catch(console.error);
