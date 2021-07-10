<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Linpark
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Linpark High School</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/assets/brand/favicon.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header class="header">
		<div class="menu-container">
			<nav class="menu" aria-label="navigation">
				<div class="logo">
					<a href="<?php echo site_url(); ?>" class="logo__link">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/brand/linpark-logo-text-6.png" class="logo__img" alt="Linpark Logo">
					</a>
				</div>

				<button class="menu-toggle" aria-label="Menu Toggle">
					<span class="menu-toggle__line"></span>
					<span class="menu-toggle__line"></span>
					<span class="menu-toggle__line"></span>
				</button>

				<?php
				wp_nav_menu(
					array(
						'menu_class' => 'menu__list',
						'container' => '',
						'theme_location' => 'primary',
					)
				);
				?>
			</nav>
		</div>
	</header>

<style>
	.menu-item-has-children > a:after {
		-webkit-mask-image: url("<?php bloginfo('stylesheet_directory'); ?>/assets/icons/SVG/chevron-down.svg");
		mask-image: url("<?php bloginfo('stylesheet_directory'); ?>/assets/icons/SVG/chevron-down.svg");
		background-color: #fcfcfc;
	}
</style>
