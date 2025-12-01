<?php
/**
 * Template Name: Contact Template
 */
get_header();
$banner_img = get_field('banner_image');
?>
<section class="contact-banner" style="background-image:url(<?php echo $banner_img; ?>)">
    <div class="container">
        <?php
        $banner_text = get_field('banner_text');
        if($banner_text) :  ?>
            <div class="event-heading">
                <h2><?php echo $banner_text; ?></h2>
            </div>
            <?php
        endif; ?>
    </div>
</section>
<section class="contact-section">
    <div class="container">
        <?php
        $form_shortcode = get_field('form_shortcode');
        $bottom_text = get_field('bottom_text');
        
        if($form_shortcode) :
            echo do_shortcode($form_shortcode);
        endif;
        if($bottom_text) : ?>
            <div class="contact-form-heading">
                <h2><?php echo $bottom_text; ?></h2>
            </div>
            <?php
        endif; ?>
    </div>
</section>
<?php
get_footer();
