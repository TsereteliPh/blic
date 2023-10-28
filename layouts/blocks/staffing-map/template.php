<section class="staffing-map">
	<div class="container">
		<?php get_template_part('/layouts/partials/title', null, array(
			'class' => 'staffing-map__main-title',
			'title' => get_sub_field('title')
		)); ?>

		<div class="staffing-map__map">
			<div class="staffing-map__region-wrapper">
				<?php
					$region1 = get_sub_field( 'region_1' );
					$region2 = get_sub_field( 'region_2' );

					if ( $region1 ) :
				?>
					<div class="staffing-map__region">
						<span></span>
						<?php echo $region1; ?>
					</div>
				<?php endif; ?>

				<?php if ( $region2 ) : ?>
					<div class="staffing-map__region">
						<span></span>
						<?php echo $region2; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="staffing-map__info">
			<?php
				$current = get_sub_field( 'current' );
				$specialties = get_sub_field( 'specialties' );
				$planned = get_sub_field( 'planned' );

				if ( $current ) :
			?>
				<div class="staffing-map__current">
					<h2 class="title staffing-map__title">Current database</h2>

					<div class="staffing-map__current-numbers">
						<div class="staffing-map__number"><?php echo $current; ?></div>

						<span>active candidates as of today</span>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( $specialties ) : ?>
				<div class="staffing-map__specialties">
					<h2 class="title staffing-map__title">Specialties</h2>

					<div class="staffing-map__specialties-text"><?php echo $specialties; ?></div>
				</div>
			<?php endif; ?>

			<?php if ( $planned ) : ?>
				<div class="staffing-map__planned">
					<h2 class="title staffing-map__title">Planned Database</h2>

					<div class="staffing-map__planned-wrapper">
						<?php foreach ( $planned as $item ) : ?>
							<div class="staffing-map__planned-interval">
								<div class="staffing-map__number"><?php echo $item['database']; ?></div>

								<time class="staffing-map__date" datetime="<?php echo $item['date']; ?>">by <?php echo date( 'F Y', strtotime($item['date']) ); ?></time>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
