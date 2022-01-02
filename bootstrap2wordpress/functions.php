<?php

/*
 Enqueue scripts ads styles
*/

if (!function_exists('b2w_theme_setup')) {
	/* Theme Setup */
	function b2w_theme_setup()
	{
		// ! See documentation of theme supports for full capabilities - https://developer.wordpress.org/reference/functions/add_theme_support/
		load_theme_textdomain('bootstrap2wordpress', get_template_directory() . '/languages');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support('html5');
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			)
		);
		add_theme_support('customize-selective-refresh-widgets');
		add_theme_support('responsive-embeds');

		register_nav_menus(
			array(
				// ! Allows for registering custom menus
				'primary' => esc_html__('Primary Menu', 'bootstrap2wordpress')
			)
		);
	}
}

// ! Will create & setup the created requirements above
add_action('after_setup_theme', 'b2w_theme_setup');


function b2w_assets()
{
	// Enqueue CSS Files
	wp_enqueue_style('google-font', '//fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

	wp_enqueue_style('flaticon', get_theme_file_uri('/assets/font/flaticon.css'), array(), '1.0', false);

	wp_enqueue_style('bootstrap2wordpress', get_theme_file_uri('style.css'), array('bootstrap'), '1.0', false);

	wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');

	// Enqueue JS files
	wp_enqueue_script('bootstrap', get_theme_file_uri('//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js'));

	wp_enqueue_script('bootstrap2wordpress-js', get_theme_file_uri('assets/js/main-script.js'), array('jquery', 'jquery-ui-core', 'jquery-ui-selectmenu'), '1.0', true);


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', 'b2w_assets');

function b2w_excerpt_readmore($more)
{
	return '(...)';
}

add_filter('excerpt_more', 'b2w_excerpt_readmore');

//  Pagination handler

function b2w_pagination()
{
	global $wp_query;
	$links = paginate_links(
		array(
			'current' => max(1, get_query_var('paged')),
			'total' => $wp_query->max_num_pages,
			'type'	=> 'list',
			'prev_text'	=> '<-', // &larr
			'next_text' => '->'
		)
	);
	$links = '<nav class="b2w-pagination">' . $links; // concatenate links variable
	$links .= '</nav>'; // concatenating again
	echo wp_kses_post($links);
}


//  Add customizer functionality
require get_template_directory() . '/includes/customizer-b2w.php';