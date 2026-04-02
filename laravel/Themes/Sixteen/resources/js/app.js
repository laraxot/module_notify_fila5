/**
 * Sixteen Theme - App JavaScript
 *
 * Design Comuni replicated with Tailwind CSS + Alpine.js
 * NO Bootstrap Italia - Pure Tailwind + Alpine implementation
 */

import Alpine from 'alpinejs';
import './components/bootstrap-italia.js';

window.Alpine = Alpine;

Alpine.data('modal', () => ({
    open: false,
    toggle() {
        this.open = !this.open;
    },
    show() {
        this.open = true;
    },
    hide() {
        this.open = false;
    },
}));

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
