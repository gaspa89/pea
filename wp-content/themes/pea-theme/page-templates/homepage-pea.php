<?php
/**
 * Template Name: HOMEPAGE PEA
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
$titolo_hero = get_field('slogan_hero');
$servizi_home = get_field('servizi_home');
$carosello_home = get_field('carosello_home');
?>

<section id="hero_slogan" class="homepage_hero_slogan immagine_hero wh-100 position-relative">
	<div id="carouselExampleSlidesOnly" class="carousel slide h-100 carousel-fade" data-ride="carousel" style="z-index: -1;">
	  <div class="carousel-inner h-100">
	  	<?php $i=0; ?>
	  	<?php foreach($carosello_home as $immagine_carosello): ?>
	    	<div class="carousel-item <?php if($i==0): echo "active";endif; ?> h-100" style="background-image:linear-gradient(to right, rgba(0,0,0,0.7), rgba(0,0,0,0)), url(<?php echo $immagine_carosello['immagini_carosello']['url'] ?>); background-size: cover; background-repeat: no-repeat;"></div>
	    <?php 
	    	$i++;
			endforeach; ?>
	  </div>
	</div>
	<div class="row align-items-center w-100 h-100" style="position: absolute; top: 0; margin: 0 auto;">
		<div class="container">
			<div class="col-md-6 px-3 p-md-0">
	    		<h1 class="titolo_hero">
	    			<?php echo $titolo_hero ?>
	    		</h1>
	    		<ul class="lista_hero">
		    	<?php 
		    		foreach($servizi_home as $servizio):
		    	?>
		    	 	<li> <?php echo $servizio['servizio']; ?></li>
		    	<?php 
		    	 	endforeach;
		    	 ?>
	    		</ul>
	    	<button class="btn btn-primary">Scopri tutti i servizi</button>
	    	</div>
    	</div>
	</div>
</section>

<!-- <section id="homepage_hero_slogan" class="homepage_hero_slogan immagine_hero" style="background-image: url(<?php echo $immagine_hero[0] ?>);" >

    <div class="row align-items-center h-100">
		<div class="container">
			<div class="col-md-6 px-3 p-md-0">
	    		<h1 class="titolo_hero">
	    			<?php echo $titolo_hero ?>
	    		</h1>
	    		<ul class="lista_hero">
		    	<?php 
		    		foreach($servizi_home as $servizio):
		    	?>
		    	 	<li> <?php echo $servizio['servizio']; ?></li>
		    	<?php 
		    	 	endforeach;
		    	 ?>
	    		</ul>
	    	<button class="btn btn-primary">Scopri tutti i servizi</button>
	    	</div>
    	</div>
	</div>
</section> -->


<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'homepage' ); ?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

	<!-- Sezione Recensioni -->
	<div class="container-fluid p-0">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'loop-templates/content-homepage', 'reviews' ); ?>
		<?php endwhile; // end of the loop. ?>
	</div>

	
	<div class="<?php echo esc_attr( $container ); ?>" id="content">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'loop-templates/content-homepage', 'call2action' ); ?>
		<?php endwhile; // end of the loop. ?>
	</div>


</div><!-- #full-width-page-wrapper -->

<?php get_footer();
