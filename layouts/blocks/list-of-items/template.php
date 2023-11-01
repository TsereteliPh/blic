<section class="list-of-items">
	<div class="container list-of-items__container">
		<div class="list-of-items__title-wrapper">
			<?php get_template_part('/layouts/partials/title', null, array(
				'class' => 'list-of-items__title',
				'title' => get_sub_field('title')
			)); ?>

			<?php if ( get_sub_field( 'text' ) ) : ?>
				<div class="list-of-items__text"><?php the_sub_field( 'text' ); ?></div>
			<?php endif; ?>
		</div>

		<?php
			$list = get_sub_field( 'list' );
			if ( $list ) :
		?>
			<ul class="reset-list list-of-items__list">
				<?php foreach ( $list as $item ) : ?>
					<li class="list-of-items__item"><?php echo $item['item']; ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
