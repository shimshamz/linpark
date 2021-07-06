<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Linpark
 */

get_header();
?>

	<main id="linpark-page" class="site-main page">
		<?php
		while(have_posts()) {
			the_post();
		?>
			
		<?php get_template_part('template-parts/page-header'); ?>

		<section class="main-content-section">
			<div class="container-fluid section-content-wrapper">
				<div class="row">
					<div class="col-12">
						<div class="page__content">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		</section>


		<?php
		}
		?>
	</main><!-- #main -->
<?php
//get_sidebar();

get_footer();
