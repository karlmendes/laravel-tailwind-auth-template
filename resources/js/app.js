import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    const themeToggleButton = document.getElementById('theme-toggle');
    const lightIcon = document.getElementById('theme-toggle-light-icon');
    const darkIcon = document.getElementById('theme-toggle-dark-icon');

    function getPreferredTheme() {
        const savedTheme = localStorage.getItem('theme');

        if (savedTheme) {
            return savedTheme;
        }

        return window.matchMedia('(prefers-color-scheme: dark)').matches
            ? 'dark'
            : 'light';
    }

    function applyTheme(theme) {
        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        updateThemeIcon(theme);
    }

    function updateThemeIcon(theme) {
        if (!lightIcon || !darkIcon) {
            return;
        }

        if (theme === 'dark') {
            lightIcon.classList.remove('hidden');
            darkIcon.classList.add('hidden');
        } else {
            lightIcon.classList.add('hidden');
            darkIcon.classList.remove('hidden');
        }
    }

    applyTheme(getPreferredTheme());

    if (themeToggleButton) {
        themeToggleButton.addEventListener('click', () => {
            const isDark = document.documentElement.classList.contains('dark');

            const newTheme = isDark ? 'light' : 'dark';

            localStorage.setItem('theme', newTheme);

            applyTheme(newTheme);
        });
    }
});