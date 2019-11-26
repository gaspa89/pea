<?php
/**
 * Template Name: Contatti
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

//
$immagine_hero = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
$slogan_titolo = get_field('slogan_header');
?>

<section id="hero_slogan" class="internal_hero_slogan" style="background-image: url(<?php echo $immagine_hero[0] ?>);" >
    <div class="container h-100">
    	<div class="row align-items-center h-100 align-content-end">
			<div class="col-md-6">
				<h1 class="titolo_pagina"><?php echo $slogan_titolo ?></h1>
			</div>
    	</div>
	</div>
</section>



<div class="wrapper pb-0" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'contatti' ); ?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

	<div class="container-fuid">
		<section class="mappa-contatti">
			<div id="mappa-contatti"></div>
		</section>
	</div>
	<div class="container-fuid indicazioni-mappa">
		<section class="indicazioni-mappa-cta p-5">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-8">
						<h3>Come raggiungerci?</h3>
						<p>La nostra sede è a Caravaggio (BG) in Via Folcero, 22.</p>
					</div>
					<div class="col-md-4">
						<a href="https://www.google.com/maps/place/Agenzia+Pea+-+Pratiche+Automobilistiche/@45.4959308,9.6433289,17z/data=!3m1!4b1!4m5!3m4!1s0x478137e208adca29:0xdcabdf25c2bb07f2!8m2!3d45.4959308!4d9.6455176" class="btn pulsante-cta" target="_blank">INDICAZIONI STRADALI</a>
					</div>
				</div>
			</div>
		</section>
	</div>

</div><!-- #full-width-page-wrapper -->

<?php get_footer();
