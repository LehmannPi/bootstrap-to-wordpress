<?php

/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bootstrap2wordpress
 * @since B2W 2.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="UTF-8">
	<title>WordPress Blog 2.0</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>

</head>

<!-- // ! Lots of valueable information in body classe (e.g. home, loged-in, admin-bar, etc) -->

<body <?php body_class(); ?>>
	<div id="top-navigation">
		<div class="container">
			<div class="row justify-content-end">
				<div class="col-md-6">

					<?php
					wp_nav_menu(
						array(
							'theme_location'	=>	'primary', // as reg in functions.php
							'depth'						=>	3,	// ? "How deep is the menu / submenu 
							'container'				=>	'nav', // ! html wrapper of the menu ul
							'container_class' =>	'main-menu',
							'menu_class'			=>	'top-menu d-flex navigation top-menu justify-content-end list-unstyled', // ? Classes of the menu ul tag
							'fallback_cb'			=>	false,	// ? We haven't styled the fallback
						)
					);
					?>

					<button type="button" class="navbar-open">
						<i class="mobile-nav-toggler flaticon-menu"></i>
					</button>

				</div>
			</div>

			<!-- ? Mobile Menu -->
			<div class="menu-backdrop"></div>
			<div class="mobile-menu">

				<div class="close-btn">
					<i class="flaticon flaticon-close"></i>
				</div>
				<nav class="menu-box">
					<ul class="navigation clearfix"></ul>
				</nav>
			</div>
		</div>
	</div>