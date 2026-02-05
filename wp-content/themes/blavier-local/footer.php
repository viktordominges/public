<footer class="site-footer">
    <div class="container">
        <div class="footer-menu__wrapper">
            <div>
                <div class="footer-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blavier_logo_inverted.png" alt="<?php bloginfo('name'); ?>">
                    </a>
                </div>
                <div class="footer-sicial-media">
                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                    <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                </div>
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