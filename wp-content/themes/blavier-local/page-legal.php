<?php
/*
Template Name: Page Legal
*/
get_header();
?>

<main class="site-main">
    <div class="container">
        <article class="legal-content">

            <?php
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
            ?>

        </article>
    </div>

    <?php
    if (function_exists('theme_builder')) {
        theme_builder();
    }
    ?>

    <?php get_template_part('template-parts/global/cta'); ?>

</main>

<?php get_footer(); ?>