import './bootstrap';
import Alpine from 'alpinejs';
import initTheme from './theme-switch';
import initThemeBuilder from './theme-builder';

// Initialize Utils (Expose global functions)
initTheme();
initThemeBuilder();

// Start Alpine
window.Alpine = Alpine;
Alpine.start();
