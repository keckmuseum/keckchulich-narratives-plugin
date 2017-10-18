<?php

/*
 *  Field Specs Array
 */
$custom_boilerplate_first_metabox_field_spec = Array (
	0 => Array (
		'slug' => 'date-test',
		'label' => 'Date Test:',
		'type' => 'date',
		'repeating' => false,
		'placeholder' => false // Not set up for dates yet
	),
	1 => Array (
		'slug' => 'text-test',
		'label' => 'Text Test:',
		'type' => 'text',
		'repeating' => false,
		'placeholder' => 'Text Test Placeholder'
	),
	2 => Array (
		'slug' => 'framed',
		'label' => 'Framed.',
		'type' => 'checkbox',
		'repeating' => false,
		'placeholder' => ''
	),
	3 => Array (
		'slug' => 'transcription',
		'label' => 'Transcription:',
		'type' => 'textarea',
		'repeating' => false,
		'placeholder' => ''
	),
  4 => Array (
		'slug' => 'image',
		'label' => 'Images:',
		'type' => 'image',
		'repeating' => false,
		'placeholder' => ''
	)
);

/*
 * Metabox Specs Array
 */
 $custom_boilerplate_metabox_spec = Array (
 	0 => Array (
		'slug' => 'item-details',
		'title' => 'Item Details',
		'post-type' => 'item-post-type', // Should match the post type slug
		'fields' => $custom_boilerplate_first_metabox_field_spec,
		'priority' => 'high',
		'placement' => 'normal'
	)
);
