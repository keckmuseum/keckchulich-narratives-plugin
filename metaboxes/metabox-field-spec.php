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
	// 1 => Array (
	// 	'slug' => 'company',
	// 	'label' => 'Company:',
	// 	'type' => 'text',
	// 	'repeating' => false,
	// 	'placeholder' => 'Texas Loan'
	// ),
	2 => Array (
		'slug' => 'date',
		'label' => 'Date:',
		'type' => 'text',
		'repeating' => false,
		'placeholder' => '1900'
	),
	// 3 => Array (
	// 	'slug' => 'framed',
	// 	'label' => 'Framed.',
	// 	'type' => 'checkbox',
	// 	'repeating' => false,
	// 	'placeholder' => ''
	// ),
	// 4 => Array (
	// 	'slug' => 'black-binder',
	// 	'label' => 'Black Binder.',
	// 	'type' => 'checkbox',
	// 	'repeating' => false,
	// 	'placeholder' => ''
	// ),
	// 5 => Array (
	// 	'slug' => 'brown-binder',
	// 	'label' => 'Brown Binder.',
	// 	'type' => 'checkbox',
	// 	'repeating' => false,
	// 	'placeholder' => ''
	// ),
	// 6 => Array (
	// 	'slug' => 'width',
	// 	'label' => 'Width (mm):',
	// 	'type' => 'text',
	// 	'repeating' => false,
	// 	'placeholder' => '500'
	// ),
	// 7 => Array (
	// 	'slug' => 'height',
	// 	'label' => 'Height (mm):',
	// 	'type' => 'text',
	// 	'repeating' => false,
	// 	'placeholder' => '200'
	// ),
	// 7 => Array (
	// 	'slug' => 'provenance',
	// 	'label' => 'Provenance:',
	// 	'type' => 'text',
	// 	'repeating' => true,
	// 	'placeholder' => 'Twain'
	// ),
	8 => Array (
		'slug' => 'location',
		'label' => 'Location:',
		'type' => 'text',
		'repeating' => false,
		'placeholder' => 'Nevada'
	),
	// 9 => Array (
	// 	'slug' => 'keywords',
	// 	'label' => 'Keywords:',
	// 	'type' => 'text',
	// 	'repeating' => true,
	// 	'placeholder' => 'keyword'
	// ),
	// 10 => Array (
	// 	'slug' => 'collection',
	// 	'label' => 'Collection:',
	// 	'type' => 'text',
	// 	'repeating' => false,
	// 	'placeholder' => 'Schulich Bond Collection'
	// ),
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
	// 13 => Array (
	// 	'slug' => 'alt',
	// 	'label' => 'Alt Text:',
	// 	'type' => 'text',
	// 	'repeating' => false,
	// 	'placeholder' => ''
	// ),
	14 => Array (
		'slug' => 'notes',
		'label' => 'Notes:',
		'type' => 'textarea',
		'repeating' => false,
		'placeholder' => ''
	),
	15 => Array (
		'slug' => 'image',
		'label' => 'Front Image:',
		'type' => 'image',
		'repeating' => false,
		'placeholder' => ''
	),
	16 => Array (
		'slug' => 'image-back',
		'label' => 'Back Image:',
		'type' => 'image',
		'repeating' => false,
		'placeholder' => ''
	),
	// 17 => Array (
	// 	'slug' => 'document-type',
	// 	'label' => 'Document Type:',
	// 	'type' => 'select',
	// 	'repeating' => false,
	// 	'placeholder' => '',
	// 	'options' => Array (
	// 		'Select a Document Type',
	// 		'Mining Bond'
	// 	),
	// 	'selected' => 0
	// )
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
