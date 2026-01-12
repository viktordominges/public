<?php get_header(); ?>

<main class="site-main">

    <div class="container">
        <section class="features">
            <h2>Nos avantages</h2>
            <!-- ACF / блоки / кастом -->
        </section>

        <section class="latest-posts">
            <h2>Derniers articles</h2>

            <?php
            $query = new WP_Query([
                'post_type'      => 'post',
                'posts_per_page' => 3
            ]);
            ?>

            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <article>
                        <h3><?php the_title(); ?></h3>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>">Lire</a>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </section>
    </div>

</main>

<?php get_footer(); ?>