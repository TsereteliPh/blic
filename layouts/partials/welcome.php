<?php $welcome = get_field( 'welcome' ); ?>
<section class="welcome"<?php echo ( $welcome['img'] ) ? ' style="background-image: url(' . $welcome['img'] . ');"' : ''; ?>>
	<div class="container welcome__container">
		<h1 class="welcome__title"><?php echo $welcome['title']; ?></h1>

		<div class="welcome__text"><?php echo $welcome['text']; ?></div>
	</div>
</section>
