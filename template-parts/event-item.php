<?php 
$event_date = get_event_date();
?>

<div class="event-item" onclick="location.href='<?php the_permalink(); ?>'" tabindex=0>
	<div class="event-item__thumbnail" 
	<?php if (has_post_thumbnail()) { ?>
	style="background-image: url('<?php the_post_thumbnail_url(); ?>')<?php } ?>"></div>
	<div class="event-item__info">
		<div class="event-date">
			<span class="event-date__day"><?php echo $event_date['start']['day']; ?></span>
			<span class="event-date__month"><?php echo $event_date['start']['month']; ?></span>
			<span class="event-date__year"><?php echo $event_date['start']['year']; ?></span>
		</div>
		<h3 class="event-item__name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php if (is_archive()) { ?>
		<a href="<?php the_permalink(); ?>" class="event-item__link">
			<svg class="event-item__link-icon" aria-hidden="true">
				<use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/assets/icons/symbol-defs.svg#icon-chevron-thin-right" />
			</svg>
		</a>
		<?php } ?>
	</div>
</div>