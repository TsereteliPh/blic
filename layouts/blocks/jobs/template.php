<?php
	$vacancies = get_sub_field( 'vacancies' );
	$link = get_sub_field( 'link' );
?>
<section class="jobs">
	<div class="container jobs__container">
		<div class="jobs__title-wrapper">
			<?php get_template_part('/layouts/partials/title', null, array(
				'class' => 'jobs__title',
				'title' => get_sub_field('title')
			)); ?>

			<?php if ( $link ) : ?>
				<a href="<?php echo $link['url']; ?>" class="btn jobs__link" target="<?php echo $link['target']; ?>">
					<?php echo $link['title']; ?>
					<svg width="17" height="17"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
				</a>
			<?php endif; ?>
		</div>

		<?php if ( $vacancies ) : ?>
			<ul class="reset-list jobs__list">
				<?php foreach ( $vacancies as $vacation ) :?>
                    <li class="jobs__item">
						<div class="jobs__item-wrapper">
							<div class="title jobs__item-label"><?php echo $vacation['label']; ?></div>

							<?php if ( $vacation['text'] ) : ?>
								<div class="jobs__item-text"><?php echo $vacation['text']; ?></div>
							<?php endif; ?>
						</div>

						<?php if ( $vacation['geo'] ) : ?>
							<div class="jobs__item-demand">
								<svg width="21" height="21"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-geo"></use></svg>
								<?php echo $vacation['geo']; ?>
							</div>
						<?php endif; ?>

						<?php if ( $vacation['employment'] ) : ?>
							<div class="jobs__item-demand">
								<svg width="21" height="21"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-employment"></use></svg>
								<?php echo $vacation['employment']; ?>
							</div>
						<?php endif; ?>

						<?php if ( $vacation['type'] ) : ?>
							<div class="jobs__item-demand">
								<svg width="21" height="21"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-suitcase"></use></svg>
								<?php echo $vacation['type']; ?>
							</div>
						<?php endif; ?>

						<button class="btn jobs__modal" data-fancybox data-src="#application">
							Apply now
							<svg width="17" height="17"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
						</button>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
