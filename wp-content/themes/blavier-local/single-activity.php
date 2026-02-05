<?php
get_header();
?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>

        <div class="container">
            <article id="post-<?php the_ID(); ?>" <?php post_class('activity-single'); ?>>

                <!-- Featured Image -->
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="featured-image">
                        <?php the_post_thumbnail('large', [
                            'class' => 'img-fluid featured',
                            'alt' => get_the_title(),
                            'loading' => 'lazy',
                        ]); ?>

                        <div class="meta-info">
                            <?php
                            // Дата и время события (ACF)
                            if ( $date = get_field('date') ) :
                                $dateObj = DateTime::createFromFormat('Ymd', $date);
                                $formattedDate = $dateObj->format('d M Y');

                                if ( $time = get_field('time') ) {
                                    $formattedDate .= ' — ' . esc_html($time);
                                }

                                echo '<span class="date">' . esc_html($formattedDate) . '</span> - ';
                            endif;

                            // Автор
                            echo '<span class="author">Author: ' . esc_html(get_the_author()) . '</span> - ';

                            // Категории
                            $categories = get_the_category();
                            if ( $categories ) {
                                $cat_links = array_map(function($cat) {
                                    return '<a href="' . esc_url(get_category_link($cat->term_id)) . '">' . esc_html($cat->name) . '</a>';
                                }, $categories);

                                echo '<span class="category-link">' . implode(', ', $cat_links) . '</span>';
                            }
                            ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- City / Address -->
                <div class="activity-meta">
                    <?php if ( $city = get_field('city') ) : ?>
                        <div class="activity-city">City: <?= esc_html($city) ?></div>
                    <?php endif; ?>

                    <?php if ( $address = get_field('address') ) : ?>
                        <div class="activity-address">Address: <?= esc_html($address) ?></div>
                    <?php endif; ?>
                </div>

                <!-- Content -->
                <div class="post-content">
                    <?php the_content(); ?>
                </div>

                <!-- Tags -->
                <?php
                $tags = get_the_tags();
                if ( $tags ) : ?>
                    <div class="tag-chips">
                        <?php foreach ( $tags as $tag ) : ?>
                            <a href="<?= esc_url(get_tag_link($tag)) ?>" class="chip">
                                <?= esc_html($tag->name) ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Navigation между событиями CPT -->
                <div class="activity-navigation">
                    <div class="nav-prev">
                        <?php previous_post_link('%link', '← Précédent', true); ?>
                    </div>
                    <div class="nav-next">
                        <?php next_post_link('%link', 'Suivant →', true); ?>
                    </div>
                </div>

            </article>
        </div>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>

