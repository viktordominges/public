<?php get_header(); ?>

<main class="site-main">
    <div class="activities-wrapper">
        <?php if (have_posts()) : ?>
            <div class="activities-grid">

                <?php while (have_posts()) : the_post(); ?>

                    <?php
                    get_template_part(
                        'template-parts/cards/card',
                        'activity'
                    );
                    ?>

                <?php endwhile; ?>

            </div>

            <?php the_posts_pagination(); ?>

        <?php else : ?>
            <p>Aucun événements.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
