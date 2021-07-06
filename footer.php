<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Linpark
 */

?>

	<footer class="footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<a href="<?php echo site_url(); ?>" class="footer__logo footer__logo--school-logo">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/brand/linpark-logo-vertical.png" alt="Linpark Footer Logo">
					</a>
					<div class="row">
						<div class="col-md-4 col-lg-4 footer-column">
							<h4 class="footer-column__heading">
								Quick Links
							</h4>
							<div class="footer-column__body">
								<div class="footer-menu">
									<?php
									wp_nav_menu(
										array(
											'menu_class' => 'footer-menu__list',
											'container' => '',
											'theme_location' => 'footer',
										)
									);
									?>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-lg-4 footer-column">
							<h4 class="footer-column__heading">
								Contact Us
							</h4>
							<div class="footer-column__body">
								<div class="contact">
									<ul class="contact-list">
										<li class="contact-list__item">
											<p><strong>Address: </strong>Claude Forsyth Rd, Boughton, Pietermaritzburg, 3201</p>
										</li>
										<li class="contact-list__item">
											<p><strong>Email: </strong><a href="mailto:info@lhs.co.za" >info@lhs.co.za</a></p>
										</li>
										<li class="contact-list__item">
											<p><strong>Phone: </strong>
											<a href="tel:+27333441544">033 344 1544</a></p>
										</li>
									</ul>
									<div class="social">
										<a href="#" class="social__link">
											<svg class="social__icon" aria-hidden="true">
												<use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/assets/icons/symbol-defs.svg#icon-facebook" />
											</svg>
										</a>
										<a href="#" class="social__link">
											<svg class="social__icon" aria-hidden="true">
												<use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/assets/icons/symbol-defs.svg#icon-instagram" />
											</svg>
										</a>
										<!-- <a href="#" class="social__link">
											<svg class="social__icon" aria-hidden="true">
												<use xlink:href="<?php //bloginfo('stylesheet_directory'); ?>/assets/icons/symbol-defs.svg#icon-linkedin" />
											</svg>
										</a> -->
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-lg-4 footer-column">
							<h4 class="footer-column__heading">
								Members of
							</h4>
							<div class="footer-column__body">
								<a href="https://d6.co.za/education/downloads/" target="_blank" class="footer__logo footer__logo--member-logo">
									<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/d6-icon.png" alt="D6 Logo">
								</a>
								<a href="https://www.gbf.org.za/" target="_blank" class="footer__logo footer__logo--member-logo">
									<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/gbf-logo.jpg" alt="Governing Body Foundation Logo">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright">
			<p class="copyright__text">Copyright &#169; <?php echo date('Y'); ?> Linpark High School. All rights reserved.</p>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
