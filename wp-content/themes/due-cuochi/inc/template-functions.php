<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Due_cuochi
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function due_cuochi_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'due_cuochi_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function due_cuochi_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'due_cuochi_pingback_header' );


/**
* Theme option
*/
add_action('acf/init', 'strada_add_options_page');

function strada_add_options_page() {
    if( function_exists('acf_add_options_page') ) {
        
		acf_add_options_page(array(
			'page_title'     => __('Theme General Settings'),
			'menu_title'    => __('Theme Settings'),
			'menu_slug'     => 'theme-general-settings',
			'capability'    => 'edit_posts',
			'redirect'        => false
		));
		
		acf_add_options_sub_page(array(
			'page_title'     => __('Theme Footer Settings'),
			'menu_title'    => __('Footer Setting'),
			'parent_slug'    => 'theme-general-settings',
		));

		acf_add_options_sub_page(array(
			'page_title'     => __('Page Settings'),
			'menu_title'    => __('Page Settings'),
			'parent_slug'    => 'theme-general-settings',
		));
        
    }
}

// Register Custom Post Type News
function news_post_type() {

	$labels = array(
		'name'                  => _x( 'News', 'Post Type General Name', 'due-cuochi' ),
		'singular_name'         => _x( 'News', 'Post Type Singular Name', 'due-cuochi' ),
		'menu_name'             => __( 'News', 'due-cuochi' ),
		'name_admin_bar'        => __( 'News', 'due-cuochi' ),
		'archives'              => __( 'Item Archives', 'due-cuochi' ),
		'attributes'            => __( 'Item Attributes', 'due-cuochi' ),
		'parent_item_colon'     => __( 'Parent Item:', 'due-cuochi' ),
		'all_items'             => __( 'All Items', 'due-cuochi' ),
		'add_new_item'          => __( 'Add New Item', 'due-cuochi' ),
		'add_new'               => __( 'Add New', 'due-cuochi' ),
		'new_item'              => __( 'New Item', 'due-cuochi' ),
		'edit_item'             => __( 'Edit Item', 'due-cuochi' ),
		'update_item'           => __( 'Update Item', 'due-cuochi' ),
		'view_item'             => __( 'View Item', 'due-cuochi' ),
		'view_items'            => __( 'View Items', 'due-cuochi' ),
		'search_items'          => __( 'Search Item', 'due-cuochi' ),
		'not_found'             => __( 'Not found', 'due-cuochi' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'due-cuochi' ),
		'featured_image'        => __( 'Featured Image', 'due-cuochi' ),
		'set_featured_image'    => __( 'Set featured image', 'due-cuochi' ),
		'remove_featured_image' => __( 'Remove featured image', 'due-cuochi' ),
		'use_featured_image'    => __( 'Use as featured image', 'due-cuochi' ),
		'insert_into_item'      => __( 'Insert into item', 'due-cuochi' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'due-cuochi' ),
		'items_list'            => __( 'Items list', 'due-cuochi' ),
		'items_list_navigation' => __( 'Items list navigation', 'due-cuochi' ),
		'filter_items_list'     => __( 'Filter items list', 'due-cuochi' ),
	);
	$args = array(
		'label'                 => __( 'News', 'due-cuochi' ),
		'description'           => __( 'Site News.', 'due-cuochi' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions' ),
		// 'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'news', $args );


	$labels2 = array(
		'name'                  => _x( 'Cardapio', 'Post Type General Name', 'due-cuochi' ),
		'singular_name'         => _x( 'Cardapio', 'Post Type Singular Name', 'due-cuochi' ),
		'menu_name'             => __( 'Cardapio', 'due-cuochi' ),
		'name_admin_bar'        => __( 'Cardapio', 'due-cuochi' ),
		'archives'              => __( 'Item Archives', 'due-cuochi' ),
		'attributes'            => __( 'Item Attributes', 'due-cuochi' ),
		'parent_item_colon'     => __( 'Parent Item:', 'due-cuochi' ),
		'all_items'             => __( 'All Items', 'due-cuochi' ),
		'add_new_item'          => __( 'Add New Item', 'due-cuochi' ),
		'add_new'               => __( 'Add New', 'due-cuochi' ),
		'new_item'              => __( 'New Item', 'due-cuochi' ),
		'edit_item'             => __( 'Edit Item', 'due-cuochi' ),
		'update_item'           => __( 'Update Item', 'due-cuochi' ),
		'view_item'             => __( 'View Item', 'due-cuochi' ),
		'view_items'            => __( 'View Items', 'due-cuochi' ),
		'search_items'          => __( 'Search Item', 'due-cuochi' ),
		'not_found'             => __( 'Not found', 'due-cuochi' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'due-cuochi' ),
		'featured_image'        => __( 'Featured Image', 'due-cuochi' ),
		'set_featured_image'    => __( 'Set featured image', 'due-cuochi' ),
		'remove_featured_image' => __( 'Remove featured image', 'due-cuochi' ),
		'use_featured_image'    => __( 'Use as featured image', 'due-cuochi' ),
		'insert_into_item'      => __( 'Insert into item', 'due-cuochi' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'due-cuochi' ),
		'items_list'            => __( 'Items list', 'due-cuochi' ),
		'items_list_navigation' => __( 'Items list navigation', 'due-cuochi' ),
		'filter_items_list'     => __( 'Filter items list', 'due-cuochi' ),
	);
	$args2 = array(
		'label'                 => __( 'Cardapio', 'due-cuochi' ),
		// 'description'           => __( 'Site News.', 'due-cuochi' ),
		'labels'                => $labels2,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions' ),
		// 'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'cardapio', $args2 );
	

}
add_action( 'init', 'news_post_type', 0 );

// Register Custom Taxonomy
function due_cuochi_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Category', 'Taxonomy General Name', 'due-cuochi' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'due-cuochi' ),
		'menu_name'                  => __( 'Category', 'due-cuochi' ),
		'all_items'                  => __( 'All Category', 'due-cuochi' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'news-category', array( 'news' ), $args );

	$news_labels = array(
		'name'                       => _x( 'Tag', 'Taxonomy General Name', 'due-cuochi' ),
		'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name', 'due-cuochi' ),
		'menu_name'                  => __( 'Tag', 'due-cuochi' ),
		'all_items'                  => __( 'All Tag', 'due-cuochi' ),
	);
	$news_args = array(
		'labels'                     => $news_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'news-tag', array( 'news' ), $news_args );

	$cardapio_labels = array(
		'name'                       => _x( 'Category', 'Taxonomy General Name', 'due-cuochi' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'due-cuochi' ),
		'menu_name'                  => __( 'Category', 'due-cuochi' ),
		'all_items'                  => __( 'All Category', 'due-cuochi' ),
	);
	$cardapio_args = array(
		'labels'                     => $cardapio_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'cardapio-cat', array( 'cardapio' ), $cardapio_args );

}
add_action( 'init', 'due_cuochi_taxonomy', 0 );


function news_category_terms_with_counts() {
    $terms = get_terms(array(
        'taxonomy' => 'news-category',
        'hide_empty' => false,
    ));

    ob_start();
    ?>
    <div class="categories-section">
        <h3><?php _e('Categorias', 'due-cuochi'); ?></h3>
        <ul class="categories-list">
            <?php
            if (!empty($terms) && !is_wp_error($terms)) :
                foreach ($terms as $term) : ?>
					<li>
						<a href="<?php echo esc_url(get_term_link($term)); ?>" class="category-link">
							<span class="category-item"><?php echo esc_html($term->name); ?></span>
							<span class="price"><?php echo absint($term->count); ?></span>
						</a>
					</li>
                    <?php
				endforeach;
            else : ?>
                <li><?php esc_html_e('No terms found', 'due-cuochi'); ?></li>
                <?php
            endif; ?>
        </ul>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('news_category_terms', 'news_category_terms_with_counts');


function get_trending_posts($number_of_posts = 3) {
    $args = array(
        'post_type'      => 'news',
        'posts_per_page' => $number_of_posts,
        'meta_key'       => 'views',
        'orderby'        => 'meta_value_num',
        'order'          => 'DESC',
        'post_status'    => 'publish'
    );
    $trending_query = new WP_Query($args);

	ob_start();
    if ($trending_query->have_posts()) : ?>
		<div class="mostRead-post">
			<h3 class="dekstop-post-heading"><?php _e('POSTAGENS MAIS LIDAS','due-cuochi'); ?></h3>
			<h3 class="mobile-post"><?php _e('Postagens RECENTES','due-cuochi'); ?></h3>
			<ul class="post-list">
				<?php
				while ($trending_query->have_posts()) : $trending_query->the_post(); ?>
					<li>
						<?php
						if ( has_post_thumbnail() ) : ?>
							<div class="post-img">
								<?php the_post_thumbnail(); ?>
							</div>
							<?php
						endif; ?>
						<div class="post-content">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							<span class="post-date"><?php echo get_the_date('M, j'); ?></span>
						</div>
					</li>
					<?php
				endwhile; ?>
			</ul>
        </div>
		<?php
    else :
        $output = 'No trending posts found.';
    endif;

    wp_reset_postdata();
    return ob_get_clean();
}

function trending_posts_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'number_of_posts' => 3,
        ), 
        $atts, 
        'trending_posts'
    );
    return get_trending_posts($atts['number_of_posts']);
}

add_shortcode('trending_posts', 'trending_posts_shortcode');


function social_share_buttons() {

        global $post;
        $url = get_permalink($post->ID);
        $title = get_the_title($post->ID);

        $facebook_share_url = 'https://www.facebook.com/sharer/sharer.php?u=' . $url;
        $twitter_share_url = 'https://twitter.com/intent/tweet?text=' . $title . '&url=' . $url;
        $linkedin_share_url = 'https://www.linkedin.com/sharing/share-offsite/?url=' . $url;
		$whatsapp_share_url = 'https://api.whatsapp.com/send?text=' . urlencode($title . ' ' . $url);

        ob_start(); ?>

			<ul class="social-media">
				<li><a href="<?php echo esc_url($facebook_share_url); ?>" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook-f"></i></a></li>
				<li><a href="<?php echo esc_url($whatsapp_share_url); ?>" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-whatsapp"></i></a></li>
			</ul>
        <?php
        return ob_get_clean();
}

function social_share_shortcode() {
    return social_share_buttons();
}

add_shortcode('social_share', 'social_share_shortcode');


//  ------------- Related Post ----------------------------


// function get_related_posts($number_of_posts = 3) {
//     if (!is_single()) return '';

//     global $post;
	
//     if (empty($category_id)) return 'No related posts found.';

//     $related_posts = new WP_Query(array(
// 		'post_type'      => 'news',
//         'category__in'   => $category_id,
//         'post__not_in'   => array($post->ID),
//         'posts_per_page' => $number_of_posts,
//         'orderby'        => 'rand'
//     ));

//     ob_start();

//     if ($related_posts->have_posts()) {
//         echo '<ul class="related-posts">';
//         while ($related_posts->have_posts()) {
//             $related_posts->the_post();
//             echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
//         }
//         echo '</ul>';
//     } else {
//         echo 'No related posts found.';
//     }

//     wp_reset_postdata();
//     return ob_get_clean();
// }

// function related_posts_shortcode($atts) {
//     $atts = shortcode_atts(array('number_of_posts' => 3), $atts, 'related_posts');
//     return get_related_posts($atts['number_of_posts']);
// }

// add_shortcode('related_posts', 'related_posts_shortcode');


function cuochi_adjust_queries($query)
{
    if (!is_admin() && $query->is_main_query()) {
        if (is_tax('news') || is_post_type_archive('news') || is_singular('news')) {
            $query->set('posts_per_page', 3);
        }
    }
}
add_action('pre_get_posts', 'cuochi_adjust_queries');


function add_custom_query_vars($vars) {
    $vars[] = 'news_page';
    return $vars;
}
add_filter('query_vars', 'add_custom_query_vars');

function paginate_array($data, $page = 1, $per_page = 10) {
    $total_items = count($data);
    $total_pages = ceil($total_items / $per_page);
    $offset = ($page - 1) * $per_page;
    $page_data = array_slice($data, $offset, $per_page);
    
    return [
        'data' => $page_data,
        'total_pages' => $total_pages,
        'current_page' => $page,
    ];
}