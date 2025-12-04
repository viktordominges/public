<?php get_header(); ?>

<body <?php body_class(); ?>>
    <header class="site-header"> 
        <h2><?php the_title(); ?></h2>
    </header>
    <div class="container">
        <div class="content"><?php the_content(); ?></div>
    </div>
</body> 

<?php get_footer(); ?>