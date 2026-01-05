export default function initThemeBuilder() {
    const builderKey = 'portfolio_theme_builder';
    const html = document.documentElement;

    // Default configuration
    const defaults = {
        accent: '',
        bgTone: '',
        fontType: 'sans', // 'sans' | 'serif'
        fontFamily: 'Instrument Sans', // Specific font name
    };

    function applyConfig(config) {
        console.log('Applying Theme Config:', config);

        // Apply Accent Color
        if (config.accent) {
            html.style.setProperty('--accent-primary', config.accent);
            html.style.setProperty('--accent-secondary', config.accent);
        } else {
            html.style.removeProperty('--accent-primary');
            html.style.removeProperty('--accent-secondary');
        }

        // Apply Background Tone
        if (config.bgTone) {
            html.style.setProperty('--bg-body', config.bgTone);
        } else {
            html.style.removeProperty('--bg-body');
        }

        // Apply Font Family
        const dynamicFontVar = '--font-sans-dynamic';

        if (config.fontFamily && config.fontFamily !== 'Default') {
            const family = `"${config.fontFamily}", ${config.fontType === 'serif' ? 'serif' : 'sans-serif'}`;
            html.style.setProperty(dynamicFontVar, family);
        } else {
            // If no specific family is chosen but type is serif, default to a generic serif
            if (config.fontType === 'serif') {
                html.style.setProperty(dynamicFontVar, '"Merriweather", "Times New Roman", serif');
            } else if (config.fontType === 'sans') {
                // If explicit sans but no family, revert to default variable (Instrument Sans)
                html.style.removeProperty(dynamicFontVar);
            }
        }
    }

    function loadConfig() {
        const stored = localStorage.getItem(builderKey);
        return stored ? JSON.parse(stored) : null;
    }

    function saveConfig(config) {
        localStorage.setItem(builderKey, JSON.stringify(config));
    }

    // Initialize on load
    const savedConfig = loadConfig();
    if (savedConfig) {
        applyConfig(savedConfig);
    }

    // Public API for the UI Component
    // Now purely receives a full config object and applies it (since we have an "Apply" button now)
    window.applyThemeBuilderConfig = (config) => {
        applyConfig(config);
        saveConfig(config);
    };

    window.getThemeBuilderConfig = () => {
        return loadConfig() || { ...defaults };
    };

    window.resetThemeBuilderConfig = () => {
        localStorage.removeItem(builderKey);
        window.location.reload();
    };
}
