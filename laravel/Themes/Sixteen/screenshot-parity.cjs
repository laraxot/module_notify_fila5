const { chromium } = require('playwright');
const OUTPUT = '/var/www/_bases/base_fixcity_fila5/bashscripts/compare-html/output';

(async () => {
  const browser = await chromium.launch({ headless: true });
  const context = await browser.newContext({ viewport: { width: 1440, height: 900 } });
  const page = await context.newPage();

  async function captureSections(url, prefix) {
    await page.goto(url, { waitUntil: 'networkidle', timeout: 30000 });
    await page.waitForTimeout(1500);
    
    const sections = [
      { selector: '#main-container', name: 'full-page' },
      { selector: '.cmp-breadcrumbs', name: 'breadcrumbs' },
      { selector: '.steppers', name: 'steppers' },
      { selector: '.container > .row:last-of-type .col-12.col-lg-8', name: 'content-area' },
      { selector: '.form-check', name: 'checkbox' },
      { selector: '.btn.btn-primary.mobile-full', name: 'button' },
      { selector: '.bg-grey-card', name: 'contacts-card' },
      { selector: 'footer, .it-footer, #footer', name: 'footer' },
    ];
    
    for (const s of sections) {
      try {
        const el = await page.$(s.selector);
        if (el) {
          await el.screenshot({ path: `${OUTPUT}/parity-${prefix}-${s.name}.png` });
          console.log(`  ✅ ${prefix} ${s.name}`);
        } else {
          console.log(`  ⚠️ ${prefix} ${s.name} NOT FOUND`);
        }
      } catch(e) {
        console.log(`  ❌ ${prefix} ${s.name}: ${e.message.substring(0, 80)}`);
      }
    }
  }

  console.log('📸 REFERENCE sections...');
  await captureSections('https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-01-privacy.html', 'ref');
  console.log('\n📸 LOCAL sections...');
  await captureSections('http://127.0.0.1:8000/it/tests/segnalazione-01-privacy', 'loc');

  // Also capture computed styles for key elements
  console.log('\n🔍 Computed styles comparison...');
  for (const [label, url] of [['REF', 'https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-01-privacy.html'], ['LOC', 'http://127.0.0.1:8000/it/tests/segnalazione-01-privacy']]) {
    await page.goto(url, { waitUntil: 'networkidle', timeout: 30000 });
    await page.waitForTimeout(1500);
    const styles = await page.evaluate(() => {
      const results = {};
      const selectors = [
        'body', '#main-container', 'h1.title-xxxlarge', 'p.text-paragraph', 
        '.form-check', '.form-check input[type="checkbox"]', '.form-check label',
        '.btn.btn-primary.mobile-full', '.bg-grey-card', '.cmp-contacts .card'
      ];
      for (const sel of selectors) {
        const el = document.querySelector(sel);
        if (el) {
          const cs = getComputedStyle(el);
          results[sel] = {
            fontFamily: cs.fontFamily,
            fontSize: cs.fontSize,
            fontWeight: cs.fontWeight,
            lineHeight: cs.lineHeight,
            color: cs.color,
            backgroundColor: cs.backgroundColor,
            padding: cs.padding,
            marginBottom: cs.marginBottom,
          };
        }
      }
      return results;
    });
    console.log(`\n  --- ${label} ---`);
    for (const [sel, s] of Object.entries(styles)) {
      console.log(`  ${sel}: font=${s.fontFamily} ${s.fontSize}/${s.lineHeight} w=${s.fontWeight} color=${s.color} bg=${s.backgroundColor}`);
    }
  }

  await browser.close();
  console.log('\n✅ Done!');
})();
