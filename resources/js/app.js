import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Simple JS functions for mobile menu
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu functionality with Alpine.js
    window.toggleMobileMenu = function() {
        document.querySelector('[x-data="{ open: false }"]')?.setAttribute('x-data', '{ open: true }');
    };
});
