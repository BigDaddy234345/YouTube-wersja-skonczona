document.addEventListener('DOMContentLoaded', function() {
    const themeBtn = document.getElementById('theme-toggle');
    const themeIcon = document.getElementById('theme-icon');
    const body = document.body;

    // 1. Проверяем память браузера
    const savedTheme = localStorage.getItem('youtube_theme');
    if (savedTheme === 'light') {
        body.classList.add('light-theme');
        if (themeIcon) themeIcon.textContent = 'dark_mode';
    }

    // 2. БРОНЯ: Проверяем, существует ли кнопка, прежде чем вешать клик
    if (themeBtn) {
        themeBtn.addEventListener('click', function() {
            body.classList.toggle('light-theme');
            
            if (body.classList.contains('light-theme')) {
                localStorage.setItem('youtube_theme', 'light');
                if (themeIcon) themeIcon.textContent = 'dark_mode';
            } else {
                localStorage.setItem('youtube_theme', 'dark');
                if (themeIcon) themeIcon.textContent = 'light_mode';
            }
        });
    }
});