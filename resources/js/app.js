import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// Simple JS functions for mobile menu
document.addEventListener('DOMContentLoaded', function() {
    window.toggleMobileMenu = function() {
        document.querySelector('[x-data="{ open: false }"]')?.setAttribute('x-data', '{ open: true }');
    };
});
