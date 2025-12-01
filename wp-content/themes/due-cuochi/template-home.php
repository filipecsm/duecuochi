<?php
/**
 * Template Name: Template Home
 */
get_header();

$banner_img = get_field('banner_image');
$banner_sub_title = get_field('banner_sub_title');
$due = get_field('due');
$banner_content = get_field('banner_content');?>

<section class="banner" <?php if($banner_img){ ?> style="background-image:url('<?php echo $banner_img; ?>')" <?php } ?>>
    <div class="container">
        <?php
        if($banner_sub_title): ?>
            <span class="establish"><?php echo $banner_sub_title; ?></span>
        <?php
        endif;
        if($due): ?>
        <div class="title title-image">
            <?php echo wp_get_attachment_image($due, 'full'); ?>
        </div>
            <?php
        endif;
        if($banner_content): ?>
            <span class="dish establish"><?php echo $banner_content; ?></span>
            <?php
        endif; ?>
    </div>
</section>
<section class="reservation">
    <div class="container">
        <div class="reservation-slide-wrap">
            <div class="reservation-place">
                <div class="phone-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.png" alt="phone">
                </div>
                <?php
                $slider_contact_heading = get_field('slider_contact_heading');
                if($slider_contact_heading): ?>
                    <h3><?php echo $slider_contact_heading; ?></h3>
                    <?php
                endif;
                if( have_rows('slider_contact_repeater') ): ?>
                    <ul class="visit-place">
                        <?php
                        while( have_rows('slider_contact_repeater') ): the_row();
                            $city_name = get_sub_field('city_name');
                            $phone = get_sub_field('phone'); ?>
                            <li>
                                <?php
                                if($city_name): ?>
                                    <span class="city-name"><?php echo $city_name; ?></span>
                                    <?php
                                endif;
                                if($phone): ?>
                                    <a href="tel:<?php echo $phone['url']; ?>" class="tel"><?php echo $phone['title']; ?></a>
                                    <?php
                                endif; ?>
                            </li>
                        <?php
                        endwhile; ?>
                    </ul>
                    <?php
                endif; ?>
            </div>
            <?php
            if( have_rows('home_slider') ): ?>
                <div class="reservation-sliders custom-carousel-1 owl-theme">
                    <?php
                    while( have_rows('home_slider') ): the_row(); ?>
                        <div class="slide">
                            <div class="slide-icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/badge.png" alt="badge">
                            </div>
                            <?php
                            if( have_rows('listing_repeater') ):
                                while( have_rows('listing_repeater') ): the_row();
                                    $heading = get_sub_field('heading');
                                    $content = get_sub_field('content');?>
                                    <div class="listing">
                                        <?php
                                        if($heading) : ?>
                                            <span class="look-foods"><?php echo $heading; ?></span>
                                            <?php
                                        endif;
                                        if($content) :
                                            echo $content;
                                        endif; ?>
                                    </div>
                                    <?php
                                endwhile;
                            endif;?>
                        </div>
                        <?php
                    endwhile; ?>
                </div>
                <?php
            endif; ?>
        </div>
    </div>
</section>
<?php
if( have_rows('our_story') ): ?>
    <section class="our-story our-history">
        <?php
        while( have_rows('our_story') ): the_row();
            $side_title = get_sub_field('side_title');
            $image = get_sub_field('image');
            $title = get_sub_field('title');
            $content = get_sub_field('content');
            $button = get_sub_field('button');

            if($side_title): ?>
                <span class="title"><?php echo $side_title; ?></span>
                <?php
            endif;?>
            <div class="story-wrapper container-wrapper">
            <div class="container">
                <div class="history">
                    <?php
                    if($image): ?>
                        <figure class="story-img">
                            <?php echo wp_get_attachment_image($image, 'full'); ?>
                        </figure>
                        <?php
                    endif; ?>
                    <div class="story-content">
                        <?php
                        if($title): ?>
                            <span class="history-title"><?php echo $title; ?></span>
                            <?php
                        endif;
                        if($content): ?>
                            <?php echo $content; ?>
                            <?php
                        endif;
                        if( have_rows('our_story_repeater') ): ?>
                            <div class="our-journey owl-carousel owl-theme" id="progress-journey">
                                <?php
                                while( have_rows('our_story_repeater') ): the_row();
                                    $year = get_sub_field('year');
                                    $content = get_sub_field('content'); ?>
                                    <div class="journey-listing">
                                        <?php
                                        if($year): ?>
                                            <h3><strong class="journey-year"><?php echo $year; ?></strong></h3>
                                            <?php
                                        endif;
                                        if($content): ?>
                                            <p><?php echo $content; ?></p>
                                            <?php
                                        endif; ?>
                                    </div>
                                    <?php
                                endwhile;?>
                            </div>
                            <?php
                        endif;
                        if($button): ?>
                            <a href="<?php echo $button['url']; ?>" class="know-btn"><?php echo $button['title']; ?></a>
                            <?php
                        endif; ?>
                    </div>
                </div>
            </div>
            </div>
            
            <?php
        endwhile; ?>
    </section>
    <?php
endif;

$restrau_bg_img = get_field('restrau_background_image');
$restrau_title = get_field('restrau_title');
$restrau_content = get_field('restrau_content'); ?>

<section class="our-restaurant our-story">
    <?php
    if($restrau_bg_img): ?>
        <div class="restaurant-picture">
            <?php echo wp_get_attachment_image($restrau_bg_img, 'full'); ?>
        </div>
        <?php
    endif; ?>
    <div class="container-wrapper">
        <div class="container">
            <div class="restaurant history">
                <div class="restaurant-content">
                    <?php
                    if($restrau_title): ?>
                        <h2 class="history-title restaurant-title"><?php echo $restrau_title; ?></h2>
                        <?php
                    endif;
                    if($restrau_content):
                        echo $restrau_content;
                    endif; ?>
                </div>
            </div>
            <div class="desktop-slider mobile-slider">
                <?php
                if( have_rows('restrau_slider') ): ?>
                    <div class="restaurant-slider owl-carousel owl-theme due-slider">
                        <?php
                        while( have_rows('restrau_slider') ): the_row();
                            $image = get_sub_field('image');
                            if($image): ?>
                                <div class="slide">
                                    <?php echo wp_get_attachment_image($image,'full'); ?>
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
    <!-- dual markup for mobile -->
    <div class="mobile-slider">
    <?php
        if( have_rows('restrau_slider') ): ?>
            <div class="restaurant-slider owl-carousel owl-theme due-slider">
                <?php
                while( have_rows('restrau_slider') ): the_row();
                    $image = get_sub_field('image');
                    if($image): ?>
                        <div class="slide">
                            <?php echo wp_get_attachment_image($image,'full'); ?>
                        </div>
                        <?php
                    endif;
                endwhile; ?>
            </div>
            <?php
        endif; ?>
    </div>
    <!-- dualmarkup for mobile end -->
</section>

<?php
$menu_bg_img = get_field('menu_background_image');
$menu_title = get_field('menu_title');
$menu_content = get_field('menu_content'); ?>
 
<section class="our-story our-menu">
    <?php
    if($menu_bg_img): ?>
        <div class="restaurant-picture">
            <?php echo wp_get_attachment_image($menu_bg_img,'full'); ?>
        </div>
        <?php
    endif; ?>
    <div class="container-wrapper">
        <div class="container">
            <div class="restaurant history">
                <div class="restaurant-content">
                    <?php
                    if($menu_title): ?>
                        <h2 class="history-title restaurant-title"><?php echo $menu_title;?></h2>
                        <?php
                    endif;
                    if($menu_content):
                        echo $menu_content;
                    endif; ?>
                </div>
            </div>
            <div class="desktop-menu-slider mobile-menu-slider">
                <?php
                if( have_rows('menu_slider') ): ?>
                    <div class="restaurant-slider owl-carousel owl-theme due-slider">
                        <?php
                        while( have_rows('menu_slider') ): the_row();
                            $image = get_sub_field('image');
                            if($image): ?>
                                <div class="slide">
                                    <?php echo wp_get_attachment_image($image,'full'); ?>
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

    <div class="mobile-menu-slider">
        <?php
        if( have_rows('menu_slider') ): ?>
            <div class="restaurant-slider owl-carousel owl-theme due-slider">
                <?php
                while( have_rows('menu_slider') ): the_row();
                    $image = get_sub_field('image');
                    if($image): ?>
                        <div class="slide">
                            <?php echo wp_get_attachment_image($image,'full'); ?>
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
get_footer();
