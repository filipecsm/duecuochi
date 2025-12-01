<?php
/**
 * Template Name: Trattoria Template
 */
get_header();

$banner_img = get_field('banner_image');
$banner_text = get_field('banner_text');

if ($banner_img): ?>
    <section class="celebrate-banner event-main-banner trattoria-banner" 
        <?php 
        if ($banner_img) { ?>
            style="background-image:url('<?php echo $banner_img; ?>')" <?php 
            } ?>>
        <div class="container">
            <?php
            if ($banner_text): ?>
                <div class="event-heading">
                    <h2><?php echo $banner_text; ?></h2>
                </div>
                <?php
            endif; ?>
        </div>
    </section>
    <?php
endif; ?>
<section class="gastronomic-event memorable-event trattoria-event">
    <div class="container">
        <div class="trattoria-mobile-tabbing reservation-place">
            <?php
            if (have_rows('trat_contact_info')): ?>
                <ul class="mobile-icon">
                    <?php
                    while (have_rows('trat_contact_info')):
                        the_row();
                        $icon = get_sub_field('icon'); ?>
                        <li class="mobile-tabbing"><a href="#tab-<?php echo get_row_index(); ?>"
                                class="trattoria-icon phone-icon">
                                <?php echo wp_get_attachment_image($icon, 'full'); ?></a>
                        </li>
                        <?php
                    endwhile; ?>
                </ul>
                <?php
            endif; ?>
            <div class="trattoria-icon-content tabs-stage">
                <?php
                if (have_rows('trat_contact_info')):
                    while (have_rows('trat_contact_info')):
                        the_row();
                        $title = get_sub_field('title');
                        $address = get_sub_field('address');
                        $button = get_sub_field('button'); ?>
                        <div class="trattoria-mobile-tab tabbing-wrap" id="tab-<?php echo get_row_index(); ?>">
                            <h3><?php echo $title; ?></h3>
                            <div class="event-address">
                                <?php
                                if ($address):
                                    echo $address;
                                endif;
                                if ($button): ?>
                                    <a href="<?php echo $button['url']; ?>" class="know-btn">
                                        <?php echo $button['title']; ?>
                                    </a>
                                    <?php
                                endif; ?>
                            </div>
                        </div>
                        <?php
                    endwhile;
                endif; ?>
            </div>
        </div>
        <?php
        if (have_rows('trat_link_repeater')): ?>
            <ul class="trattoria-menu">
                <?php
                while (have_rows('trat_link_repeater')):
                    the_row();
                    $link = get_sub_field('link');
                    if ($link): ?>
                        <li><a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></li>
                        <?php
                    endif;
                endwhile; ?>
            </ul>
            <?php
        endif; ?>
        <?php
        if (have_rows('trat_contact_info')): ?>
            <div class="reservation-place">
                <?php
                while (have_rows('trat_contact_info')):
                    the_row();
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title');
                    $address = get_sub_field('address');
                    $button = get_sub_field('button'); ?>
                    <div class="reservation-wrap-block">
                        <?php
                        if ($icon): ?>
                            <div class="phone-icon">
                                <?php echo wp_get_attachment_image($icon, 'full'); ?>
                            </div>
                            <?php
                        endif;
                        if ($title): ?>
                            <h3><?php echo $title; ?></h3>
                            <?php
                        endif; ?>
                        <div class="event-address">
                            <?php
                            if ($address):
                                echo $address;
                            endif;
                            if ($button): ?>
                                <a href="<?php echo $button['url']; ?>" class="know-btn">
                                    <?php echo $button['title']; ?>
                                </a>
                                <?php
                            endif; ?>
                        </div>
                    </div>
                    <?php
                endwhile; ?>
            </div>
            <?php
        endif; ?>
    </div>
</section>
<?php
$trat_bg_img = get_field('trat_background_image');
$trat_heading = get_field('trat_heading');
$trat_content = get_field('trat_content');
?>
<section class="event-banner trattoria" id="event-trattoria" <?php if ($trat_bg_img) { ?>
        style="background-image:url('<?php echo $trat_bg_img; ?>')" <?php } ?>>
    <div class="container">
        <div class="choose-container">
            <div class="event-content">
                <?php
                if ($trat_heading): ?>
                    <h2><?php echo $trat_heading; ?></h2>
                    <?php
                endif;
                if ($trat_content):
                    echo $trat_content;
                endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="cardapio" id="cardapio-section">
    <div class="container">
        <div class="cardapio-wrapper">
            <h2><?php _e('CARDÁPIO', 'due-cuochi'); ?></h2>
            <div class="cardaio-slider-block">
                <div class="menu-slider">
                    <?php
                    if (have_rows('cardapio_main_menu_repeater')): ?>
                        <ul class="primary-cardapio">
                            <?php
                            $n = 1;
                            while (have_rows('cardapio_main_menu_repeater')): the_row();
                                $main_menu = get_sub_field('main_menu');?>
                        
                                <li class="cardapio-tabbing <?php echo ($n == 1) ? 'active-tab' : ''; ?>">
                                    <a href="#c-tab-<?php echo get_row_index(); ?>" class="category-link" data-cat="<?php echo get_row_index(); ?>">
                                        <?php echo $main_menu; ?>
                                    </a>
                                </li>

                                <?php
                                $n++;
                            endwhile; ?>
                        </ul>
                        <?php
                    endif;
                    if (have_rows('cardapio_main_menu_repeater')):
                        $n = 1;
                        while (have_rows('cardapio_main_menu_repeater')): the_row();?>
                            <div class="ul-wrap <?php echo ($n != 1) ? 'hide-class' : ''; ?>" id="c-tab-<?php echo get_row_index(); ?>">
                                <?php
                                if (have_rows('sub_menu_repeater')): ?>
                                    <ul class="cardapio-post-list">
                                        <?php
                                        $p=1;
                                        while (have_rows('sub_menu_repeater')): the_row();
                                            $sub_menu = get_sub_field('sub_menu');?>
                                            <li class="<?php echo ($p==1) ? 'active-post' : ''; ?>">
                                                <a href="#c-tab-<?php echo $n.'-'.$p ?>"><?php echo $sub_menu; ?></a>
                                            </li>
                                        <?php
                                        $p++;
                                        endwhile; ?>
                                    </ul>
                                    <?php
                                endif;?>
                            </div>
                            <?php
                            $n++;
                        endwhile;
                    endif;
                    if (have_rows('cardapio_main_menu_repeater')):
                        $r=1;
                        while (have_rows('cardapio_main_menu_repeater')): the_row();
                            if (have_rows('sub_menu_repeater')):
                                $content_id = 1;
                                while (have_rows('sub_menu_repeater')): the_row();?>
                                    <div data-r="<?php echo $r;?>" data-id="<?php echo $r.'-'.$content_id;?>" 
                                        id="c-tab-<?php echo $r.'-'.$content_id;?>" class="cardapio-post-list post-tabs 
                                        <?php echo ($content_id == 1 && $r==1) ? '' : 'hide-cat'; ?>">
                                        <div class="repeat cardapio-wrap mobile-cardapio">
                                            <div class="cardapio-content">
                                                <?php
                                                if (have_rows('content_repeater')):
                                                    while (have_rows('content_repeater')):
                                                        the_row();
                                                        $title = get_sub_field('title');
                                                        $content = get_sub_field('content'); ?>
                                                        <div class="cardapio-content-wrapper">
                                                            <?php
                                                            if ($title): ?>
                                                                <h3><?php echo $title; ?></h3>
                                                                <?php
                                                            endif;
                                                            if ($content): ?>
                                                                <p><?php echo $content; ?></p>
                                                                <?php
                                                            endif; ?>
                                                        </div>
                                                        <?php
                                                    endwhile;
                                                endif; ?>
                                            </div>
                                        </div>
                                        <div class="repeat cardapio-wrap desktop-cardapio 
                                            cardapio-carousel owl-carousel owl-theme">
                                            <div class="cardapio-content">
                                                <?php
                                                if (have_rows('content_repeater')):
                                                    while (have_rows('content_repeater')):
                                                        the_row();
                                                        $title = get_sub_field('title');
                                                        $content = get_sub_field('content'); ?>
                                                        <div class="cardapio-content-wrapper">
                                                            <?php
                                                            if ($title): ?>
                                                                <h3><?php echo $title; ?></h3>
                                                                <?php
                                                            endif;
                                                            if ($content): ?>
                                                                <p><?php echo $content; ?></p>
                                                                <?php
                                                            endif; ?>
                                                        </div>
                                                        <?php
                                                    endwhile;
                                                endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                $content_id++;
                                endwhile;
                            endif;
                            $r++;
                        endwhile;
                    endif;?>
                </div>
            </div>
            <div class="cardapio-bottom">
                <div class="download-menu"><?php $cardapio_url = get_field("cardapio_buttom"); ?><a href="<?php echo $cardapio_url; ?>" class="know-btn" target="_blank"><?php _e( 'Download do Cardápio Completo', 'due-cuochi' ); ?></a>
                </div>
                <p><?php _e( '* Exclusividade da Unidade', 'due-cuochi' ); ?></p>
            </div>
        </div>
    </div>
    <div class="mobile-menu-slider cardapio-mobile-slider">
        <?php
        if (have_rows('trat_mobile_slider')): ?>
            <div class="restaurant-slider owl-carousel owl-theme due-slider">
                <?php
                while (have_rows('trat_mobile_slider')):
                    the_row();
                    $image = get_sub_field('image');
                    if ($image): ?>
                        <div class="slide">
                            <?php echo wp_get_attachment_image($image, 'full'); ?>
                        </div>
                        <?php
                    endif;
                endwhile; ?>
            </div>
            <?php
        endif; ?>
    </div>
</section>
<?php
$exec_bg_img = get_field('exec_background_image');
$exec_main_title = get_field('exec_main_title');
$exec_sub_title = get_field('exec_sub_title');
$exec_note = get_field('exec_note');
$exec_button = get_field('exec_button');
$exec_validity = get_field('exec_validity'); ?>
<section class="executivo-section-wrapper" id="executivo-section" <?php if ($exec_bg_img) { ?>
        style="background-image:url('<?php echo $exec_bg_img; ?>')" <?php } ?>>
    <div class="container">
        <div class="executive-bg">
            <div class="executivo-section">
                <?php
                if ($exec_main_title): ?>
                    <h2><?php echo $exec_main_title; ?></h2>
                    <?php
                endif;
                if ($exec_sub_title): ?>
                    <span class="subtitle"><?php echo $exec_sub_title; ?></span>
                    <?php
                endif;
                if ($exec_note): ?>
                    <span class="exec-note"><?php echo $exec_note; ?></span>
                    <?php
                endif; ?>
                <?php
                if (have_rows('executivo_slider')): ?>
                    <div class="executivo-slider owl-carousel owl-theme" id="executive-slider">
                        <?php
                        while (have_rows('executivo_slider')):
                            the_row();
                            $title = get_sub_field('title');
                            $content = get_sub_field('content');
                            $box_title = get_sub_field('box_title');
                            $box_content = get_sub_field('box_content'); ?>
                            <div class="executive-slide">
                                <?php
                                if ($title): ?>
                                    <span class="subtitle"><?php echo $title; ?></span>
                                    <?php
                                endif;
                                if ($content):
                                    echo $content;
                                endif; ?>
                                <div class="box-content-wrapper">
                                    <?php
                                    if ($box_title): ?>
                                        <span class="subtitle"><?php echo $box_title; ?></span>
                                        <?php
                                    endif;
                                    if ($box_content):
                                        echo $box_content;
                                    endif; ?>
                                </div>
                            </div>
                            <?php
                        endwhile; ?>
                    </div>
                    <?php
                endif;
                if ($exec_button): ?>
                    <a class="know-btn" href="<?php echo $exec_button['url']; ?>">
                        <?php echo $exec_button['title']; ?>
                    </a>
                    <?php
                endif;
                if ($exec_validity): ?>
                    <p class="exec-validity exec-note"><?php echo $exec_validity; ?></p>
                    <?php
                endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="trattoria-slider" id="ambient-section">
    <div class="container-wrapper">
        <div class="container">
            <div class="restaurant history">
                <div class="restaurant-content">
                    <?php
                    $trattoria_title = get_field('trattoria_title');
                    $trattoria_content = get_field('trattoria_content');
                    $trattoria_button = get_field('trattoria_button');

                    if ($trattoria_title): ?>
                        <h2 class="history-title restaurant-title">
                            <?php echo $trattoria_title; ?>
                        </h2>
                        <?php
                    endif;
                    if ($trattoria_content):
                        echo $trattoria_content;
                    endif; ?>
                    <div class="trattoria-slider-btn">
                        <?php
                        if ($trattoria_button): ?>
                            <a class="know-btn"
                                href="<?php echo $trattoria_button['url']; ?>">
                                    <?php echo $trattoria_button['title']; ?>
                                </a>
                            <?php
                        endif; ?>
                    </div>
                </div>
            </div>
            <div class="custom-trattoria mobile-slider">
                <?php
                if (have_rows('trattoria_slider')): ?>
                    <div class="owl-theme owl-carousel due-slider">
                        <?php
                        while (have_rows('trattoria_slider')):
                            the_row();
                            $image = get_sub_field('image');
                            if ($image): ?>
                                <div class="slide-item">
                                    <?php echo wp_get_attachment_image($image, 'full'); ?>
                                </div>
                                <?php
                            endif;
                        endwhile; ?>
                    </div>
                    <?php
                endif; ?>
            </div>
        </div>
    </div>
    <div class="mobile-slider trattoria-bottom">
        <?php
        if (have_rows('trattoria_slider')): ?>
            <div class="restaurant-slider owl-carousel owl-theme due-slider">
                <?php
                while (have_rows('trattoria_slider')):
                    the_row();
                    $image = get_sub_field('image');
                    if ($image): ?>
                        <div class="slide">
                            <?php echo wp_get_attachment_image($image, 'full'); ?>
                        </div>
                        <?php
                    endif;
                endwhile; ?>
            </div>
            <?php
        endif; ?>
    </div>
    <div class="container">
        <div class="trattoria-slider-btn trattoria-mobile-btn">
            <?php
            if ($trattoria_button): ?>
                <a class="know-btn"
                    href="<?php echo $trattoria_button['url']; ?>"><?php echo $trattoria_button['title']; ?></a>
                <?php
            endif; ?>
        </div>
    </div>
</section>
<section class="eventos-section trattoria-slider">
    <div class="container">
        <?php
        $eve_main_title = get_field('eve_main_title');
        $eve_sub_title = get_field('eve_sub_title');
        $eve_content = get_field('eve_content');
        $eve_button = get_field('eve_button'); ?>
        <div class="trattoria-events executivo-section">
            <?php
            if ($eve_main_title): ?>
                <h2><?php echo $eve_main_title; ?></h2>
                <?php
            endif;
            if ($eve_sub_title): ?>
                <p class="subtitle"><?php echo $eve_sub_title; ?></p>
                <?php
            endif;
            if ($eve_content):
                echo $eve_content;
            endif;
            if ($eve_button): ?>
                <a class="know-btn" href="<?php echo $eve_button['url']; ?>"><?php echo $eve_button['title']; ?></a>
                <?php
            endif; ?>
        </div>
    </div>
</section>
<section class="bottom-slider mobile-slider">
    <div class="container-wrapper">
        <div class="container">
            <div class="trattoria-gallery">
                <?php
                if (have_rows('trat_bottom_slider')): ?>
                    <div class="owl-carousel owl-theme gallery-slider">
                        <?php
                        while (have_rows('trat_bottom_slider')):
                            the_row();
                            $image = get_sub_field('image');
                            if ($image): ?>
                                <div class="slide-list">
                                    <?php echo wp_get_attachment_image($image, 'full'); ?>
                                </div>
                                <?php
                            endif;
                        endwhile; ?>
                    </div>
                    <?php
                endif; ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();