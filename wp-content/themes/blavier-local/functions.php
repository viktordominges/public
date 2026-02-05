<?php


// Connecting the activity plugin (to add additional fields to the default post functionality)
function register_activity_cpt() {
    register_post_type('activity', [
        'labels' => [
            'name' => 'Activities',
            'singular_name' => 'Activity',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'activities'],
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'register_activity_cpt');


// Correct connection of styles and scripts
function blavier_enqueue_script() {
    // Основной CSS темы
    wp_enqueue_style(
        'blavier-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [],
        '1.0.0',
        'all'
    );

    // Font Awesome (через CDN CSS)
    wp_enqueue_style(
        'fontawesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
        [],
        '6.5.1'
    );

    // Основной JS темы
    wp_enqueue_script(
        'blavier-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        '1.0.0',
        true // в footer
    );
}
add_action('wp_enqueue_scripts', 'blavier_enqueue_script');


// Function for outputting a variable to the browser console
add_theme_support('post-thumbnails');
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

// Helper function for displaying a button
function get_button($args = array()) {
    // Путь к компоненту кнопки
    $button_path = get_template_directory() . '/components/button.php';
    
    if (file_exists($button_path)) {
        include($button_path);
    } else {
        echo '<!-- Button component not found -->';
    }
}

// Function to get HTML button (without output)
function get_button_html($args = array()) {
    ob_start();
    get_button($args);
    return ob_get_clean();
}


// Register navigation menus
function blavier_register_menus() {
    register_nav_menus(
        array(
            'header_top'    => __('Header Top Menu'),
            'header_middle' => __('Header Middle Menu'),
            'footer_nav_1'    => __('A propos de Blavier'),
            'footer_nav_2'    => __('Infos & contact'),
        )
    );
}
add_action('after_setup_theme', 'blavier_register_menus', 0);

// Function to display a navigation menu with its title
function theme_nav_menu_with_title($location, $title_tag = 'h3') {

    $locations = get_nav_menu_locations();

    if (empty($locations[$location])) {
        return;
    }

    $menu = wp_get_nav_menu_object($locations[$location]);

    echo '<div class="footer-menu-group">';

    if ($menu) {
        echo '<' . $title_tag . ' class="footer-menu-title">'
            . esc_html($menu->name) .
        '</' . $title_tag . '>';
    }

    wp_nav_menu([
        'theme_location' => $location,
        'container' => false,
        'menu_class' => 'footer-menu',
        'fallback_cb' => false // важно — не показывать Pages fallback
    ]);

    echo '</div>';
}


// Function to get the page title based on context
function get_page_title() {

    if (is_home()) {
        return 'Blog';
    }

    if (is_post_type_archive('activity')) {
        return 'Evénements à venir';
    }

    if (is_archive()) {
        return get_the_archive_title();
    }

    if (is_singular()) {
        return get_the_title();
    }

    return get_bloginfo('name');
}


// Flexible Content Builder function
function theme_builder($field = 'builder', $post_id = null) {

    $builder = get_field($field, $post_id);

    if (!$builder) {
        return;
    }

    $layouts = [
        'cta'               => 'cta',
        'text-simple'       => 'text-simple',
        'text-with-title'   => 'text-with-title',
        'text-right-img'    => 'text-right-img',
        'text-left-img'     => 'text-left-img',
        'text-double'       => 'text-double',
        'hero-block'        => 'hero-block',
        'history-left-img'  => 'history-left-img',
        'history-right-img' => 'history-right-img',
    ];

    // какие layout считаем history
    $history_layouts = [
        'history-left-img',
        'history-right-img',
    ];

    $history_open = false;

    foreach ($builder as $section) {

        $layout = $section['acf_fc_layout'] ?? '';

        // ===== HISTORY BLOCKS =====
        if (in_array($layout, $history_layouts, true)) {

            if (!$history_open) {
                echo '<section class="history-section">';
                echo '<div class="container">';
                $history_open = true;
            }

            get_template_part(
                'template-parts/builder/' . $layouts[$layout],
                null,
                $section
            );

            continue;
        }

        // ===== ЗАКРЫВАЕМ HISTORY, ЕСЛИ ОНО ЗАКОНЧИЛОСЬ =====
        if ($history_open) {
            echo '</div></section>';
            $history_open = false;
        }

        // ===== ОСТАЛЬНЫЕ БЛОКИ =====
        if (isset($layouts[$layout])) {
            get_template_part(
                'template-parts/builder/' . $layouts[$layout],
                null,
                $section
            );
        }
    }

    // ===== СТРАХОВКА, ЕСЛИ HISTORY В КОНЦЕ =====
    if ($history_open) {
        echo '</div></section>';
    }
}

