<?php

/**
 * When no content is available
 * 
 * @package bootstrap2wordpress
 * @since 2.0
 */

if (is_home() && current_user_can('publish_posts')) {

	printf(
		'<p>' . wp_kses(
			/* translators: 1: link to WP admin new post page. */
			__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'bootstrap2wordpress'),
			array(
				'a' => array(
					'href' => array(),
				),
			)
		) . '</p>',
		esc_url(admin_url('post-new.php'))
	);
} elseif (is_search()) {
?>

	<div class="search-results-none">
		<h2><?php esc_html_e('Not found', 'bootstrap2wordpress'); ?></h2>
		<p><?php esc_html_e('Sorry, but nothing matched your search terms.', 'bootstrap2wordpress'); ?></p>
	</div>

<?php
	get_search_form();
} else {

?>

	<div class="search-results-none">
		<h2><?php esc_html_e('Not found', 'bootstrap2wordpress'); ?></h2>
		<p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bootstrap2wordpress'); ?></p>
	</div>

<?php
	get_search_form();
}