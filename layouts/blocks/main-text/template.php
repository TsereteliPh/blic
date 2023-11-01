<section class="main-text">
	<div class="container">
		<?php
			get_template_part('/layouts/partials/title', null, array(
				'class' => 'title--default main-text__title',
				'title' => get_sub_field('title')
			));

			if ( get_sub_field( 'text' ) ) :
		?>
			<div class="main-text__text"><?php the_sub_field( 'text' ); ?></div>
		<?php endif; ?>
	</div>
</section>
