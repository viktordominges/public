<?php
$args = $args ?? [];

// Если передали через args → используем
if ($args) {
    $cta = $args;
}
// Если на странице есть override → используем
elseif (get_field('custom_cta') && get_field('cta_override')) {
    $cta = get_field('cta_override');
}
// Иначе — fallback глобальный CTA
else {
    $cta = get_field('cta_block', 'option');
}

$title    = $cta['title'] ?? '';
$subtitle = $cta['subtitle'] ?? '';
$link     = $cta['link'] ?? [];

$link_title  = $link['title'] ?? '';
$link_url    = $link['url'] ?? '#';
$link_target = $link['target'] ?? '_self';
$link_rel    = $link['rel'] ?? '';


?>

<section class="cta">
    <div class="container">
        <div class="cta-wrapper">
            <!-- Иконка -->
            <div class="cta-icon">
                <img src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/images/cta-icon.png') ?>" alt="CTA Icon" />
            </div>

            <!-- Текст CTA -->
            <div class="cta-text-wrapper">
                <?php if ( $title ) : ?>
                    <h2 class="cta-title"><?= esc_html( $title ) ?></h2>
                <?php endif; ?>

                <?php if ( $subtitle ) : ?>
                    <p class="cta-subtitle"><?= esc_html( $subtitle ) ?></p>
                <?php endif; ?>
            </div>

            <!-- Кнопка CTA -->
            <?php if ( $link_title && $link_url ) : ?>
                <div class="cta-button">
                    <?php
                    get_button([
                        'type'   => 'link',           // Используем ссылку
                        'text'   => esc_html( $link_title ) . '  ›',
                        'url'    => esc_url( $link_url ),
                        'target' => esc_attr( $link_target ),
                        'rel'    => esc_attr( $link_rel ),
                        'style'  => 'secondary',
                        'size'   => 'medium',
                        'class'  => 'cta-button',
                    ]);
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <a class="cta-cover-link" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>" rel="<?= esc_attr( $link_rel ); ?>"></a>

</section>
