/**
 * Sixteen Theme - App JavaScript
 *
 * Design Comuni replicated with Tailwind CSS + Alpine.js
 * NO Bootstrap Italia - Pure Tailwind + Alpine implementation
 */

import Alpine from 'alpinejs';
import { dropdownToggle } from './components/dropdown';
import { modal } from './components/modal';
import { mobileMenu } from './components/mobile-menu';
import { governanceCarousel } from './components/carousel';
import './components/bootstrap-italia.js';
// DISABLED: domande-frequenti-parity.js was overriding blade template HTML with JS-generated structure
// Now using blade template directly with Alpine.js for accordion
// import { domandeFrequentiParity } from './domande-frequenti-parity';

window.Alpine = Alpine;

// Register Alpine components for direct usage
Alpine.data('dropdownToggle', dropdownToggle);
Alpine.data('modal', modal);
Alpine.data('mobileMenu', mobileMenu);
Alpine.data('governanceCarousel', governanceCarousel);

// Fallback Alpine data for backward compatibility
Alpine.data('dropdown', () => ({
    open: false,
    toggle() {
        this.open = !this.open;
    },
}));

Alpine.start();

document.addEventListener('DOMContentLoaded', function() {
    const closeModal = function(modal) {
        if (!modal) {
            return;
        }

        modal.classList.remove('show');
        modal.style.display = 'none';
        document.body.style.overflow = '';
    };

    const openModal = function(modal) {
        if (!modal) {
            return;
        }

        modal.classList.add('show');
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    };

    document.querySelectorAll('[data-bs-toggle="modal"]').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('data-bs-target');
            const modal = document.querySelector(targetId);
            if (!modal) {
                return;
            }

            if (modal.classList.contains('show')) {
                closeModal(modal);
            } else {
                openModal(modal);
            }
        });
    });

    document.querySelectorAll('[data-bs-dismiss="modal"], .modal .btn-close').forEach(function(btn) {
        btn.addEventListener('click', function() {
            closeModal(this.closest('.modal'));
        });
    });

    document.querySelectorAll('.modal').forEach(function(modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal(this);
            }
        });
    });

    document.querySelectorAll('[data-bs-toggle="dropdown"]').forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            const menu = this.parentElement?.querySelector('.dropdown-menu');

            document.querySelectorAll('.dropdown-menu.show').forEach(function(openMenu) {
                if (openMenu !== menu) {
                    openMenu.classList.remove('show');
                }
            });

            if (menu) {
                menu.classList.toggle('show');
            }
        });
    });

    document.querySelectorAll('[data-bs-toggle="navbarcollapsible"]').forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('data-bs-target');
            const panel = document.querySelector(targetId);

            if (!panel) {
                return;
            }

            const willOpen = !panel.classList.contains('show');
            panel.classList.toggle('show', willOpen);
            document.body.style.overflow = willOpen ? 'hidden' : '';
        });
    });

    document.querySelectorAll('.close-menu, .navbar-collapsable .overlay').forEach(function(trigger) {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();

            const panel = this.closest('.navbar-collapsable') || document.querySelector('.navbar-collapsable.show');

            if (!panel) {
                return;
            }

            panel.classList.remove('show');
            document.body.style.overflow = '';
        });
    });

    document.addEventListener('click', function() {
        document.querySelectorAll('.dropdown-menu.show').forEach(function(openMenu) {
            openMenu.classList.remove('show');
        });
    });

    document.addEventListener('keydown', function(e) {
        if (e.key !== 'Escape') {
            return;
        }

        document.querySelectorAll('.dropdown-menu.show').forEach(function(openMenu) {
            openMenu.classList.remove('show');
        });

        document.querySelectorAll('.modal.show').forEach(function(modal) {
            closeModal(modal);
        });

        document.querySelectorAll('.navbar-collapsable.show').forEach(function(panel) {
            panel.classList.remove('show');
        });

        document.body.style.overflow = '';
    });
});

console.log('Sixteen theme loaded - Tailwind + Alpine.js');

// DISABLED: Using blade template directly with Alpine.js instead of JS-generated structure
// domandeFrequentiParity();

document.addEventListener('DOMContentLoaded', function() {
    if (!document.body.classList.contains('dc-homepage-parity')) {
        return;
    }

    const setImageSource = function(selector, src, alt) {
        const image = document.querySelector(selector);

        if (!image) {
            return;
        }

        image.src = src;

        if (alt) {
            image.alt = alt;
        }
    };

    setImageSource('#head-section .img-fluid', 'https://picsum.photos/id/1040/800/600', 'Paesaggio di campagna');
    setImageSource('#calendario .card-teaser-image .card-image img', 'https://picsum.photos/id/1005/150/200', 'Mario Rossi');

    document.querySelectorAll('#calendario .card-text img').forEach(function(image, index) {
        image.src = 'https://picsum.photos/id/' + (1060 + index) + '/200/200';
    });

    document.querySelectorAll('.evidence-section .avatar img').forEach(function(image, index) {
        image.src = 'https://picsum.photos/id/' + (1025 + index) + '/200/200';
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('data-bs-target');
            const panel = targetId ? document.querySelector(targetId) : null;

            if (!panel) {
                return;
            }

            const parentSelector = panel.getAttribute('data-bs-parent');
            const isOpen = panel.classList.contains('show');

            if (parentSelector) {
                document.querySelectorAll(parentSelector + ' .accordion-collapse.show').forEach(function(openPanel) {
                    if (openPanel !== panel) {
                        openPanel.classList.remove('show');
                        openPanel.previousElementSibling?.querySelector('.accordion-button')?.classList.add('collapsed');
                        openPanel.previousElementSibling?.querySelector('.accordion-button')?.setAttribute('aria-expanded', 'false');
                    }
                });
            }

            panel.classList.toggle('show', !isOpen);
            this.classList.toggle('collapsed', isOpen);
            this.setAttribute('aria-expanded', String(!isOpen));
        });
    });

    const faqSearchInput = document.querySelector('[data-faq-search]');
    const faqSearchForm = document.querySelector('[data-faq-search-form]');

    if (faqSearchForm) {
        faqSearchForm.addEventListener('submit', function(e) {
            e.preventDefault();
        });
    }

    if (faqSearchInput) {
        faqSearchInput.addEventListener('input', function() {
            const term = this.value.trim().toLowerCase();

            document.querySelectorAll('[data-faq-item]').forEach(function(item) {
                const haystack = item.getAttribute('data-faq-text') || '';
                item.style.display = term === '' || haystack.includes(term) ? '' : 'none';
            });
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector('main[data-page="argomenti"]')) {
        document.body.classList.add('dc-argomenti-parity');
    }
});
