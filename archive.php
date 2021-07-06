<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Linpark
 */

get_header();
$archive_content = get_queried_object();
?>

	<main id="primary" class="site-main">
		
		<?php get_template_part('template-parts/page-header'); ?>

		<div class="container-fluid section-content-wrapper">
			<div class="row">
				<?php
				while(have_posts()) {
					the_post();

					if (is_post_type_archive('events')) {
				?>
					<div class="col-12 col-sm-6 col-lg-4 col-xl-3">
						<?php get_template_part('template-parts/event-item'); ?>
					</div>
				<?php
					} else {
					?>
					<div class="col-12 col-lg-6">
						<?php get_template_part('template-parts/post-item'); ?>
					</div>
					<?php
					}
				}
				?>
			</div>
		</div>
	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
