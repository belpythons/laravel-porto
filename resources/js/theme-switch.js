export default function initTheme() {
    const themeKey = 'portfolio_theme';
    const html = document.documentElement;

    function setTheme(theme) {
        html.setAttribute('data-theme', theme);
        localStorage.setItem(themeKey, theme);
        
        // Handle Tailwind 'dark' class for backward compatibility or utility usage
        if (theme === 'dim' || theme === 'creative') {
            html.classList.add('dark');
        } else {
            html.classList.remove('dark');
        }
    }

    function getSavedTheme() {
        return localStorage.getItem(themeKey) || 'default';
    }

    // Initialize
    const savedTheme = getSavedTheme();
    setTheme(savedTheme);

    // Expose toggle function globally or return it
    window.toggleTheme = (theme) => {
        setTheme(theme);
    };
    
    // Cycle through themes logic (optional helper)
    window.cycleThemes = () => {
        const current = html.getAttribute('data-theme');
        const themes = ['default', 'dim', 'creative'];
        const nextIndex = (themes.indexOf(current) + 1) % themes.length;
        setTheme(themes[nextIndex]);
    };
}
