<section class="cta">
    <div class="container">
        <div class="cta-wrapper">
            <div class="cta-icon">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cta-icon.png" />
            </div>
            <div class="cta-text">
                <h2><?= $args['title'] ?></h2>
                <p><?= $args['subtitle'] ?>t</p>
            </div>
            <div class="cta-button">
                <?php

                get_button(array(
                    'type' => 'link',
                    'text' => $args['link']['title'] . ' >',
                    'style' => 'secondary',
                    'size' => 'medium',
                    'class' => 'cta-button',
                    'url' => $args['link']['url'],
                ));
                ?>
            </div>
    
        </div>
    </div>
</section>