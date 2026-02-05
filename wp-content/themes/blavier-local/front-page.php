<?php get_header(); ?>

<main class="site-main">
    <div class="activities-wrapper">

        <?php
        $activities = new WP_Query([
            'post_type'      => 'activity',
            'posts_per_page' => 9,
            'paged'          => get_query_var('paged') ?: 1,
        ]);
        ?>

        <?php if ($activities->have_posts()) : ?>
            <div class="activities-grid">

                <?php while ($activities->have_posts()) : $activities->the_post(); ?>

                    <?php get_template_part(
                        'template-parts/cards/card',
                        'activity'
                    ); ?>

                <?php endwhile; ?>

            </div>

            <?php
            the_posts_pagination([
                'total' => $activities->max_num_pages
            ]);
            ?>

        <?php else : ?>
            <p>Aucun événements.</p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

    </div>
</main>

<?php get_footer(); ?>
