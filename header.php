<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
	$tel = get_field( 'phone', 'options' );
	$telFormatted = preg_replace( '/[^0-9,+]/', '', $tel );
	$email = get_field( 'email', 'options' );
?>

<header class="header<?php echo ( is_front_page() ) ? ' header--index' : ''; ?>">
	<div class="container">
		<div class="header__content">
			<a href="<?php echo bloginfo( 'url' ); ?>" class="header__logo" aria-label="Blic staffing logo"></a>

			<?php wp_nav_menu(array(
				'theme_location' => 'menu_main',
				'container' => '',
				'menu_id' => 'menu-main',
				'menu_class' => 'reset-list header__menu'
			)); ?>

			<button class="header__language" type="button">EN</button>

			<?php if ( $tel ) : ?>
				<a href="tel:<?php echo $telFormatted; ?>" class="header__phone">
					<svg width="18" height="18"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-phone"></use></svg>
				</a>
			<?php endif; ?>

			<div class="header__burger">
				<span></span>
			</div>
		</div>

		<div class="header__drop">
			<?php wp_nav_menu(array(
				'theme_location' => 'menu_main',
				'container' => '',
				'menu_id' => 'menu-main',
				'menu_class' => 'reset-list header__drop-menu'
			)); ?>

			<?php if ( $tel || $email ) : ?>
				<div class="header__drop-contacts">
					<?php if ( $tel ) : ?>
						<a href="tel:<?php echo $telFormatted; ?>" class="header__drop-phone"><?php echo $tel; ?></a>
					<?php endif; ?>

					<?php if ( $email ) : ?>
						<a href="mailto:<?php echo $email; ?>" class="header__drop-email"><?php echo $email; ?></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</header>

<main class="main<?php echo ( is_front_page() ) ? ' main--index' : ''; ?>">
	<?php get_template_part( 'layouts/partials/welcome' ); ?>
