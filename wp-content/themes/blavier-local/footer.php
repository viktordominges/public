<footer class="site-footer">
    <div class="container">
        <div class="footer-menu__wrapper">
            <div>
                <div class="footer-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blavier_logo_inverted.png" alt="<?php bloginfo('name'); ?>">
                    </a>
                </div>

                <?php if (have_rows('social_media', 'option')): ?>
                    <div class="footer-social-media">
                        <?php while (have_rows('social_media', 'option')): the_row();
                            $icon = get_sub_field('icon');
                            $url  = get_sub_field('url');
                        ?>

                            <?php if ($url): ?>
                                <a href="<?= esc_url($url); ?>" target="_blank" rel="noopener">
                                    <i class="fab fa-<?= esc_attr($icon); ?>"></i>
                                </a>
                            <?php endif; ?>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

            </div>
            <?php get_template_part('template-parts/footer/footer-menu', '1'); ?>
            <?php get_template_part('template-parts/footer/footer-menu', '2'); ?>
        </div>

        <div class="footer-divider"></div>
        <div class="footer-copyright">
            © <?php echo date('Y'); ?> My Website. All rights reserved.
        </footer>
    </div>
<?php wp_footer(); ?>
</body>
</html>