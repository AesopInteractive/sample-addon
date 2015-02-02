<?php

class myCustomComponentBack {

	function __construct(){

		add_action('aesop_admin_styles', 		array($this, 'icon') );
		add_filter('aesop_avail_components',	array($this, 'options') );

	}
	/**
	*
	*	This appends an inline style right after the aesop admin style sheet
	*   It's used for adding in an icon into the generator. It uses dashicons, so refer
	*	to the url here to get the code you need
	*  	http://melchoyce.github.io/dashicons/
	*
	*	Note: expect this to possibly change in the future
	*
	*/
	function icon(){

		$icon = '\f164'; //css code for dashicon
		$slug = 'test'; // name of component

		wp_add_inline_style('ai-core-styles', '#aesop-generator-wrap li.'.$slug.' a:before {content: "'.$icon.'";}');
	}

	/**
	*
	*	This adds our options into the generator
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
						'prefix'		=> 'px', // optional prefix that you can pass to aid in correct value inputs by user
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
						'values' 		=> aesop_option_counter(10), // pass the max number of items to produce
						'default' 		=> '2',
						'desc' 			=> 'Counter Option Type',
						'tip'			=> 'Tip here.'
					),
					'golf' 			=> array(
						'type'			=> 'select',
						'values' 		=> aesop_option_get_categories('post'), // pass the type - default is post
						'default' 		=> '',
						'desc' 			=> 'Categories Option Type',
						'tip'			=> 'Tip here.'
					),
					'hotel' 				=> array(
						'type'			=> 'select',
						'values' 		=> aesop_option_get_posts('post'), // pass the type - default is post
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
new myCustomComponentBack;