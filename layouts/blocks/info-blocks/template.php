<section class="info-blocks">
	<div class="container info-blocks__container">
		<div class="info-blocks__title-wrapper">
			<?php
				get_template_part('/layouts/partials/title', null, array(
					'class' => 'info-blocks__title',
					'title' => get_sub_field('title')
				));

				$text = get_sub_field( 'text' );
				if ( $text ) :
			?>
				<div class="info-blocks__text"><?php echo $text; ?></div>
			<?php endif; ?>
		</div>

		<?php
			$infoBlocks = get_sub_field( 'info_blocks' );
			if ( $infoBlocks ) :
		?>
			<ul class="reset-list info-blocks__list">
				<?php foreach ( $infoBlocks as $item ) : ?>
					<li class="info-blocks__item">
						<?php if ( $item['title'] ) : ?>
							<h2 class="title info-blocks__item-title"><?php echo $item['title']; ?></h2>
						<?php endif; ?>

						<?php if ( $item['text'] ) : ?>
							<div class="info-blocks__item-text"><?php echo $item['text']; ?></div>
						<?php endif; ?>

						<?php
							$link = $item['link'];
							if ( $link ) :
						?>
							<a href="<?php echo $link['url']; ?>" class="btn info-blocks__item-link" target="<?php echo $link['target']; ?>">
								<?php echo ( $link['title'] ) ? $link['title'] : 'Read more'; ?>
								<svg width="17" height="17"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
							</a>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
