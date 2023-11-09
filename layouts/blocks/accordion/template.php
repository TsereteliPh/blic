<?php
	$accordion = get_sub_field( 'accordion' );
	$full_size = get_sub_field( 'full' );
?>
<section class="accordion<?php echo $full_size ? ' accordion--full-size' : ''; ?>">
	<div class="container accordion__container">
		<?php get_template_part('/layouts/partials/title', null, array(
			'class' => 'accordion__title',
			'title' => get_sub_field('title')
		)); ?>

		<?php if ( $accordion ) : ?>
			<ul class="reset-list accordion__list">
				<?php foreach ( $accordion as $item ) : ?>
					<li class="accordion__item">
						<button class="accordion__button" type="button">
							<?php echo $item['label']; ?>
							<span></span>
						</button>

						<div class="accordion__text"><?php echo $item['text']; ?></div>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
