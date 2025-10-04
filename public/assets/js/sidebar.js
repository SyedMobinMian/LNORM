// public/assets/js/sidebar.js
document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.querySelector('.toggle-btn');
    const sidebar = document.querySelector('.sidebar');
    const content = document.querySelector('.content');

    if (toggleBtn && sidebar && content) {
        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('collapsed');

            localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
        });

        const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
        if (isCollapsed) {
            sidebar.classList.add('collapsed');
            content.classList.add('collapsed');
        }
    }
});
