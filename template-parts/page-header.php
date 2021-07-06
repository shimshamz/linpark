<?php 
if (is_archive()) {
	$title = get_the_archive_title();
} else if (is_404()) {
	$title ='404 Page Not Found';
} else {
	$has_bg_img_class = has_post_thumbnail() ? 'has-bg-img' : ''; 
	$title = get_the_title();
}
?>

<header class="page-header <?php echo $has_bg_img_class; ?>">
	<div class="container-fluid section-content-wrapper">
		<div class="row">
			<div class="col-12">
				<h1 class="page-header__heading"><?php echo $title; ?></h1>
			</div>
		</div>
	</div>
</header>

<style>
<?php
if ($has_bg_img_class) {
?>
	.page-header.has-bg-img { 
		background-image: url("<?php echo get_the_post_thumbnail_url($post->ID, 'medium_large'); ?>");
	}

	@media only screen and (min-width: 768px) {
		.page-header.has-bg-img {
			background-image: url("<?php echo get_the_post_thumbnail_url($post->ID, 'large'); ?>");
		}
	}
<?php 
}
?>
</style>