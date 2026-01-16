<?php
/* Template Name: FAQ Page */
get_header();
?>

<?php $accordion = get_field("accordion-item") ;

var2console($accordion);
?>

<main class="page-faq">
    <div class="container">
        <div class="accordion">
            <?php
            if ( ! empty( $accordion ) ) :
                foreach ( $accordion as $section ) {
                    get_template_part('template-parts/accordion/accordion-faq', null,  $section );
                }
            endif;
            ?>
        </div> 
    </div>  
</main>

<?php get_footer(); ?>
