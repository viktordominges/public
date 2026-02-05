<div class="header-midle">
    <div class="container">
        <nav class="midle-menu">
            <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Blavier_HNY.png" alt="<?php bloginfo('name'); ?>">
                </a>
            </div>

            <?php
            wp_nav_menu(array(
                'theme_location'  => 'header_middle',
                'container'       => false,
            ));
            ?>
        </nav>
    </div>
</div>