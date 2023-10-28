<?php
	$img = get_sub_field( 'img' );
	$align = get_sub_field( 'text_align' );
	$text = get_sub_field( 'text' );
	$extra = false;

	if ( $align == 'left' && $text ) {
		$extra = ' image-text__content--left';
	} else if ( $align == 'right' && $text ) {
		$extra = ' image-text__content--right';
	}
?>
<section class="image-text">
	<div class="container image-text__container">
		<?php get_template_part('/layouts/partials/title', null, array(
			'class' => 'image-text__title',
			'title' => get_sub_field('title')
		)); ?>

		<div class="image-text__content<?php echo ( $extra ) ? $extra : ''; ?>">
			<div class="image-text__img">
				<?php
					if ( $img ) {
						echo wp_get_attachment_image( $img, 'full', false );
					} else {
						echo wp_get_attachment_image( 92, 'full', false );
					}
				?>
			</div>

			<?php if ( $text ) : ?>
				<div class="image-text__text"><?php echo $text ?></div>
			<?php endif; ?>
			</div>
	</div>
</section>
