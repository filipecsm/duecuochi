<?php
    $terms = get_terms(array(
        'taxonomy' => 'cardapio-cat',
        'hide_empty' => false,
    ));
    if (!empty($terms) && !is_wp_error($terms)) : ?>
    <ul>
        <?php
        foreach ($terms as $term) : ?>
            <li>
                <a href="<?php echo esc_url(get_term_link($term)); ?>" class="category-link">
                    <span class="category-item"><?php echo esc_html($term->name); ?></span>
                </a>
                <?php
                 $query = new WP_Query(array(
                    'post_type' => 'cardapio',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'cardapio-cat',
                            'field'    => 'term_id',
                            'terms'    => $term->term_id,
                        ),
                    ),
                ));
                if ($query->have_posts()) : ?>
                    <ul class="post-list">
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <li>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <div class="content">
                                    <?php
                                    if( have_rows('post_content_repeater') ):
                                        while( have_rows('post_content_repeater') ): the_row();
                                            $title = get_sub_field('title');
                                            $content = get_sub_field('content');
                                            if($title): ?>
                                                <h3><?php echo $title; ?></h3>
                                                <?php
                                            endif;
                                            if($content): ?>
                                                <p><?php echo $content; ?></p>
                                                <?php
                                            endif;
                                        endwhile;
                                    endif;?>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php
                endif;
                wp_reset_postdata();?>
            </li>
            <?php
        endforeach;?>
    </ul>
        <?php
    endif; ?>