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
			$slogan_titolo = get_field('slogan_titolo', $query_servizi->ID);
			$descrizione_breve = get_field('descrizione_breve', $query_servizi->ID);
		?>
		<div class="col-md-2 text-center slider_controller">
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
	<div class="row">
		<?php
		while ($query_servizi->have_posts()): $query_servizi->the_post();
		?>
		
			<div class="col-md-4 slider_text">
				asdf	
			</div>
			<div class="col-md-8 slider_image">
				asdfasdfasdf
			</div>
		
		<?php
		endwhile;
	?>
	</div>

	<?php 
	endif;
	wp_reset_postdata();
	wp_reset_query();
 ?>
</section>