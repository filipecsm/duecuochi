<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Due_cuochi
 */

get_header();
$post_id = get_the_ID();
?>

<main id="primary" class="site-main">
	<section class="celebrate-banner news-banner detailed-banner">
        <div class="container">
            <div class="news-heading">
                <h2><?php _e('NOVIDADES', 'due-cuochi'); ?></h2>
            </div>
        </div>
    </section>
	<section class="news-section detailed-news">
        <div class="container">
            <div class="news-wrapper">
				<div class="news-right-block">
					<?php dynamic_sidebar( 'news-sidebar' ); ?>
                </div>
				<div class="news-left-block">
                    <div class="last-post detailed-content">
						<?php 
						while ( have_posts() ) : the_post();
							$terms = get_the_terms($post_id, 'news-category');
							$termsIDs = [];
							if($terms):
								foreach($terms as $term) :
									$termsIDs[] = $term->term_id;
								endforeach;
							endif;?>

							<div class="post-wrap">
								<?php
								if ( has_post_thumbnail() ) : ?>
									<div class="last-post-img">
										<?php the_post_thumbnail(); ?>
									</div>
									<?php
								endif; ?>
								<div class="last-post-content detailed-post">
									<h3 class="desktop-post-heading"><?php the_title(); ?></h3>
									<span class="last-post-date"><?php echo get_the_date(); ?></span>
									<?php
									$terms = get_terms(array(
										'taxonomy' => 'news-tag',
										'hide_empty' => false,
									));
									if (!empty($terms) && !is_wp_error($terms)) : ?>
										<ul class="revenue-list desktop-revenue">
											<?php
											foreach ($terms as $term) : ?>
												<li>
													<a href="<?php echo esc_url(get_term_link($term)); ?>">
									                    <?php echo esc_html($term->name); ?>
									                </a>
									            </li>
												<?php
											endforeach;?>
										</ul>
										<?php
									endif; ?>
									<div class="detailed-content-wrapper">
										<?php the_content(); ?>
									</div>
									<div class="post-links">
										<?php
										the_post_navigation(
											array(
												'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Leia o artigo anterior', 'due-cuochi' ),
												'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Ler próxima matéria', 'due-cuochi' ),
											)
										); ?>
									</div>
								</div>
							</div>
							<div class="post-links">
								<?php echo do_shortcode('[social_share]'); ?>
							</div>
							<?php
						endwhile;
						wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<?php
	if(!empty($terms)) :
		// $paged = get_query_var('news_page') ? get_query_var('news_page') : 1;
		$related_posts = new WP_Query(array(
			'post_type'      => 'news',
			'post__not_in'   => array($post_id),
			'posts_per_page' => -1,
			// 'paged'          => $paged,
			'tax_query'      => array(
				array(
					'taxonomy' => 'news-category',
					'field'    => 'term_id',
					'terms'    => $termsIDs,
					// 'relation' => 'LIKE'
				),
			),
			// 'orderby'        => 'rand'
		));
		$post_count = $related_posts->found_posts;
		if ($related_posts->have_posts()) : ?>
		<section class="similar-news">
			<div class="container">
				<div class="recent-post-block similar-news-block">
					<h3><?php _e('MATERIAS SEMELHANTES','due-cuochi'); ?></h3>
					<ul class="post-list recent-post-list detailed-post <?php echo $post_count <= 3 ? '' : 'owl-carousel owl-theme'; ?>" <?php echo $post_count <= 3 ? '' : 'id="post-carousel"'; ?>>
						<?php
						while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
							<li class="item-list">
								<?php
								if ( has_post_thumbnail() ) : ?>
									<div class="post-img">
										<?php the_post_thumbnail();?>
									</div>
									<?php
								endif; ?>

								<div class="post-content">
									<!-- <span class="published-date"><?php echo get_the_date('M, j'); ?></span> -->
									<h3><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h3>
									<div class="similar-btn">
										<a class="know-btn" href="<?php the_permalink(); ?>"><?php _e('Ler materia','due-cuochi'); ?></a>
									</div>
								</div>
							</li>
							<?php
						endwhile; ?>
					</ul>
					</div>
				</div>
			</section>
			<?php
		endif;
	endif;
	wp_reset_postdata(); ?>
</main>
<?php
get_footer();
