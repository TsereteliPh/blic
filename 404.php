<?php get_header(); ?>

<section class="not-found">
	<div class="container not-found__container">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/not-found.jpg" class="not-found__img" alt="Not found page image" width="350" height="550">

		<div class="not-found__content">
			<h1 class="not-found__title">
				OOPS...<br>
				page not found
			</h1>

			<a href="<?php echo bloginfo( 'url' ); ?>" class="btn not-found__link">
				Return to the main page
				<svg width="17" height="17"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
			</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
