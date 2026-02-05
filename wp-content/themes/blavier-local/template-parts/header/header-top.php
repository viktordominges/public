<div class="header-top">
    <div class="container">
        <nav class="top-menu">

            <?php
            wp_nav_menu(array(
                'theme_location'  => 'header_top',
            ));

            get_button(array(
                'text' => 'Demandez votre catalogue ici',
                'style' => 'secondary',
                'url' => get_permalink(123),
                'class' => 'top-menu__button'
            ));

            get_button(array(
                'text' => 'Rendez-vous',
                'style' => 'primary',
                'url' => get_permalink(123),
                'class' => 'top-menu__button'
            ));
            ?>
        </nav>
    </div>
</div>
