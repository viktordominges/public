<?php get_header(); ?>

<?php $builder = get_field("builder") ;

var2console($builder);
?>

<main class="site-main">

    <?php
    if ( ! empty( $builder ) ) :
        foreach ( $builder as $section ) {
            if ( $section['acf_fc_layout'] == 'cta' ) {
                get_template_part('template-parts/builder/cta', null,  $section );
            }
            if ( $section['acf_fc_layout'] == 'text-simple' ) {
                get_template_part('template-parts/builder/text-simple', null,  $section );
            }
            if ( $section['acf_fc_layout'] == 'text-right-img' ) {
                get_template_part('template-parts/builder/text-right-img', null,  $section );
            }
            if ( $section['acf_fc_layout'] == 'text-double' ) {
                get_template_part('template-parts/builder/text-double', null,  $section );
            }
        }
    
    endif;
    ?>

</main>

<?php get_footer(); ?>
