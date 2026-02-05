<?php
$image = $args['image'] ?? null;
$year  = $args['year'] ?? '';
$title = $args['title'] ?? '';
$text  = $args['text'] ?? '';
?>

<div class="history-block">
    <div class="history-year">
        <?= esc_html($year); ?>
    </div>

    <div class="history-content">

        <?php if ($image) : ?>
            <div class="history-img">
                <?= wp_get_attachment_image(
                    $image['ID'],
                    'large',
                    false,
                    [
                        'class' => 'history-img__image',
                        'alt'   => esc_attr($image['alt'] ?: $title),
                    ]
                ); ?>
            </div>
        <?php endif; ?>

        <div class="history-description">
            <?php if ($title) : ?>
                <div class="history-title">
                    <?= esc_html($title); ?>
                </div>
            <?php endif; ?>

            <?php if ($text) : ?>
                <div class="history-text">
                    <?= wp_kses_post($text); ?>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>