<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Linpark
 */

get_header();
?>

	<main id="linpark-404" class="site-main">

		<?php get_template_part('template-parts/page-header'); ?>

		<section class="error-404-section">
			<div class="container-fluid section-content-wrapper">
				<div class="row">
					<div class="col-12">
						<p class="error-404-section__text">Sorry, the page you requested could not be found</p>
					</div>
					<div class="col-12">
						<a href="<?php echo site_url(); ?>" class="button button--red transparent error-404-section__button">Back to home</a>
					</div>
				</div>
			</div>
		</section>

	</main><!-- #main -->

<?php
get_footer();
