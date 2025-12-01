<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Due_cuochi
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="facebook-domain-verification" content="3m9wa0vxgi35xobp0y39lysx90l0i4" />
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'due-cuochi' ); ?></a>

<header id="masthead" class="site-header">
	<div class="container">
		<div class="header-wrap">
			<div class="left-header">
				<?php
				$mobile_logo = get_field('mobile_logo','option');
				if($mobile_logo):?>
					<div class="main-logo mobile-logo">
						<a href="/"><?php echo wp_get_attachment_image($mobile_logo); ?></a>
					</div>
					<?php 
				endif; ?>
				<div class="main-logo desktop-logo">
					<?php the_custom_logo();?>
				</div>
				<ul class="site-title">
					<li><?php _e( 'DUE COUCHI', 'due-cuochi' ); ?></li>
					<li><?php _e( 'CUCINA', 'due-cuochi' ); ?></li>
				</ul>
			</div>
			<button type="button" class="hamburger">
				<span class="lines">&nbsp;</span>
				<span class="lines">&nbsp;</span>
				<span class="lines">&nbsp;</span>
			</button>
			<div class="right-header">
				<div class="main-menu">
					<nav id="site-navigation" class="main-navigation">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);?>
					</nav><!-- #site-navigation -->
					<div class="social-media-wrap">
						<?php 
						if( have_rows('social_media','option') ): ?>
								<ul class="social-media">
									<?php while( have_rows('social_media','option') ): the_row();
										$social_select_icon = get_sub_field('select_icon');
										$social_url = get_sub_field('social_url');
									?>
										<li>
											<a href="<?php echo $social_url; ?>" target="_blank" rel="noopener"><i class="<?php echo $social_select_icon; ?>"></i></a>
										</li>
									<?php endwhile; ?>
								</ul>
							<?php 
						endif; ?>
					</div>
				</div>
			</div>
		</div>		
	</div>
</header>