<?php
/**
 * Универсальный компонент Button
 *
 * Параметры через $args:
 *  type, style, text, url, target, icon, icon_position, size,
 *  class, attributes, name, value, disabled, fullwidth, rel, aria_label
 */

$defaults = [
    'type'          => 'button',
    'style'         => 'primary',
    'text'          => 'Button',
    'url'           => '#',
    'target'        => '_self',
    'icon'          => '',
    'icon_position' => 'left',
    'size'          => 'small',
    'class'         => '',
    'attributes'    => [],
    'name'          => '',
    'value'         => '',
    'disabled'      => false,
    'fullwidth'     => false,
    'rel'           => '',
    'aria_label'    => '',
];

// Объединяем с переданными аргументами
$args = wp_parse_args( $args ?? [], $defaults );

// Экранируем значения
$type          = esc_attr( $args['type'] );
$style         = esc_attr( $args['style'] );
$text          = esc_html( $args['text'] );
$url           = esc_url( $args['url'] );
$target        = esc_attr( $args['target'] );
$icon          = esc_attr( $args['icon'] );
$icon_position = in_array( $args['icon_position'], ['left','right'] ) ? $args['icon_position'] : 'left';
$size          = esc_attr( $args['size'] );
$class         = esc_attr( $args['class'] );
$name          = esc_attr( $args['name'] );
$value         = esc_attr( $args['value'] );
$disabled      = (bool) $args['disabled'];
$fullwidth     = (bool) $args['fullwidth'];
$rel           = esc_attr( $args['rel'] );
$aria_label    = esc_attr( $args['aria_label'] );

// CSS классы кнопки
$button_classes = array_filter([
    'button',
    "button--$style",
    "button--$size",
    $fullwidth ? 'button--fullwidth' : '',
    $icon ? 'button--with-icon' : '',
    $icon ? "button--icon-$icon_position" : '',
    $disabled ? 'button--disabled' : '',
    $class,
]);

$button_class = implode(' ', $button_classes);

// Дополнительные атрибуты
$additional_attrs = '';
if ( ! empty( $args['attributes'] ) && is_array( $args['attributes'] ) ) {
    foreach ( $args['attributes'] as $attr => $val ) {
        $additional_attrs .= ' ' . esc_attr( $attr ) . '="' . esc_attr( $val ) . '"';
    }
}

// Иконка
$icon_html = $icon ? '<span class="button__icon"><i class="' . $icon . '"></i></span>' : '';

// Контент кнопки
$content = ($icon && $icon_position === 'left' ? $icon_html : '') .
           '<span class="button__text">' . $text . '</span>' .
           ($icon && $icon_position === 'right' ? $icon_html : '');

// Генерируем HTML в зависимости от типа
switch ( $type ) {

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
