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
		else if (get_row_layout() == 'accordion') get_template_part('layouts/blocks/accordion/template');
		else if (get_row_layout() == 'contact-details') get_template_part('layouts/blocks/contact-details/template');
		else if (get_row_layout() == 'contact-us') get_template_part('layouts/blocks/contact-us/template');
		else if (get_row_layout() == 'image-link') get_template_part('layouts/blocks/image-link/template');
		else if (get_row_layout() == 'image-text') get_template_part('layouts/blocks/image-text/template');
		else if (get_row_layout() == 'info-blocks') get_template_part('layouts/blocks/info-blocks/template');
		else if (get_row_layout() == 'jobs') get_template_part('layouts/blocks/jobs/template');
		else if (get_row_layout() == 'list-of-items') get_template_part('layouts/blocks/list-of-items/template');
		else if (get_row_layout() == 'main-text') get_template_part('layouts/blocks/main-text/template');
		else if (get_row_layout() == 'map') get_template_part('layouts/blocks/map/template');
		else if (get_row_layout() == 'services-links') get_template_part('layouts/blocks/services-links/template');
		else if (get_row_layout() == 'staffing-map') get_template_part('layouts/blocks/staffing-map/template');
	}
}
