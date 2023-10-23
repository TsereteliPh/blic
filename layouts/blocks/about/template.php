<section class="about">
	<div class="container about__container">
		<?php
			get_template_part('/layouts/partials/title', null, array(
				'class' => 'about__title',
				'title' => get_sub_field('title')
			));

			echo wp_get_attachment_image( get_sub_field( 'img' ), 'large', false, array(
				'class' => 'about__img',
			) );
		?>

		<div class="about__wrapper">
			<div class="about__text"><?php the_sub_field( 'text' ); ?></div>

			<?php if ( get_sub_field( 'link' ) ) : ?>
				<a href="<?php the_sub_field( 'link' ); ?>" class="btn-read-more about__link">
					Read more
					<svg width="17" height="17"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>
