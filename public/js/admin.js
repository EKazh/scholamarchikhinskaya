// public/js/admin.js

// Добавляем текст "Админка" рядом с логотипом (если нужно)
document.addEventListener('DOMContentLoaded', function () {
    const logo = document.querySelector('.header-logo');
    if (logo && !document.querySelector('.admin-label')) {
        const label = document.createElement('span');
        label.textContent = ' Админка';
        label.style.color = '#888';
        label.style.fontWeight = 'normal';
        label.style.marginLeft = '8px';
        label.classList.add('admin-label');
        logo.appendChild(label);
    }

    // Плавное появление контента
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 0.3s';
    setTimeout(() => {
        document.body.style.opacity = '1';
    }, 100);
});