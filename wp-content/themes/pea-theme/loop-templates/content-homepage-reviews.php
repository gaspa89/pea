<?php 
$array_reviews = array(
		'post_type'	=>	'recensioni',
		'order_by'	=>	'date', 
		'order'		=>	'ASC'
); 

$query_reviews = new WP_Query($array_reviews);
if($query_reviews->have_posts()): ?>

	<section class="reviews">
		<div class="swiper-container gallery-reviews">
    		<div class="swiper-wrapper">
    <?php
	while($query_reviews->have_posts()): $query_reviews->the_post();
		$nome_recensione = get_field('nome');
	?>	
			 <div class="swiper-slide">
			 	<img class="icona_recensione mb-5" src="<?php echo get_stylesheet_directory_uri()?>/src/assets/comments-solid.svg">
			 	<?php the_title( '<p class="titolo_recensione">', '</p>', true ); ?>
			 	<span class="nome_recensione"><?php echo $nome_recensione ?></span>
      		</div>
	<?php
	endwhile;
	?>
			</div>
		    <!-- Add Pagination -->
		    <div class="swiper-pagination"></div>
	 	</div>
	</section>
<?php
endif;
wp_reset_query();
wp_reset_postdata();
?>
