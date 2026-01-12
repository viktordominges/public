<?php get_header(); ?>

<main class="site-main">

    <div class="container">
        <h1>Blog</h1>

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <article class="post">
                    <h2><?php the_title(); ?></h2>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>">Lire la suite</a>
                </article>

            <?php endwhile; ?>

            <?php the_posts_pagination(); ?>

        <?php else : ?>
            <p>Aucun article.</p>
        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>
