document.addEventListener('DOMContentLoaded', function () {
    const languageButton = document.getElementById('language-button');
    const languageMenu = document.getElementById('language-menu');

    if (languageButton && languageMenu) {
        languageButton.addEventListener('click', function () {
            const isExpanded = languageButton.getAttribute('aria-expanded') === 'true';
            languageMenu.style.display = isExpanded ? 'none' : 'block';
            languageButton.setAttribute('aria-expanded', isExpanded ? 'false' : 'true');
        });

        document.addEventListener('click', function (event) {
            const target = event.target;
            if (!(target instanceof Node)) {
                return;
            }

            if (!languageButton.contains(target) && !languageMenu.contains(target)) {
                languageMenu.style.display = 'none';
                languageButton.setAttribute('aria-expanded', 'false');
            }
        });
    }

    const hamburgerButton = document.querySelector('[data-bs-toggle="navbarcollapsible"]');
    const navCollapsible = document.querySelector('#nav4');
    const closeButton = document.querySelector('.close-menu');
    const overlay = document.querySelector('.overlay');

    const closeMobileNav = () => {
        if (navCollapsible) {
            navCollapsible.classList.remove('expanded');
        }
        if (hamburgerButton instanceof HTMLElement) {
            hamburgerButton.setAttribute('aria-expanded', 'false');
        }
        document.body.classList.remove('nav-open');
        if (overlay instanceof HTMLElement) {
            overlay.style.display = 'none';
        }
    };

    const openMobileNav = () => {
        if (navCollapsible) {
            navCollapsible.classList.add('expanded');
        }
        if (hamburgerButton instanceof HTMLElement) {
            hamburgerButton.setAttribute('aria-expanded', 'true');
        }
        document.body.classList.add('nav-open');
        if (overlay instanceof HTMLElement) {
            overlay.style.display = 'block';
        }
    };

    if (hamburgerButton instanceof HTMLElement && navCollapsible instanceof HTMLElement) {
        hamburgerButton.addEventListener('click', function () {
            const isExpanded = hamburgerButton.getAttribute('aria-expanded') === 'true';
            if (isExpanded) {
                closeMobileNav();
            } else {
                openMobileNav();
            }
        });
    }

    if (closeButton instanceof HTMLElement) {
        closeButton.addEventListener('click', closeMobileNav);
    }

    if (overlay instanceof HTMLElement) {
        overlay.addEventListener('click', closeMobileNav);
    }
});
