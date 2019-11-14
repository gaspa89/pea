<section class="slider_homepage">
<?php 
	$array_servizi = array(
		'post_type' 	=> 'page',
		'post_parent'	=> 33,
		'order_by'		=> 'DATE', 
		'order'			=> 'ASC'
	);

	$query_servizi = new WP_Query($array_servizi);

	if($query_servizi->have_posts()):
	?>
	<div class="row">
	<?php
		while ($query_servizi->have_posts()): $query_servizi->the_post();
			
			$icona_slider = get_field('icona_pagina', $query_servizi->ID);
			
		?>
		<div class="col-md-2 text-center slider_controller active">
			<div class="icona_container">
				<div class="icona_slider">
					<img src="<?php echo $icona_slider['url']; ?>">
				</div>
			</div>
			<?php echo get_the_title(); ?>	
		</div>
		<?php
		endwhile;
	?>
	</div>
		<div class="swiper-container">
			<div class="swiper-wrapper">
			<div class="row">	
			<?php
			while ($query_servizi->have_posts()): $query_servizi->the_post();
			
				$slogan_titolo = get_field('slogan_titolo', $query_servizi->ID);
				$descrizione_breve = get_field('descrizione_breve_servizio', $query_servizi->ID);
				$immagine_servizio = get_the_post_thumbnail_url( $query_servizi->ID, 'slide_servizio', false );
				?>
				<div class="swiper-slide">
					<div class="col-md-4 slider_text">
						<h2><?php echo $slogan_titolo ?></h2>
						<p><?php echo $descrizione_breve; ?></p>
					</div>
					<div class="col-md-8 slider_image p-0">
						<img src="<?php echo $immagine_servizio ?>">
					</div>
				</div>
			<?php
			endwhile;
		?>
			</div>
			
			</div>
		</div>
	<?php 
	endif;
	wp_reset_postdata();
	wp_reset_query();
 ?>
</section>
