<?php
/* Template Name: FAQ Page */
get_header();
?>

<main class="page-faq">

    <h1><?php the_title(); ?></h1>

    <?php if ( have_rows('faq_items') ): ?>
        <section class="faq-accordion">

            <?php while ( have_rows('faq_items') ): the_row(); ?>

                <div class="faq-item">
                    <button class="faq-question">
                        <?php the_sub_field('question'); ?>
                    </button>

                    <div class="faq-answer">
                        <?php the_sub_field('answer'); ?>
                    </div>
                </div>

            <?php endwhile; ?>

        </section>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
