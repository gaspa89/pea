<section class="metodi-contatto">
	<div class="container">
		<div class="row">
			<div class="col-md-3 blocco-contatto">
				<div class="quadrato-contatto">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/src/assets/icone-svg/mobile-alt-solid.svg" style="width:50px;"><br>
					<div class="pb-4">
						CHIAMA IL<br>
						<span style="font-size: 1rem">+39 0363 50444</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 blocco-contatto">
				<div class="quadrato-contatto">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/src/assets/icone-svg/envelope-solid.svg"><br>
					<div class="pb-4">
						SCRIVI A<br>
						<span style="font-size: 1rem"><a href="mailto:agenzia@pea.it">agenzia@pea.it</a></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 blocco-contatto">
				<div class="quadrato-contatto">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/src/assets/icone-svg/fax-solid.svg"><br>
					<div class="pb-4">
						INVIA DOCUMENTI<br>
						<span style="font-size: 1rem">Fax: 0363 350674</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 blocco-contatto">
				<div class="quadrato-contatto">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/src/assets/icone-svg/map-marker-alt-solid.svg"><br>
					<div class="pb-4">
						RAGGIUNGICI IN<br>
						<span style="font-size: 1rem">Via Folcero, 22 - Caravaggio</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Sezione Contatti -->
<section class="form-contatto py-5">
	<h2 class="text-center">Dubbi? Vuoi maggiori informazioni? <span class="text-primary">Siamo a disposizione.</span></h2>
	<p class="text-center">Compila il modulo sottostante per richiedere tutte le informazioni di cui hai bisogno o per fissare un appuntamento.<br> Il nostro team ti ricontatterà in breve tempo nella maniera che preferisci.</p>

	<div class="container">
		<?php echo do_shortcode( '[contact-form-7 id="104" title="Form_Contatti"]' ); ?>
	</div>
</section>

