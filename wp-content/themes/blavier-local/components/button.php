
<?php
/**
 * Универсальный компонент Button
 * 
 * @param array $args {
 *     Параметры кнопки:
 *     
 *     @type string  $type         Тип элемента: 'button', 'link', 'input', 'submit'
 *     @type string  $style        Стиль кнопки: 'primary', 'secondary', 'danger', 'success', 'warning', 'dark', 'light'
 *     @type string  $text         Текст кнопки
 *     @type string  $url          URL для ссылки
 *     @type string  $target       Атрибут target (_self, _blank, etc.)
 *     @type string  $icon         Название класса иконки (Font Awesome или другой)
 *     @type string  $icon_position Позиция иконки: 'left' или 'right'
 *     @type string  $size         Размер: 'small', 'medium', 'large'
 *     @type string  $class        Дополнительные CSS классы
 *     @type array   $attributes   Дополнительные HTML атрибуты
 *     @type string  $name         Атрибут name для input/button
 *     @type string  $value        Атрибут value для input
 *     @type bool    $disabled     Отключенное состояние
 *     @type bool    $fullwidth    Кнопка на всю ширину
 *     @type string  $rel          Атрибут rel для ссылок
 *     @type string  $aria_label   ARIA label для доступности
 * }
 */

$defaults = array(
    'type'         => 'button',
    'style'        => 'primary',
    'text'         => 'Кнопка',
    'url'          => '#',
    'target'       => '_self',
    'icon'         => '',
    'icon_position' => 'left',
    'size'         => 'small',
    'class'        => '',
    'attributes'   => array(),
    'name'         => '',
    'value'        => '',
    'disabled'     => false,
    'fullwidth'    => false,
    'rel'          => '',
    'aria_label'   => '',
);

// Объединяем параметры по умолчанию с переданными
$args = wp_parse_args($args, $defaults);

// Экранируем значения
$type         = esc_attr($args['type']);
$style        = esc_attr($args['style']);
$text         = esc_html($args['text']);
$url          = esc_url($args['url']);
$target       = esc_attr($args['target']);
$icon         = esc_attr($args['icon']);
$icon_position = in_array($args['icon_position'], ['left', 'right']) ? $args['icon_position'] : 'left';
$size         = esc_attr($args['size']);
$class        = esc_attr($args['class']);
$name         = esc_attr($args['name']);
$value        = esc_attr($args['value']);
$disabled     = (bool) $args['disabled'];
$fullwidth    = (bool) $args['fullwidth'];
$rel          = esc_attr($args['rel']);
$aria_label   = esc_attr($args['aria_label']);

// Формируем CSS классы
$button_classes = array(
    'button',
    'button--' . $style,
    'button--' . $size,
    $fullwidth ? 'button--fullwidth' : '',
    $icon ? 'button--with-icon' : '',
    $icon ? 'button--icon-' . $icon_position : '',
    $disabled ? 'button--disabled' : '',
    $class
);

// Убираем пустые значения и объединяем
$button_class = implode(' ', array_filter($button_classes));

// Формируем дополнительные атрибуты
$additional_attrs = '';
if (!empty($args['attributes']) && is_array($args['attributes'])) {
    foreach ($args['attributes'] as $attr => $val) {
        $additional_attrs .= ' ' . esc_attr($attr) . '="' . esc_attr($val) . '"';
    }
}

// Создаем иконку
$icon_html = '';
if ($icon) {
    $icon_html = '<span class="button__icon"><i class="' . $icon . '"></i></span>';
}

// Создаем контент кнопки
$content = '';
if ($icon && $icon_position === 'left') {
    $content .= $icon_html;
}
$content .= '<span class="button__text">' . $text . '</span>';
if ($icon && $icon_position === 'right') {
    $content .= $icon_html;
}

// Формируем основной HTML в зависимости от типа
switch ($type) {
    case 'link':
        $html = sprintf(
            '<a href="%s" class="%s" target="%s"%s%s%s>%s</a>',
            $url,
            $button_class,
            $target,
            $rel ? ' rel="' . $rel . '"' : '',
            $aria_label ? ' aria-label="' . $aria_label . '"' : '',
            $additional_attrs,
            $content
        );
        break;
    
    case 'input':
    case 'submit':
        $html = sprintf(
            '<input type="%s" class="%s" value="%s"%s%s%s%s />',
            $type === 'submit' ? 'submit' : 'button',
            $button_class,
            $text,
            $name ? ' name="' . $name . '"' : '',
            $value ? ' value="' . $value . '"' : '',
            $disabled ? ' disabled' : '',
            $additional_attrs
        );
        break;
    
    case 'button':
    default:
        $html = sprintf(
            '<button type="button" class="%s"%s%s%s%s>%s</button>',
            $button_class,
            $name ? ' name="' . $name . '"' : '',
            $value ? ' value="' . $value . '"' : '',
            $disabled ? ' disabled' : '',
            $additional_attrs,
            $content
        );
        break;
}

echo $html;
?>