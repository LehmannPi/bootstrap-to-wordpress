<?php

/**
 * Title Banner & Subscribe Bar
 * 
 * @package bootstrap2wordpress
 * @since 2.0
 */
?>

<?php
$blog_info		=	get_bloginfo('name');
$description	= get_bloginfo('description', 'display')
?>

<section class="title-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-sm-12 overflow-hidden text-center">
				<!-- <p class="tag-line sub-title">Made with Bootstrap</p>
				<h1 class="page-title">Blog</h1> -->

				<?php
				if (is_page()) {

					// ! Open and close tags
					the_title('<h1 class="page-title">', '</h1> ');
				} elseif (is_single()) {
				?>
					<p class="tag-line sub-title">
						<?php echo get_the_date('M d, Y') ?>
					</p>
				<?php
					the_title('<h1 class="page-title">', '</h1>');
				} elseif (!is_front_page() && is_home()) {

					$b2w_blog_title = get_the_title(get_option('page_for_posts', true));
				?>

					<h1 class="page-title"><?php echo esc_html($b2w_blog_title); ?></h1>

					<?php
				} elseif (is_home()) {
					if ($description) {
					?>
						<p class="tag-line sub-title"> <?php echo esc_html($description) ?> </p>

					<?php } ?>

					<h1> <?php esc_html_e('Bootstrap to Wordpress Blog', 'bootstrap2wordpress'); ?> </h1>

				<?php
				} elseif (is_archive()) {

					the_archive_title('<h1 class="page-title">', '</h1>');
				} elseif (is_404()) {
				?>

					<p class="tag-line sub-title">404</p>
					<h1><?php esc_html_e('Couldn\'t Be Found', 'bootstrap2wordpress'); ?></h1>

				<?php
				} elseif (is_search()) {

					$search_title = sprintf('%s %s', __('Search results for: ', 'bootstrap2wordpress'), get_search_query());
				?>

					<h1 class="page-title"><?php echo esc_html($search_title); ?></h1>

				<?php
				}

				?>


			</div>
		</div>
	</div>
</section>

<section class="subscribe-bar">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<!-- <p><strong>Want cheap and quick web solutions to help you reach your goals?</strong>Enter e-mail</p> -->

				<p> <?php echo wp_kses_post(get_theme_mod('subscribe_text', '<p><strong>Want XcheapX and quick web solutions to help you reach your goals?</strong>Enter e-mail</p>')); ?></p>


			</div>
			<div class="col-sm-6">


				<!-- <form action="index.html" method="post">
					<div class="row">
						<div class="col-lg-8 mb-2 mb-lg-0 d-flex align-items-center">
							<input type="text" name="" value="">
						</div>
						<div class="col-lg-4 my-auto d-flex align-items-center">
							<button class="btn btn-invert my-auto" type="button">Subscribe</button>
						</div>
					</div>
				</form> -->

				<?php
				$b2w_form_html = get_theme_mod('subscribe_form', '<form action="index.html" method="post"><div class="row">
				<div class="col-lg-8 mb-2 mb-lg-0 d-flex align-items-center"><input type="text" name="" value=""></div>
				<div class="col-lg-4 my-auto d-flex align-items-center"><button class="btn btn-invert my-auto" type="button">Subscribe</button>
				</div></div></form>');

				echo $b2w_form_html;
				?>


			</div>
		</div>
	</div>
</section>