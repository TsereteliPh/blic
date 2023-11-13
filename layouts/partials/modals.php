<?php
    if (is_archive()) {
        $pageTitle = get_the_archive_title();
    } else {
        $pageTitle = get_the_title();
    }
?>
<div class="modal modal--success" id="success">
	<h2 class="title modal__title">Thank you for application!</h2>

	<div class="modal__text">Your application has been sent successfully. We will contact you soon to clarify all the details.</div>
</div>

<div class="modal" id="application">
	<h2 class="title modal__title">Application form</h2>

	<div class="modal__text">Please provide your contact details below and we will contact you soon. Thank you for your response!</div>

	<form method="POST" class="modal__form" name="JobApplication">
		<?php wp_nonce_field( 'JobApplication', 'application_input' ); ?>

		<input type="text" class="hidden" name="page_request" value="<?php echo $pageTitle; ?>">

		<input class="input modal__input" type="text" name="client_name" placeholder="Full Name" autocompete="name" required>

		<input class="input modal__input" type="email" name="client_email" placeholder="Email address" autocompete="email" required>

		<input class="input modal__input" type="tel" name="client_tel" placeholder="Phone number" autocompete="off" required>

		<input class="hidden" type="text" name="client_position" value="">

		<input class="input modal__input" type="text" name="client_location" placeholder="Your current location" autocompete="country" required>

		<label class="policy-check modal__policy">
			<input type="checkbox" name="policy" class="policy-check__input" required checked>
			<span class="policy-check__switcher"></span>
			<span class="policy-check__text">I confirm that I have read and agreed with <a href="<?php get_page_link( 66 ); ?>">Terms & Conditions</a> and <a href="<?php echo get_privacy_policy_url(); ?>">Privacy Policy</a></span>
		</label>

		<button class="btn modal__submit" type="submit">
			Apply now
			<svg width="17" height="17"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
		</button>
	</form>
</div>
