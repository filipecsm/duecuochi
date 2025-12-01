<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Due_cuochi
 */

?>
	<footer id="colophon" class="site-footer">
		<div class="container">
			<?php dynamic_sidebar( 'footer-widget' ); ?>
			<div class="right-header">
				<div class="main-menu">
					<nav id="site-navigation" class="main-navigation">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer-menu',
								'menu_id'        => 'primary-menu',
							)
						);?>
					</nav>
				</div>
			</div>
			<div class="site-info">
				<div class="footer-chef">
					<?php
					$footer_text = get_field('footer_text','option');
					$footer_logo = get_field('footer_logo','option'); 
					if($footer_text):?>
						<span class="produce-title"><?php echo $footer_text; ?></span>
					<?php endif;
					if($footer_logo): ?>
						<div class="footer-logo">
							<a href="/"><?php echo wp_get_attachment_image($footer_logo); ?></a>
						</div>
						<?php 
					endif; ?>
					<div class="social-media-wrap">
						<?php 
						if( have_rows('social_media','option') ): ?>
							<ul class="social-media">
								<?php 
								while( have_rows('social_media','option') ): the_row();
									$social_select_icon = get_sub_field('select_icon');
									$social_url = get_sub_field('social_url');?>
									<li>
										<a href="<?php echo $social_url; ?>" target="_blank" rel="noopener">
											<i class="<?php echo $social_select_icon; ?>"></i>
										</a>
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
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
