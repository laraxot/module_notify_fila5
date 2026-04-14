from playwright.sync_api import sync_playwright
import os

def take_screenshots(url, output_dir):
    with sync_playwright() as p:
        browser = p.chromium.launch(headless=True)
        # Desktop
        page = browser.new_page(viewport={'width': 1280, 'height': 800})
        page.goto(url)
        page.wait_for_load_state('networkidle')
        page.screenshot(path=os.path.join(output_dir, 'stepper_desktop.png'), full_page=True)
        
        # Mobile
        page = browser.new_page(viewport={'width': 375, 'height': 667})
        page.goto(url)
        page.wait_for_load_state('networkidle')
        page.screenshot(path=os.path.join(output_dir, 'stepper_mobile.png'), full_page=True)
        
        browser.close()

if __name__ == "__main__":
    url = "http://127.0.0.1:8000/it/tests/segnalazione-02-dati"
    output_dir = "reports"
    if not os.path.exists(output_dir):
        os.makedirs(output_dir)
    take_screenshots(url, output_dir)
