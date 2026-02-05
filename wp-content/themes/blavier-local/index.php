<?php get_header(); ?>

<main class="site-main">
    <div class="container">

        <!-- <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article>
                    <?php the_post_thumbnail( 'large', array(
                            'class' => 'img-fluid featured',
                            'alt'   => get_the_title(),
                            'loading' => 'lazy',
                    )); ?>
                    <h2><?php the_title(); ?></h2>
                    <?php the_excerpt(); ?>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p>Aucun contenu trouvé.</p>
        <?php endif; ?> -->

    </div>
</main>

<?php get_footer(); ?>

