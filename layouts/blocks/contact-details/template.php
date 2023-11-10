<section class="contact-details">
	<div class="container contact-details__container">
		<?php get_template_part('/layouts/partials/title', null, array(
			'class' => 'contact-details__title',
			'title' => get_sub_field('title')
		)); ?>

		<?php
			$address = get_field( 'address', 'options' );
			$tel = get_field( 'phone', 'options' );
			$email = get_field( 'email', 'options' );

			if ( $address || $tel || $email ) :
		?>
			<ul class="reset-list contact-details__list">
				<?php if ( $address ) : ?>
					<li class="contact-details__item">
						<div class="contact-details__label">Address</div>

						<address class="contact-details__link"><?php echo $address; ?></address>
					</li>
				<?php endif; ?>

				<?php if ( $tel ) : ?>
					<li class="contact-details__item">
						<div class="contact-details__label">Phone</div>

						<a href="tel:<?php echo preg_replace( '/[^0-9,+]/', '', $tel ); ?>" class="contact-details__link"><?php echo $tel; ?></a>
					</li>
				<?php endif; ?>

				<?php if ( $email ) : ?>
					<li class="contact-details__item">
						<div class="contact-details__label">Email</div>

						<a href="mailto:<?php echo $email ?>" class="contact-details__link"><?php echo $email; ?></a>
					</li>
				<?php endif; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
