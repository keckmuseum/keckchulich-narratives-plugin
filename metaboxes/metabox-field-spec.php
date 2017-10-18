<?php

/*
 *  Field Specs Array
 */
$custom_boilerplate_first_metabox_field_spec = Array (
	0 => Array (
		'slug' => 'accession',
		'label' => 'Accession:',
		'type' => 'text',
		'repeating' => false,
		'placeholder' => date('Y').'.XXX.XXX'
	),
	1 => Array (
		'slug' => 'company',
		'label' => 'Company:',
		'type' => 'text',
		'repeating' => false,
		'placeholder' => 'Texas Loan'
	),
	2 => Array (
		'slug' => 'date',
		'label' => 'Date:',
		'type' => 'date',
		'repeating' => false,
		'placeholder' => false
	),
	3 => Array (
		'slug' => 'framed',
		'label' => 'Framed.',
		'type' => 'checkbox',
		'repeating' => false,
		'placeholder' => ''
	),
	4 => Array (
		'slug' => 'black-binder',
		'label' => 'Black Binder.',
		'type' => 'checkbox',
		'repeating' => false,
		'placeholder' => ''
	),
	5 => Array (
		'slug' => 'brown-binder',
		'label' => 'Brown Binder.',
		'type' => 'checkbox',
		'repeating' => false,
		'placeholder' => ''
	),
	6 => Array (
		'slug' => 'dimensions',
		'label' => 'Dimensions (mm):',
		'type' => 'text',
		'repeating' => false,
		'placeholder' => 'XXX x XXX'
	),
	7 => Array (
		'slug' => 'provenance',
		'label' => 'Provenance:',
		'type' => 'text',
		'repeating' => true,
		'placeholder' => 'Twain'
	),
	8 => Array (
		'slug' => 'location',
		'label' => 'Location:',
		'type' => 'text',
		'repeating' => false,
		'placeholder' => 'Nevada'
	),
	9 => Array (
		'slug' => 'keywords',
		'label' => 'Keywords:',
		'type' => 'text',
		'repeating' => true,
		'placeholder' => 'keyword'
	),
	10 => Array (
		'slug' => 'collection',
		'label' => 'Collection:',
		'type' => 'text',
		'repeating' => false,
		'placeholder' => 'Schulich Bond Collection'
	),
	11 => Array (
		'slug' => 'rights',
		'label' => 'Rights:',
		'type' => 'text',
		'repeating' => false,
		'placeholder' => ''
	),
	12 => Array (
		'slug' => 'transcription',
		'label' => 'Transcription:',
		'type' => 'textarea',
		'repeating' => false,
		'placeholder' => ''
	),
	13 => Array (
		'slug' => 'alt',
		'label' => 'Alt Text:',
		'type' => 'text',
		'repeating' => false,
		'placeholder' => ''
	),
	14 => Array (
		'slug' => 'notes',
		'label' => 'Notes:',
		'type' => 'textarea',
		'repeating' => false,
		'placeholder' => ''
	),
	15 => Array (
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
		'title' => 'Bond Details',
		'post-type' => 'item-post-type', // Should match the post type slug
		'fields' => $custom_boilerplate_first_metabox_field_spec,
		'priority' => 'high',
		'placement' => 'normal'
	)
);
