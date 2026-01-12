<?php get_header(); ?>

<header class="site-header">
    <h2>Article – <?php the_title(); ?></h2>
</header>

<main class="site-main">
    <div class="container">
        <div class="content">

            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</main>

<?php get_footer(); ?>
