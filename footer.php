</main>

<footer class="footer">
	<div class="container footer__container">
		<div class="footer__wrapper">
			<a href="<?php echo bloginfo( 'url' ); ?>" class="footer__logo" aria-label="Blic staffing logo"></a>

			<?php
				wp_nav_menu(array(
					'theme_location' => 'menu_footer',
					'container' => '',
					'menu_id' => 'menu-footer',
					'menu_class' => 'reset-list footer__menu'
				));

				$tel = get_field( 'phone', 'options' );
				$telFormatted = preg_replace( '/[^0-9,+]/', '', $tel );
				$email = get_field( 'email', 'options' );

				if ( $tel || $email ) :
			?>

				<div class="footer__contacts">
					<?php if ( $tel ) : ?>
						<a href="tel:<?php echo $telFormatted; ?>" class="footer__phone"><?php echo $tel; ?></a>
					<?php endif; ?>

					<?php if ( $email ) : ?>
						<a href="mailto:<?php echo $email; ?>" class="footer__email"><?php echo $email; ?></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>

		<div class="footer__links">
			<div class="footer__copyright">© 2023 BLIC STAFFING Renewable Energy. All rights reserved</div>

			<a href="<?php echo get_page_link( 66 ); ?>" class="footer__terms">Terms&nbsp;of&nbsp;service</a>

			<a href="<?php echo get_privacy_policy_url(); ?>" class="footer__policy">Privacy&nbsp;Policy</a>

			<div class="footer__designer">
				Designed by:
				<a href="https://www.behance.net/dashess265" target="_blank">Daria&nbsp;Blokhina</a>
			</div>
		</div>
	</div>
</footer>

<?php get_template_part('layouts/partials/modals'); ?>

<?php wp_footer(); ?>

</body>
</html>
