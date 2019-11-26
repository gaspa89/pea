<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper wrapper-footer" id="wrapper-footer">
	<div class="<?php echo esc_attr( $container ); ?>">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/assets/logo-agenzia-Pea-footer.svg" style="height: 70px; width: auto; margin-bottom: 10px;">
						<?php dynamic_sidebar('footer-1'); ?>
						<div class="social">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/assets/logo-linkedin.svg">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/assets/logo-facebook.svg">
						</div>
						<div class="orari">
							<strong>Orari di apertura:</strong><br>
							Lun/Ven 08:45 - 12:15 e 15:00 - 19:00<br>Sab 09:00 - 12:00
						</div>
					</div>
					<div class="col-md-4 contattaci_footer">
						<p><strong>PER INFORMAZIONI CONTATTACI QUI</strong></p>
						<?php echo do_shortcode('[contact-form-7 id="74" title="Form_Footer"]'); ?>
					</div>
					<div class="col-md-4">
						<div id="map-footer"></div>
					</div>
				</div>

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-Nre1J3c_-7HzLNHlz0cwS6CgPPR991M&callback=InitializeMaps">
    </script>

</body>

</html>

