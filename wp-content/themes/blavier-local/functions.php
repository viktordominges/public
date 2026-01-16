<?php
/**
 * Функция для вывода переменной в консоль браузера
 *
 * @param mixed  $var  Переменная для вывода
 * @param string $name Имя переменной (необязательно)
 * @param bool   $now  Выводить сразу или при завершении скрипта (по умолчанию false)
 * @return void
 */     
function var2console($var, $name = '', $now = false) {
    if ($var === null)          $type = 'NULL';
    else if (is_bool($var)) $type = 'BOOL';
    else if (is_string($var)) $type = 'STRING[' . strlen($var) . ']';
    else if (is_int($var)) $type = 'INT';
    else if (is_float($var)) $type = 'FLOAT';
    else if (is_array($var)) $type = 'ARRAY[' . count($var) . ']';
    else if (is_object($var)) $type = 'OBJECT';
    else if (is_resource($var)) $type = 'RESOURCE';
    else                        $type = '???';
    if (strlen($name)) {
        str2console("$type $name = " . var_export($var, true) . ';', $now);
    } else {
        str2console("$type = "      . var_export($var, true) . ';', $now);
    }
}

function str2console($str, $now = false) {
    if ($now) {
        echo "<script type='text/javascript'>\n";
        echo "//<![CDATA[\n";
        echo "console.log(", json_encode($str), ");\n";
        echo "//]]>\n";
        echo "</script>";
    } else {
        register_shutdown_function('str2console', $str, true);
    }
}

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

// ==================================================
// Enqueue scripts & styles
// ==================================================
add_action('wp_enqueue_scripts', function () {

    // Основной JS темы
    wp_enqueue_script(
        'theme-dropdown',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        [],
        '1.0.0',
        true // в footer
    );

});
?>