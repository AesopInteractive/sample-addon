<?php

/**
*	Plugin Name: Sample Addon
*
*/

class myCustomComponent {

	function __construct(){

		add_shortcode('aesop_test', 			array($this, 'aesop_test_shortcode') );
		add_filter('aesop_avail_components',	array($this, 'my_custom_component_options') );
		add_action('aesop_admin_styles', 		array($this, 'my_custom_component_icon') );
	}

	/**
	*
	*	Components are shortcodes
	*
	*/
	function aesop_test_shortcode($atts, $content = null) {

		$defaults = array(
			'alpha' 	=> '',
			'beta' 		=> 'default', // passing a default
			'gamma' 	=> '',
			'delta' 	=> ''
		);

		$atts 	= shortcode_atts($defaults, $atts);

		// example of getting an option value
		$beta  	= $atts['beta'];

		$out = sprintf('<p>%s</p>', $beta);

		return $out;
	}

	/**
	*
	*	This adds our options into the generator
	*
	*/
	function my_custom_component_options($shortcodes) {

		$custom = array(
			'test' 					=> array(
				'name' 				=> 'Test Component', // name of the component
				'type' 				=> 'single', // single - wrap
				'atts' 				=> array(
					'alpha' 			=> array(
						'type'		=> 'text_small', // a small text field
						'values' 	=> array( ),
						'default' 	=> '',
						'desc' 		=> 'Caption Position',
						'tip'		=> 'Here is a tip for this option.'
					),
					'beta' 			=> array(
						'type'		=> 'text', // a large text field
						'values' 	=> array( ),
						'default' 	=> 'left',
						'desc' 		=> 'Caption Position',
						'tip'		=> 'Here is a tip for this option.'
					),
					'gamma' 			=> array(
						'type'		=> 'text_area', // a textarea
						'values' 	=> array( ),
						'default' 	=> 'left',
						'desc' 		=> 'A textarea option',
						'tip'		=> 'Here is a tip for this option.'
					),
					'delta' 			=> array(
						'type'		=> 'text', // a select dropdown 
						'values' 	=> array(
							'1',
							'2',
							'3',
							'4'
						),
						'default' 	=> '',
						'desc' 		=> 'A dropdown option.',
						'tip'		=> 'Tip here'
					),
				)
			)
		);


		return array_merge( $custom, $shortcodes );

	}

	/**
	*
	*	This appends an inline style right after the aesop admin style sheet
	*   It's used for adding in an icon into the generator. It uses dashicons, so refer
	*	to the url here to get the code you need
	*  	http://melchoyce.github.io/dashicons/
	*
	*/
	function my_custom_component_icon(){

		$css = '
				#aesop-generator-wrap li.test a:before {
				content: "\f128";
				}
		';
		wp_add_inline_style('ai-core-styles', $css);
	}
}

new myCustomComponent();


