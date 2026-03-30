import Alpine from 'alpinejs';

window.Alpine = Alpine;

const closeLanguageMenu = (button, menu) => {
  menu.style.display = 'none';
  menu.classList.remove('show');
  button.setAttribute('aria-expanded', 'false');
};

const openLanguageMenu = (button, menu) => {
  menu.style.display = 'block';
  menu.classList.add('show');
  button.setAttribute('aria-expanded', 'true');
};

const closeMobileMenu = (button, panel, overlay) => {
  panel.classList.remove('show', 'expanded');
  button.setAttribute('aria-expanded', 'false');
  document.body.classList.remove('nav-open');

  if (overlay) {
    overlay.style.display = 'none';
    overlay.classList.add('hidden');
  }
};

const openMobileMenu = (button, panel, overlay) => {
  panel.classList.add('show', 'expanded');
  button.setAttribute('aria-expanded', 'true');
  document.body.classList.add('nav-open');

  if (overlay) {
    overlay.style.display = 'block';
    overlay.classList.remove('hidden');
  }
};

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
  const languageButton = document.getElementById('language-button');
  const languageMenu = document.getElementById('language-menu');

  if (languageButton && languageMenu) {
    languageButton.addEventListener('click', (event) => {
      event.preventDefault();
      event.stopPropagation();

      const isExpanded = languageButton.getAttribute('aria-expanded') === 'true';

      if (isExpanded) {
        closeLanguageMenu(languageButton, languageMenu);
      } else {
        openLanguageMenu(languageButton, languageMenu);
      }
    });

    document.addEventListener('click', (event) => {
      if (!languageButton.contains(event.target) && !languageMenu.contains(event.target)) {
        closeLanguageMenu(languageButton, languageMenu);
      }
    });
  }

  const hamburgerButton = document.querySelector('[data-bs-toggle="navbarcollapsible"]');
  const navCollapsible = document.getElementById('nav4');
  const closeButton = document.querySelector('.close-menu');
  const overlay = document.querySelector('.overlay');

  if (hamburgerButton && navCollapsible) {
    hamburgerButton.addEventListener('click', (event) => {
      event.preventDefault();

      const isExpanded = hamburgerButton.getAttribute('aria-expanded') === 'true';

      if (isExpanded) {
        closeMobileMenu(hamburgerButton, navCollapsible, overlay);
      } else {
        openMobileMenu(hamburgerButton, navCollapsible, overlay);
      }
    });
  }

  if (closeButton && hamburgerButton && navCollapsible) {
    closeButton.addEventListener('click', () => {
      closeMobileMenu(hamburgerButton, navCollapsible, overlay);
    });
  }

  if (overlay && hamburgerButton && navCollapsible) {
    overlay.addEventListener('click', () => {
      closeMobileMenu(hamburgerButton, navCollapsible, overlay);
    });
  }
});
