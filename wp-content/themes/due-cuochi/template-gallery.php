<?php
/**
 * Template Name: Gallery Template
 */
get_header(); ?>
<section class="celebrate-banner news-banner gallery-section">
        <div class="container">
            <div class="news-heading">
                <h2><?php _e('GALERIA','due-cuochi'); ?></h2>
            </div>
        </div>
    </section>
<section class=gallery-wrapper>
    <div class="container">
    <?php
    $images = get_field('gallery');
    $page = isset($_GET['gpage']) ? (int)$_GET['gpage'] : 1;
    $per_page = 12;
    $pagination = paginate_array($images, $page, $per_page);

    if( $images ): ?>
        <ul class="grid">
            <li class="grid-sizer"></li>
            <?php foreach( $pagination['data'] as $image ): ?>
                <li class="grid-item">
                    <a data-fancybox="gallery" data-src="<?php echo esc_url($image['url']); ?>" href="<?php echo esc_url($image['url']); ?>">
                        <img src="<?php echo $image['url']; ?>" alt="gallery-img">
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php
        echo '<div class="pagination-block">';
            echo '<div class="pagination-wrapper">';
                for ($i = 1; $i <= $pagination['total_pages']; $i++) {
                    echo '<a class="page-numbers" href="?gpage=' . $i . '">' . $i . '</a> ';
                }
            echo '</div>';
        echo '</div>';
    endif; ?>
    </div>
</section>
<?php
get_footer();
