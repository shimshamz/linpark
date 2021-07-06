<?php 
/* Template Name: Home Page */ 

get_header(); 
?>

	<main id="linpark-front" class="site-main">
		<!-- HERO SECTION -->
		<section class="hero">
			<!-- Slider main container -->
			<div class="swiper-container">
				<!-- Additional required wrapper -->
				<div class="swiper-wrapper">
					<!-- Slides -->
					<?php
					for ($i = 1; $i <= 3; $i++) {
						$show_slide = get_post_meta($post->ID, 'slides_show_slide_'.$i, true);
						$slide_heading = get_post_meta($post->ID, 'slides_slide_'.$i.'_heading', true);
						$slide_description = get_post_meta($post->ID, 'slides_slide_'.$i.'_description', true);
						$slide_image_id = get_post_meta($post->ID, 'slides_slide_'.$i.'_image', true);
						$slide_image_url = wp_get_attachment_image_url($slide_image_id);
						$slide_button_text = get_post_meta($post->ID, 'slides_slide_'.$i.'_button_text', true);
						// print_r(wp_get_attachment_image_url($slide_image_id));

						if ($show_slide) {
					?>
							<div class="swiper-slide">
								<div class="hero-slide"
									<?php if ($slide_image_url) { ?> 
										style="background-image: url('<?php echo $slide_image_url; ?>')"
									<?php } ?>
								>
									<div class="container-fluid">
										<div class="row">
											<div class="col-lg-6">
												<?php if ($slide_heading) { ?> 
													<h1 class="hero-slide__heading"><?php echo $slide_heading; ?></h1>
												<?php } ?>
												<?php if ($slide_description) { ?> 
													<p class="hero-slide__copy"><?php echo $slide_description; ?></p>
												<?php } ?>
												<?php if ($slide_button_text) { 
												$slide_button_link = get_post_meta($post->ID, 'slides_slide_'.$i.'_button_link', true)['url']; 
												?> 
													<a href="<?php echo $slide_button_link; ?>" class="button button--red"><?php echo $slide_button_text; ?></a>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
					<?php
						}
					}
					?>
				</div>
				<!-- If we need pagination -->
				<div class="swiper-pagination"></div>

				<!-- If we need navigation buttons -->
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
		</section>

		<!-- ABOUT SECTION -->
		<?php
		$introduction_title = get_post_meta($post->ID, 'introduction_introduction_title', true);
		$introduction_excerpt = get_post_meta($post->ID, 'introduction_introduction_excerpt', true);
		$introduction_button_text = get_post_meta($post->ID, 'introduction_introduction_button_text', true);
		$introduction_button_link = get_post_meta($post->ID, 'introduction_introduction_button_link', true)['url'];
		$introduction_image_id = get_post_meta($post->ID, 'introduction_introduction_image', true);
		$introduction_image_url = wp_get_attachment_image_url($introduction_image_id);
		?>
		<section class="about">
			<div class="container-fluid section-content-wrapper">
				<h2 class="section-heading section-heading--accent">Linpark High School</h2>
				<div class="row">
					<div class="col-sm-6">
						<div class="about__img-container">
							<?php if ($introduction_image_url) { ?>
								<img class="about__img" src="<?php echo $introduction_image_url; ?>" alt="School Image">
							<?php } ?>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="about__copy-container">
							<h3 class="about__title"><?php echo $introduction_title; ?></h3>
							<p class="about__copy"><?php echo $introduction_excerpt; ?></p>
							<a href="<?php echo $introduction_button_link; ?>" class="button button--red"><?php echo $introduction_button_text; ?></a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- TILES SECTION culture, sport, events apply -->
		<?php
		$tiles_pages_ids = get_post_meta($post->ID, 'tiles_tiles_pages', true);
		?>
		<section class="tiles">
			<div class="container-fluid section-content-wrapper">
				<div class="row">
					<?php
					foreach($tiles_pages_ids as $page_id) {
						$page_title = get_the_title($page_id);
						$page_url = get_permalink($page_id);
						$page_image_url = get_the_post_thumbnail_url($page_id, 'linpark-medium');
					?>
						<div class="col-sm-6 col-lg-3">
							<a href="<?php echo $page_url; ?>" class="tile <?php if ($page_id === end($tiles_pages_ids)) { echo 'tile--red-overlay'; } ?>"
								<?php if ($page_image_url) { ?>
									style="background-image: url('<?php echo $page_image_url; ?>')"
								<?php } ?>
							>
								<h3 class="tile__title"><?php echo $page_title; ?></h3>
							</a>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</section>

		<!-- Info -->
		<section class="info">
			<div class="container-fluid section-content-wrapper">
				<div class="row">
					<div class="col-md-6">
						<h2 class="section-heading section-heading--accent">Latest News</h2>
						<?php
						$newsletter_posts = new WP_Query(array(
							'posts_per_page' => 3,
							'category_name' => 'news'
						));
						if ($newsletter_posts->have_posts()){
						?>
							<div class="latest-news">
						<?php
								while($newsletter_posts->have_posts()) {
									$newsletter_posts->the_post();
									get_template_part('template-parts/post-item');
								}
								$category_id = get_cat_ID( 'news' );
						?>
								<!-- GET ARCHIVE LINK -->
								<a href="<?php echo get_term_link($category_id); ?>" class="button button--blue transparent latest-news__button">View all</a>
							</div>
						<?php
						} else {
						?>
							<p>No posts.</p>
						<?php
						}
						wp_reset_postdata();
						?>
					</div>
					<div class="col-md-6">
						<h2 class="section-heading section-heading--accent">Upcoming Events</h2>
						<?php
						$event_posts = new WP_Query(array(
							'post_type' => 'events',
							'posts_per_page' => 2
						));
						if ($event_posts->have_posts()){
						?>
							<div class="upcoming-events">
								<div class="row">
						<?php 
									while($event_posts->have_posts()) {
										$event_posts->the_post();
									?>
										
										<div class="col-12 col-sm-6 col-md-12 col-lg-6">
									<?php
											get_template_part('template-parts/event-item');
									?>
										</div>
									<?php
									}
						?>
									<div class="col-12">
										<!-- GET ARCHIVE LINK -->
										<a href="<?php echo get_post_type_archive_link('events'); ?>" class="button button--blue transparent latest-news__button">View all</a>
									</div>
								</div>
							</div>
						<?php
						} else {
						?>
							<p>No upcoming events.</p>
						<?php
						}
						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</section>
		
		<!-- Gallery -->
		<section class="gallery">
			
		</section>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();