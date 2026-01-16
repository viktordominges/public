document.addEventListener('DOMContentLoaded', () => {
    initDropdowns('.dropdown-toggle');
    initAccordion('.accordion-question');
});

function initDropdowns(selector) {
    const dropdowns = document.querySelectorAll(selector);

    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', (e) => {
            // Если клик по ссылке внутри меню — ничего не трогаем
            if (e.target.tagName === 'A') return;

            e.stopPropagation();

            const menu = dropdown.querySelector('.dropdown-menu');
            if (!menu) return;

            const isOpen = menu.classList.contains('show');

            closeAllDropdowns();

            if (!isOpen) {
                menu.classList.add('show');
                dropdown.classList.add('open');
            }
        });
    });
}

function closeAllDropdowns() {
    document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
        menu.classList.remove('show');
        menu.parentElement.classList.remove('open');
    });
}

// Закрытие при клике вне меню
document.addEventListener('click', () => {
    closeAllDropdowns();
});


// Accordion functionality
function initAccordion(triggerSelector) {
    document.querySelectorAll(triggerSelector).forEach(header => {
        header.addEventListener('click', function() {
            const content = this.nextElementSibling;
            
            // Переключаем активный класс
            this.classList.toggle('active');
            
            // Плавное открытие/закрытие
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + 40 + "px";
            }
        });
    });
}