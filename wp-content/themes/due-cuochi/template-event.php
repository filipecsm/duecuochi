<?php
/**
 * Template Name: Event Template
 */
get_header();

$banner_img = get_field('banner_image');
$banner_text = get_field('banner_text');


if($banner_img): ?>
    <section class="celebrate-banner event-main-banner" <?php if($banner_img){ ?> style="background-image:url('<?php echo $banner_img; ?>')" <?php } ?>>
        <div class="container">
            <?php
            if($banner_text): ?>
                <div class="event-heading">
                    <h2><?php echo $banner_text; ?></h2>
                </div>
                <?php
            endif; ?>
        </div>
    </section>
    <?php
endif; ?>
<?php
$e_main_title = get_field('e_main_title');
$e_heading_1 = get_field('e_heading_1');
$e_content = get_field('e_content');
$e_heading_2 = get_field('e_heading_2'); ?>

<section class="gastronomic-event memorable-event">
    <div class="container">
        <?php
        if($e_main_title): ?>
            <h2><?php echo $e_main_title; ?></h2>
            <?php
        endif; ?>
        <div class="event-content">
            <?php
            if($e_heading_1): ?>
                <h3><?php echo $e_heading_1; ?></h3>
                <?php
            endif;
            if($e_content):
                echo $e_content;
            endif; ?>
            <div class="choose-due">
                <?php
                if($e_heading_2): ?>
                    <h3><?php echo $e_heading_2; ?></h3>
                    <?php
                endif;
                if( have_rows('e_icon_repeater') ): ?>
                    <ul class="due-listing">
                        <?php
                        while( have_rows('e_icon_repeater') ): the_row();
                            $icon = get_sub_field('icon');
                            $content = get_sub_field('content');?>
                            <li>
                                <?php
                                if($icon): ?>
                                    <div class="listing-img">
                                        <?php echo wp_get_attachment_image( $icon , 'full'); ?>
                                    </div>
                                    <?php
                                endif;
                                ?>
                                <div class="due-content-wrapper">
                                <?php
                                    if($content):
                                        echo $content;
                                    endif; ?>
                                </div>
                            </li>
                            <?php
                        endwhile; ?>
                    </ul>
                    <?php
                endif; ?>
            </div>
        </div>
        <?php
        if( have_rows('e_contact_info') ): ?>
            <div class="reservation-place">
                <?php
                while( have_rows('e_contact_info') ): the_row();
                    $main_title = get_sub_field('main_title');
                    $sub_title = get_sub_field('sub_title');?>
        
                    <div class="phone-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.png" alt="phone">
                    </div>
                    <?php
                    if($main_title): ?>
                        <h3><?php echo $main_title; ?></h3>
                        <?php
                    endif;
                    if($sub_title): ?>
                        <span class="unit-choice"><?php echo $sub_title; ?></span>
                        <?php
                    endif;
                    if( have_rows('event_repeater') ): ?>
                        <ul class="visit-place">
                            <?php
                            while( have_rows('event_repeater') ): the_row();
                                $location = get_sub_field('location');
                                $address = get_sub_field('address');
                                $button = get_sub_field('button'); ?>
                                <li>
                                    <div class="event-address">
                                        <?php
                                        if($location): ?>
                                            <span class="city-name"><?php echo $location; ?></span>
                                            <?php
                                        endif;
                                        if($address):
                                            echo $address;
                                        endif; ?>
                                    </div>
                                    <?php
                                    if($button): ?>
                                        <a href="<?php echo $button['url']; ?>" class="know-btn"><?php echo $button['title']; ?></a>
                                        <?php
                                    endif; ?>
                                </li>
                                <?php
                            endwhile; ?>
                        </ul>
                        <?php
                    endif;
                endwhile; ?>
            </div>
            <?php
        endif; ?>
    </div>

</section>
<?php $e_bg_img = get_field('e_background_image');?>
 <section class="event-banner" <?php if($e_bg_img){ ?> style="background-image:url('<?php echo $e_bg_img; ?>')" <?php } ?>>
    <div class="container">
        <div class="choose-container">
            <div class="event-content">
                <?php
                if($e_heading_1): ?>
                    <h3><?php echo $e_heading_1; ?></h3>
                    <?php
                endif;
                if($e_content):
                    echo $e_content;
                endif; ?>
                <div class="choose-due">
                    <?php
                    if($e_heading_2): ?>
                        <h3><?php echo $e_heading_2; ?></h3>
                        <?php
                    endif;
                    if( have_rows('e_icon_repeater') ): ?>
                        <ul class="due-listing">
                            <?php
                            while( have_rows('e_icon_repeater') ): the_row();
                                $icon = get_sub_field('icon');
                                $content = get_sub_field('content');?>
                                <li>
                                    <?php
                                    if($icon): ?>
                                        <div class="listing-img">
                                            <?php echo wp_get_attachment_image( $icon , 'full'); ?>
                                        </div>
                                        <?php
                                    endif;
                                    ?>
                                    <div class="due-content-wrapper">
                                    <?php
                                        if($content):
                                            echo $content;
                                        endif; ?>
                                    </div>
                                </li>
                                <?php
                            endwhile; ?>
                        </ul>
                        <?php
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
 </section>
<?php
if( have_rows('contact_info_detail_repeater') ): ?>
    <section class="enjoy-section">
        <div class="container">
            <div class="enjoy-block">
                <?php
                while( have_rows('contact_info_detail_repeater') ): the_row();
                    $title = get_sub_field('title');
                    $content = get_sub_field('content');
                    $button = get_sub_field('button'); ?>
    
                    <div class="enjoy-listing visit-place">
                        <?php
                        if($title): ?>
                            <h3><?php echo $title; ?></h3>
                            <?php
                        endif;
                        if($content):
                           echo $content;
                        endif;
                        if($button): ?>
                            <a href="<?php echo $button['url'];?>" class="know-btn whtsapp-btn"><?php echo $button['title'];?></a>
                            <?php
                        endif;?>
                    </div>
                    <?php
                endwhile; ?>
            </div>
        </div>
    </section>
    <?php
endif;

$slider_bg_img = get_field('bottom_slider_bg_image');
$slider_title = get_field('bottom_slider_title');
$slider_content = get_field('bottom_slider_content'); ?>

<section class="our-restaurant our-story event-story">
    <?php
    if($slider_bg_img): ?>
        <div class="restaurant-picture">
            <?php echo wp_get_attachment_image($slider_bg_img, 'full'); ?>
        </div>
        <?php
    endif; ?>
    <div class="container-wrapper">
        <div class="container">
            <div class="restaurant history">
                <div class="restaurant-content">
                    <?php
                    if($slider_title): ?>
                        <h2 class="history-title restaurant-title"><?php echo $slider_title; ?></h2>
                        <?php
                    endif;?>
                    <div class="our-unit-content">
                        <?php echo $slider_content;
                        if( have_rows('tabbing_repeater') ): ?>
                            <ul class="our-units">
                                <?php
                                while( have_rows('tabbing_repeater') ): the_row();
                                    $title = get_sub_field('title');
                                    if($title): ?>
                                        <li data-tab="tab-<?php echo get_row_index(); ?>" class="<?php echo (get_row_index()==1) ? 'btn-active' : ''; ?>"><a href="javascript:void(0)"><?php echo $title; ?></a></li>
                                        <?php
                                    endif;
                                endwhile; ?>
                            </ul>
                            <?php
                        endif; ?>   
                    </div>
                </div>
            </div>
            <div class="desktop-slider mobile-slider">
                <?php
                if( have_rows('tabbing_repeater') ): 
                    while( have_rows('tabbing_repeater') ): the_row();?>
                        <div class="tab-<?php echo get_row_index(); ?> tab-content <?php echo (get_row_index()==1) ? 'btn-active' : ''; ?>">
                            <div class="restaurant-slider owl-carousel owl-theme due-slider">
                                <?php
                                $images = get_sub_field('gallery');
                                if($images):
                                    foreach( $images as $image_id ): ?>
                                        <div class="slide">
                                            <?php echo wp_get_attachment_image($image_id,'full'); ?>
                                        </div>
                                        <?php 
                                    endforeach;
                                endif;?>
                            </div>
                        </div>
                        <?php
                    endwhile;
                endif; ?>
            </div>
        </div>
    </div>
    <div class="mobile-slider">
        <?php
        if( have_rows('bottom_slider_repeater') ): ?>
            <div class="restaurant-slider owl-carousel owl-theme due-slider">
                <?php
                while( have_rows('bottom_slider_repeater') ): the_row();
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
