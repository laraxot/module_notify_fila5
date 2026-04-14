from playwright.sync_api import sync_playwright

def take_mobile_screenshots():
    with sync_playwright() as p:
        browser = p.chromium.launch(headless=True)
        # Mobile viewport
        context = browser.new_context(
            viewport={'width': 375, 'height': 667},
            is_mobile=True,
            user_agent='Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1'
        )
        page = context.new_page()
        
        # Local page mobile
        try:
            print("Taking local mobile screenshot...")
            page.goto('http://127.0.0.1:8000/it/tests/segnalazione-02-dati')
            page.wait_for_load_state('networkidle')
            page.screenshot(path='local_mobile.png')
            print("Local mobile screenshot saved")
        except Exception as e:
            print(f"Error local mobile: {e}")
            
        # Reference page mobile
        try:
            print("Taking reference mobile screenshot...")
            page.goto('https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-02-dati.html')
            page.wait_for_load_state('networkidle')
            page.screenshot(path='reference_mobile.png')
            print("Reference mobile screenshot saved")
        except Exception as e:
            print(f"Error reference mobile: {e}")
            
        browser.close()

if __name__ == "__main__":
    take_mobile_screenshots()
