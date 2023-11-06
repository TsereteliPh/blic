<section class="image-link">
	<div class="container">
		<?php
			get_template_part('/layouts/partials/title', null, array(
				'class' => 'image-link__title',
				'title' => get_sub_field('title')
			));

			$text = get_sub_field( 'text' );
			$link = get_sub_field( 'link' );
			$img = get_sub_field( 'img' );
		?>

		<div class="image-link__wrapper">
			<div class="image-link__content">
				<?php if ( $text ) : ?>
					<div class="image-link__text"><?php the_sub_field( 'text' ); ?></div>
				<?php endif; ?>

				<?php if ( $link ) : ?>
					<a href="<?php echo $link['url']; ?>" class="btn image-link__link" target="<?php echo $link['target']; ?>">
						<?php echo ( $link['title'] ) ? $link['title'] : 'Read more'; ?>
						<svg width="17" height="17"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
					</a>
				<?php endif; ?>
			</div>

			<div class="image-link__img">
				<?php
					if ( $img ) {
						echo wp_get_attachment_image( $img, 'full', false );
					} else {
						echo wp_get_attachment_image( 92, 'full', false );
					}
				?>
			</div>
		</div>
	</div>
</section>
