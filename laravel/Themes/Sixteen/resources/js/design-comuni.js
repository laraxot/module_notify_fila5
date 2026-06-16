import Alpine from './alpine';

document.addEventListener('alpine:init', () => {
    document.querySelectorAll('.dropdown').forEach((dropdown) => {
        dropdown.setAttribute('x-data', '{ open: false }');

        const toggle = dropdown.querySelector('.dropdown-toggle');
        if (toggle) {
            toggle.removeAttribute('data-bs-toggle');
            toggle.setAttribute('@click', 'open = !open');
        }

        const menu = dropdown.querySelector('.dropdown-menu');
        if (menu) {
            menu.classList.remove('show');
            menu.setAttribute(':class', "{ 'show': open }");
        }

        dropdown.querySelectorAll('.dropdown-item').forEach((item) => {
            item.setAttribute('@click', 'open = false');
        });
    });

    Alpine.data('mobileNav', () => ({
        isOpen: false,
        toggle() {
            this.isOpen = !this.isOpen;
        },
        close() {
            this.isOpen = false;
        },
    }));
});
