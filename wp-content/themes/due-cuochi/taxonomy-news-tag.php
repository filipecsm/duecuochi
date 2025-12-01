<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Due_cuochi
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="celebrate-banner news-banner">
        <div class="container">
            <div class="event-heading">
                <h2><?php _e('NOVIDADES DO DUE CUOCHI','due-cuochi'); ?></h2>
            </div>
            <div class="news-heading">
				<h2><?php the_archive_title(); ?></h2>
            </div>
        </div>
    </section>
	<section class="news-section news-category-block">
        <div class="container">
            <div class="news-wrapper">
				<div class="news-right-block">
                    <?php dynamic_sidebar( 'news-sidebar' ); ?>
                </div>
				<div class="news-left-block news-category">
					<?php
					if (have_posts()) : 
						while (have_posts()) : the_post(); 
							// $exclude_post = get_the_ID(); ?>
							<div class="last-post">
								<div class="post-wrap">
									<h3 class="mobile-post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<span class="last-post-date mobile-post-date"><?php echo get_the_date(); ?></span>
									<?php 
									if ( has_post_thumbnail() ) : ?>
										<div class="last-post-img">
											<?php the_post_thumbnail();?>
										</div>
										<?php
									endif; ?>
								</div>							
								<div class="last-post-content">
									<h3 class="desktop-post-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<span class="last-post-date"><?php echo get_the_date(); ?></span>
									<?php the_excerpt(); ?>
									<div class="post-links">
										<a class="know-btn" href="<?php the_permalink(); ?>"><?php _e('Ler materia','due-cuochi'); ?></a>
										<?php echo do_shortcode('[social_share]'); ?>
									</div>
								</div>
							</div>
							<?php
						endwhile;
					else :
						echo 'No post found';
					endif;
					wp_reset_postdata(); ?>
					<?php /*
					<div class="recent-post-block">
						<h3><?php _e('POSTAGENS RECENTES','due-cuochi'); ?></h3>
						<?php
						$paged = get_query_var('paged') ? get_query_var('paged') : 1;
						$args2 = array(
							'post_type'      => 'news', 
							'posts_per_page' => 2,
							// 'post__not_in'   => array($exclude_post),
							'paged'          => $paged,
							'orderby'        => 'date',
							'order'          => 'DESC'
						);

						$query2 = new WP_Query($args2);
						if ($query2->have_posts()) : ?>
							<ul class="post-list recent-post-list">
								<?php
								while ($query2->have_posts()) : $query2->the_post(); ?>
									<li>
										<?php 
										if ( has_post_thumbnail() ) : ?>
											<div class="post-img">
												<?php the_post_thumbnail();?>
											</div>
											<?php
										endif; ?>
										<div class="post-content">
											<span class="post-date"><?php echo get_the_date('M, j'); ?></span>
											<p><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></p>
											<a class="know-btn" href="<?php the_permalink(); ?>"><?php _e('Ler materia','due-cuochi'); ?></a>
										</div>
									</li>
									<?php
								endwhile;?>
							</ul>
							<div class="pagination-block">
								<div class="pagination-wrapper">
									<?php	
										$big = 999999999;
										echo paginate_links(array(
											'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
											'format'       => '?page=%#%',
											'current'   => max(1, get_query_var('paged')),
											'total'     => $query2->max_num_pages,
											'show_all'  => true,
											'prev_text' => '',
    										'next_text' => '',
										));
								else :
									echo 'No posts found'; 
								endif;
								wp_reset_postdata(); ?>
								</div>
							</div>
					</div>
					*/ ?>
				</div>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
