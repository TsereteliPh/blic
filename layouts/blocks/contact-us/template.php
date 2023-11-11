<section class="contact-us">
	<div class="container contact-us__container">
		<div class="contact-us__info">
			<?php get_template_part('/layouts/partials/title', null, array(
				'class' => 'contact-us__title',
				'title' => get_sub_field('title')
			)); ?>

			<?php if ( get_sub_field( 'text' ) ) : ?>
				<div class="contact-us__text"><?php the_sub_field( 'text' ); ?></div>
			<?php endif; ?>
		</div>

		<form class="contact-us__form" method="form" name="Feedback">
			<?php
				wp_nonce_field( 'Feedback', 'contact-us_input' );

				if (is_archive()) {
					$pageTitle = get_the_archive_title();
				} else {
					$pageTitle = get_the_title();
				}
			?>

			<input type="text" class="hidden" name="page_request" value="<?php echo $pageTitle; ?>">

			<input class="input contact-us__input" type="text" name="client_name" placeholder="Full Name"  autocompete="name" required>

			<input class="input contact-us__input" type="email" name="client_email" placeholder="Email address" autocompete="email" required>

			<input class="input contact-us__input" type="tel" name="client_tel" placeholder="Phone number" autocompete="off" required>

			<textarea class="input contact-us__textarea" placeholder="Your enquiry"></textarea>

			<label class="policy-check contact-us__policy">
				<input type="checkbox" name="policy" class="policy-check__input" required checked>
				<span class="policy-check__switcher"></span>
				<span class="policy-check__text">I confirm that I have read and agreed with <a href="<?php get_page_link( 66 ); ?>">Terms of Use</a> and <a href="<?php echo get_privacy_policy_url(); ?>">Privacy Policy</a></span>
			</label>

			<button class="btn contact-us__submit" type="submit">
				Submit now
				<svg width="17" height="17"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
			</button>
		</form>

		<?php
			if ( get_sub_field( 'img' ) ) {
				echo wp_get_attachment_image( get_sub_field( 'img' ), 'large', false, array(
					'class' => 'contact-us__img'
				) );
			} else {
				echo '<img class="contact-us__img" src="' . get_template_directory_uri() . '/assets/images/wind-generator.jpg" alt="Wind generator image" width="294" height="432">';
			}
		?>
	</div>
</section>
