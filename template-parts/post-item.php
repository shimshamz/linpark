<article class="post-item" onclick="location.href='<?php the_permalink(); ?>'">
	<div class="post-item__thumbnail" 
	<?php if (has_post_thumbnail()) { ?>
	style="background-image: url('<?php the_post_thumbnail_url(); ?>')<?php } ?>"></div>
	<div class="post-item__content">
		<h3 class="post-item__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p class="post-item__excerpt"><?php echo get_the_excerpt(); ?></p>
		<?php if (is_archive()) { ?>
		<a href="<?php the_permalink(); ?>" class="post-item__link">Read more</a>
		<?php } ?>
	</div>
</article>