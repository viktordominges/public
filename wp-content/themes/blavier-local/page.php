<!-- Максимально нейтральная структура файла page.php для темы WordPress: -->

<?php get_header(); ?>

<main class="site-main">

    <?php
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    ?>


    <?php
    if (function_exists('theme_builder')) {
        theme_builder();
    }
    ?>
</main>

<?php get_footer(); ?>
