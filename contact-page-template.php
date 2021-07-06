<?php 
/* Template Name: Contact Page */ 


get_header();
?>

	<main id="linpark-contact" class="site-main contact">
		<?php
		while(have_posts()) {
			the_post();
		?>
			
		<?php get_template_part('template-parts/page-header'); ?>

		<section class="main-content-section">
			<div class="container-fluid section-content-wrapper">
				<div class="row">
					<div class="col-12">
						<div class="contact__content">
							<div class="row">
								<div class="col-12 col-lg-6">
									<h3 class="contact__heading">Get in touch</h3>
									<div class="contact-info">
										<a href="tel:+27333441544" class="contact-info__detail">
											<svg class="contact-info__icon" aria-hidden="true">
												<use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/assets/icons/symbol-defs.svg#icon-phone" />
											</svg>
											033 344 1544
										</p>
										<a href="mailto:info@lhs.co.za" class="contact-info__detail">
											<svg class="contact-info__icon" aria-hidden="true">
												<use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/assets/icons/symbol-defs.svg#icon-envelope" />
											</svg>
											info@lhs.co.za
										</a>
										<p class="contact-info__detail">
											<svg class="contact-info__icon contact-info__icon--location" aria-hidden="true">
												<use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/assets/icons/symbol-defs.svg#icon-location" />
											</svg>
											Claude Forsyth Rd, Boughton, Pietermaritzburg, 3201
										</p>
									</div>
									<div class="contact-social">
										<div class="social">
											<a href="#" class="social__link">
												<svg class="social__icon" aria-hidden="true">
													<use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/assets/icons/symbol-defs.svg#icon-facebook" />
												</svg>
											</a>
											<a href="#" class="social__link">
												<svg class="social__icon" aria-hidden="true">
													<use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/assets/icons/symbol-defs.svg#icon-linkedin" />
												</svg>
											</a>
										</div>
									</div>
								</div>
								<div class="col-12 col-lg-6">
									<!--The div element for the map -->
									<div id="map">
										<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3469.054808470378!2d30.316094417196666!3d-29.6020929372037!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd970fa8f1468652!2sLinpark%20High%20School!5e0!3m2!1sen!2sza!4v1621362140578!5m2!1sen!2sza" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
									</div>

									<!-- <h3 class="contact__heading">Send us a message</h3>
									<form id="contact-form" class="contact-form" action="#">
										<div class="row">
											<div class="col-12 col-md-6">
												<div class="contact-form__input-group">
													<label for="first-name" class="contact-form__label">First Name</label>
													<input type="text" class="contact-form__input" id="first-name" name="first-name">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="contact-form__input-group">
													<label for="last-name" class="contact-form__label">Last Name</label>
													<input type="text" class="contact-form__input" id="last-name" name="last-name">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<div class="contact-form__input-group">
													<label for="email" class="contact-form__label">Email</label>
													<input type="text" class="contact-form__input" id="email" name="email">
												</div>
												<div class="contact-form__input-group">
													<label for="message" class="contact-form__label">Message</label>
													<textarea class="contact-form__input" name="message" id="message" rows="3"></textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<div class="contact-form__input-group">
													<button class="button contact-form__submit-button" type="submit">Submit</button>
												</div>
											</div>
										</div>
									</form> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
		}
		?>
	</main>

<?php
get_footer();