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
						<?php dynamic_sidebar('footer-1'); ?>
						<div class="social">
							icone social
						</div>
						<div class="orari">
							Orari di apertura
						</div>
					</div>
					<div class="col-md-4"><?php dynamic_sidebar('footer-2'); ?></div>
					<div class="col-md-4"><?php dynamic_sidebar('footer-3'); ?></div>
				</div>

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

