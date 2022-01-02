<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bootstrap2wordpress
 * @since 2.0
 */
get_header();
get_template_part('template-parts/banner', 'title');

?>


<div class="content-area">
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2 overflow-hidden text-center">

				<div class="image-404">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/404.jpg" alt="404" class="img-fluid">
				</div>

				<h3  class="my-4"><?php esc_html_e('Sorry, this page couldn\'t be found.', 'bootstrap2wordpress') ?></h3>
				<div class="button-box text-center">
					<a href="<?php echo esc_url(home_url('/')) ?>" class="btn btn-primary">
						<?php esc_html_e('Back to Homepage', 'bootstrap2worpress') ?></a>
				</div>

			</div>
		</div>
	</div>
</div>