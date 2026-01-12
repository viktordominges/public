<?php
/*
Template Name: Container Small
*/

get_header(); ?>

<header class="site-header">
    <h2>Page-<?php the_title(); ?></h2>
</header>

<main class="site-main">
    <div class="container-small">
        <div class="content"><?php the_content(); ?></div>
    </div>
</main>

<?php get_footer(); ?>