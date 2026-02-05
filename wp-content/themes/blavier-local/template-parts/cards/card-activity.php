<article class="activity-card">

    <a href="<?php the_permalink(); ?>">

        <?php if (has_post_thumbnail()) : ?>
            <div class="activity-card__image">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>

        <div class="activity-card__content">

            <h3 class="activity-card__title">
                <?php the_title(); ?>
            </h3>

            <?php if ($city = get_field('city')) : ?>
                <div class="activity-card__city">
                    <?php echo esc_html($city); ?>
                </div>
            <?php endif; ?>

            <?php if ($date = get_field('date')) : ?>

                <div class="activity-card__date">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </div>

                    <div>
                        <?php
                        $dateObj = DateTime::createFromFormat('Ymd', $date);
                        $formattedDate = $dateObj->format('d/m/Y');

                        $time = get_field('time');

                        echo esc_html($formattedDate);

                        if ($time) {
                            echo ' - ' . esc_html(str_replace(':', 'h', $time));
                        }
                        ?>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ($address = get_field('address')) : ?>
                <div class="activity-card__address">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path d="M565.6 36.2C572.1 40.7 576 48.1 576 56l0 336c0 10-6.2 18.9-15.5 22.4l-168 64c-5.2 2-10.9 2.1-16.1 .3L192.5 417.5l-160 61c-7.4 2.8-15.7 1.8-22.2-2.7S0 463.9 0 456L0 120c0-10 6.1-18.9 15.5-22.4l168-64c5.2-2 10.9-2.1 16.1-.3L383.5 94.5l160-61c7.4-2.8 15.7-1.8 22.2 2.7zM48 136.5l0 284.6 120-45.7 0-284.6L48 136.5zM360 422.7l0-285.4-144-48 0 285.4 144 48zm48-1.5l120-45.7 0-284.6L408 136.5l0 284.6z"></path>
                        </svg>
                    </div>
                    <div>
                        <?php echo esc_html($address); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php
            // Краткое описание
            if ($excerpt = get_the_excerpt()) :
            ?>
                <div class="activity-card__description">
                    <?= esc_html($excerpt); ?>
                </div>
            <?php endif; ?>
            

        </div>
    </a>
</article>

