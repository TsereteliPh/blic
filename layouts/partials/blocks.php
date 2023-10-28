<?php
$id = $args['id'] ?? false;
if (have_rows('blocks', $id)) {
	$counters = array();
	while (have_rows('blocks', $id)) {
		the_row();
		$layout = get_row_layout();
		if (!isset($counters[$layout])) {
			// initialize counter
			$counters[$layout] = 1;
		} else {
			// increase existing counter
			$counters[$layout]++;
		}

		if (get_row_layout() == 'about') get_template_part('layouts/blocks/about/template');
		else if (get_row_layout() == 'contact-us') get_template_part('layouts/blocks/contact-us/template');
		else if (get_row_layout() == 'info-blocks') get_template_part('layouts/blocks/info-blocks/template');
		else if (get_row_layout() == 'services-links') get_template_part('layouts/blocks/services-links/template');
		else if (get_row_layout() == 'staffing-map') get_template_part('layouts/blocks/staffing-map/template');
	}
}
