<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- add font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<section class="site-header">
    <?php get_template_part('template-parts/header/header', 'top'); ?>
    <?php get_template_part('template-parts/header/header', 'midle'); ?>
    <?php if ( ! is_front_page() && ! is_404() ) : ?>
        <?php get_template_part('template-parts/header/header', 'bottom'); ?>
    <?php endif; ?>
</section>