<section class="services-links">
	<div class="container">
		<?php get_template_part('/layouts/partials/title', null, array(
			'class' => 'services-links__title',
			'title' => get_sub_field('title')
		)); ?>

		<?php
			$links = get_sub_field( 'links' );
			if ( $links ) :
		?>
			<div class="services-links__links">
				<?php foreach ( $links as $link ) : ?>
					<a href="<?php echo esc_html( $link['link']['url'] ); ?>" class="btn services-links__link" target="<?php echo $link['link']['target']; ?>">
						<?php echo $link['link']['title']; ?>
						<svg width="24" height="26"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
