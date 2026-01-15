<?php
/* Template Name: FAQ Page */
get_header();
?>

<main class="page-faq">

    <h1><?php the_title(); ?></h1>
    <p>This is the FAQ page</p>


    <?php
    // Простая основная кнопка
    get_button(array(
        'text' => 'Купить сейчас',
        'style' => 'primary',
        'url' => get_permalink(123)
    ));

    // Кнопка с иконкой слева
    get_button(array(
        'type' => 'link',
        'text' => 'Скачать PDF',
        'style' => 'success',
        'icon' => 'fas fa-download',
        'icon_position' => 'left',
        'url' => '#',
        'target' => '_blank'
    ));

    // Большая опасная кнопка с иконкой справа
    get_button(array(
        'text' => 'Удалить',
        'style' => 'danger',
        'size' => 'large',
        'icon' => 'fas fa-trash',
        'icon_position' => 'right',
        'class' => 'delete-button'
    ));

    // Input типа submit
    get_button(array(
        'type' => 'submit',
        'text' => 'Отправить форму',
        'style' => 'primary',
        'name' => 'submit_form',
        'value' => 'send'
    ));

    // Кнопка на всю ширину
    get_button(array(
        'text' => 'Получить консультацию',
        'style' => 'warning',
        'fullwidth' => true,
        'url' => get_permalink(456)
    ));

    // Кнопка с дополнительными атрибутами
    get_button(array(
        'text' => 'Модальное окно',
        'style' => 'secondary',
        'attributes' => array(
            'data-toggle' => 'modal',
            'data-target' => '#exampleModal',
            'data-id' => '123'
        )
    ));

    // Отключенная кнопка
    get_button(array(
        'text' => 'Недоступно',
        'style' => 'dark',
        'disabled' => true
    ));

    $disabled_button_html = get_button_html(array(
        'text' => 'Недоступно (HTML)',
        'style' => 'dark',
        'disabled' => true
    ));

    ?>


    <?= $disabled_button_html; ?>

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
