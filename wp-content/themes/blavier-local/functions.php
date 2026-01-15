<?php
/**
 * Функция-хелпер для вывода кнопки
 *
 * @param array $args Параметры кнопки
 * @return void
 */
function get_button($args = array()) {
    // Путь к компоненту кнопки
    $button_path = get_template_directory() . '/components/button.php';
    
    if (file_exists($button_path)) {
        include($button_path);
    } else {
        echo '<!-- Button component not found -->';
    }
}

/**
 * Функция для получения HTML кнопки (без вывода)
 *
 * @param array $args Параметры кнопки
 * @return string HTML код кнопки
 */
function get_button_html($args = array()) {
    ob_start();
    get_button($args);
    return ob_get_clean();
}
?>