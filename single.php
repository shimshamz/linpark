<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Linpark
 */

get_header();
?>

	<main id="linpark-single" class="site-main">
		<?php
		while(have_posts()) {
			the_post();
			$date = date('j F Y', get_the_date('U'));
		?>
			<div class="container-fluid section-content-wrapper">
				<div class="row">
					<div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-0 col-xl-9">
						<article class="article">
							<!-- Add article tags and categories -->
							<h1 class="article__title"><?php the_title(); ?></h1>
							<?php
							if (get_post_type() === 'post') {
							?>
								<div class="article__meta">
									<p class="article__date"><?php echo $date; ?></p>
									<?php
									if (has_tag()) {
									?>
										<p class="subject-tags article__tags">
											Tags: 
											<?php
											$post_tags = get_tags();
											foreach($post_tags as $key => $tag) {
											?>
												<a href="<?php echo get_tag_link($tag->term_id); ?>" class="subject-tags__link"><?php echo $tag->name; ?></a>
											<?php 
												if ($key != array_key_last($post_tags)) {
													echo ' | ';
												}
											?>
											<?php
											}
											?>
										</p>
									<?php
									}
									?>
								</div>
							<?php
							}
							if (has_post_thumbnail()) {
							?>
								<picture class="article__img">
									<source media="(min-width: 768px)" srcset="<?php echo get_the_post_thumbnail_url($post->ID, 'large'); ?>">
									<img src="<?php echo get_the_post_thumbnail_url($post->ID, 'medium_large'); ?>" alt="<?php the_title(); ?> image">
								</picture>
							<?php 
							} else {
							?>
							<hr class="divider">
							<?php 
							}
							?>
							<div class="article__content">
								<?php
								if (get_post_type() === 'events') {
									$event_date = get_event_date();
									$date = $event_date['start']['day'] . ' ' . $event_date['start']['month'] . ' ' . $event_date['start']['year'];
									if ($event_date['end']) {
										$date .= ' - ' . $event_date['end']['day'] . ' ' . $event_date['end']['month'] . ' ' . $event_date['end']['year'];
									}
									$event_time = get_event_time();
									$time = $event_time['start'];
									if ($event_time['end']) {
										$time .= ' - ' . $event_time['end'];
									}
								?>
									<div class="event-info">
										<div class="event-info__dates">
											<svg class="event-info__icon" aria-hidden="true">
												<use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/assets/icons/symbol-defs.svg#icon-calendar" />
											</svg>
											<span class="event-info__text"><?php echo $date; ?></span>
										</div>
										<div class="event-info__times">
											<svg class="event-info__icon" aria-hidden="true">
												<use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/assets/icons/symbol-defs.svg#icon-access_time" />
											</svg>
											<span class="event-info__text"><?php echo $time; ?></span>
										</div>
									</div>
								<?php
								}
								the_content(); ?>
							</div>
						</article>
					</div>
					<div class="col-12 col-md-10 offset-md-1 col-lg-4 offset-lg-0 col-xl-3">
						<aside class="sidebar">
							<div class="sidebar__item">
								<h4 class="sidebar__heading sidebar__heading--accent"><span>Newsletters</span></h4>
								<div class="sidebar__content">
									<?php
									$newsletter_posts = new WP_Query(array(
										'posts_per_page' => 3,
										'category_name' => 'news',
										'post__not_in' => array($post->ID)
									));
									?>
									<div class="more-newsletters">
										<?php
										while($newsletter_posts->have_posts()) {
											$newsletter_posts->the_post();
											get_template_part('template-parts/post-item');
										}
										?>
									</div>
								</div>
							</div>
							<?php
							$categories = get_categories();
							if ($categories) {
							?>
							<div class="sidebar__item">
								<h4 class="sidebar__heading sidebar__heading--accent"><span>Categories</span></h4>
								<div class="sidebar__content">
									<ul class="categories">
										<?php
										foreach($categories as $category) {
										?>
											<li class="categories__item"><a href="<?php echo get_category_link($category->term_id); ?>" class="categories__link"><?php echo $category->name; ?></a></li>
										<?php
										}
										?>
									</ul>
								</div>
							</div>
							<?php
							}
							?>
							<div class="sidebar__item">
								<h4 class="sidebar__heading sidebar__heading--accent"><span>Share</span></h4>
								<div class="sidebar__content">
									<?php $article_link = get_the_permalink(); ?>
									<div class="social">
										<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $article_link; ?>" onclick="window.open(this.href,'targetWindow','width=600,height=600,left=100,top=100')" target="_blank" class="social__link">
											<svg class="social__icon" aria-hidden="true">
												<use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/assets/icons/symbol-defs.svg#icon-facebook" />
											</svg>
										</a>
										<!-- <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php //echo $article_link; ?>" onclick="window.open(this.href,'targetWindow','width=600,height=600,left=100,top=100')" target="_blank" class="social__link">
											<svg class="social__icon" aria-hidden="true">
												<use xlink:href="<?php //bloginfo('stylesheet_directory'); ?>/assets/icons/symbol-defs.svg#icon-linkedin" />
											</svg>
										</a> -->
									</div>
								</div>
							</div>
						</aside>
					</div>
				</div>
			</div>
		<?php
		}
		?>
	</main>
	
<?php
// get_sidebar();
get_footer();
