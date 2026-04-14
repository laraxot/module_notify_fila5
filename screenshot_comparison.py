from playwright.sync_api import sync_playwright
import os

def take_screenshots():
    with sync_playwright() as p:
        browser = p.chromium.launch(headless=True)
        page = browser.new_page()
        
        # Local page
        try:
            print("Taking local screenshot...")
            page.goto('http://127.0.0.1:8000/it/tests/segnalazione-02-dati')
            page.wait_for_load_state('networkidle')
            page.screenshot(path='local_page.png', full_page=True)
            print("Local screenshot saved to local_page.png")
        except Exception as e:
            print(f"Error taking local screenshot: {e}")
            
        # Reference page
        try:
            print("Taking reference screenshot...")
            page.goto('https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-02-dati.html')
            page.wait_for_load_state('networkidle')
            page.screenshot(path='reference_page.png', full_page=True)
            print("Reference screenshot saved to reference_page.png")
        except Exception as e:
            print(f"Error taking reference screenshot: {e}")
            
        browser.close()

if __name__ == "__main__":
    take_screenshots()
