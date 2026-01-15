<div class="header-top">
    <div class="container">
        <nav class="top-menu">
            <ul>
                <li><a href="/projects-for-sale">Projets en vente</a></li>
                <li><a href="/contacts">Contact</a></li>
                <li><a href="/blog">Blog</a></li>
                <li><a href="/faq">FAQ</a></li>
            </ul>
            <?php

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
