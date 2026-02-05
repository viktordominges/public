<?php
$image = $args['image'] ?? null;
$title = $args['title'] ?? '';
$text  = $args['text'] ?? '';
?>
 
<div class="hero-block">

    <div class="hero-content">

        <?php if ($title) : ?>
            <div class="hero-title">
                <?= esc_html($title); ?>
            </div>
        <?php endif; ?>

        <div class="hero-divider"></div>

        <?php if ($text) : ?>
            <div class="hero-text">
                <?= wp_kses_post($text); ?>
            </div>
        <?php endif; ?>

    </div>

    <?php if ($image) : ?>
        <div class="hero-img">
            <?= wp_get_attachment_image(
                $image['ID'],
                'large',
                false,
                [
                    'class' => 'hero-img__image',
                    'alt'   => esc_attr($image['alt'] ?: $title),
                ]
            ); ?>
        </div>
    <?php endif; ?>

</div>