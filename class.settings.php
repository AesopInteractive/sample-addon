<?php

/**
*
*	This class is responsible for creating custom options used by both Aesop Story Engine and Lasso
*
*/
class myCustomComponentSettings {

	function __construct(){

		// if you arent using Lasso then this filter isnt needed
		add_filter('lasso_custom_options',		array($this,'options'));

		// if you arent using aesop story engine then this filter isnt needed
		add_filter('aesop_avail_components',	array($this, 'options') );
	}
	/**
	*
	*	This adds our options into the generator for both Lasso and Aesop Story Engine
	*
	*/
	function options($shortcodes) {

		$custom = array(
			'test' 						=> array(
				'name' 					=> 'Test Component', // name of the component
				'type' 					=> 'single', // single - wrap
				'atts' 					=> array(
					'alpha' 			=> array(
						'type'			=> 'text_small', // a small text field
						'default' 		=> '',
						'desc' 			=> 'Small Text Field',
						'suffix'		=> 'sx', // optional suffix that you can pass to aid in correct value inputs by user
						'tip'			=> 'Here is a tip for this option.'
					),
					'beta' 				=> array(
						'type'			=> 'text', // a large text field
						'default' 		=> 'left',
						'desc' 			=> 'Large Text Field',
						'tip'			=> 'Here is a tip for this option.'
					),
					'charlie' 			=> array(
						'type'			=> 'text_area', // a textarea
						'default' 		=> 'left',
						'desc' 			=> 'Textarea',
						'tip'			=> 'Here is a tip for this option.'
					),
					'delta' 			=> array(
						'type'			=> 'color',
						'default' 		=> '#0077aa',
						'desc' 			=> 'Color Option Type',
						'tip'			=> 'Tip here.'
					),
					'echo' 				=> array(
						'type'			=> 'select', // a select dropdown 
						'values' 		=> array(
							array(
								'value' => 'optionvalue',
								'name'	=> 'Option Name'
							),
							array(
								'value' => 'anotheroption',
								'name'	=> 'Option Name'
							)
						),
						'default' 		=> '',
						'desc' 			=> 'A dropdown option.',
						'tip'			=> 'Tip here'
					),
					'foxtrot' 				=> array(
						'type'			=> 'select',
						'values' 		=> function_exists('aesop_option_counter') ? aesop_option_counter(10) : false, // pass the max number of items to produce
						'default' 		=> '2',
						'desc' 			=> 'Counter Option Type',
						'tip'			=> 'Tip here.'
					),
					'golf' 			=> array(
						'type'			=> 'select',
						'values' 		=> function_exists('aesop_option_get_categories') ? aesop_option_get_categories('post') : false, // pass the type - default is post
						'default' 		=> '',
						'desc' 			=> 'Categories Option Type',
						'tip'			=> 'Tip here.'
					),
					'hotel' 				=> array(
						'type'			=> 'select',
						'values' 		=> function_exists('aesop_option_get_posts') ? aesop_option_get_posts('post') : false, // pass the type - default is post
						'default' 		=> '',
						'desc' 			=> 'Post Option Type',
						'tip'			=> 'Tip here.'
					)
				)
			)
		);


		return array_merge( $shortcodes, $custom );

	}
}
new myCustomComponentSettings;
