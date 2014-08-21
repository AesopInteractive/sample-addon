<?php

/**
*	Plugin Name: Sample Addon
*
*/

class myCustomComponent {

	function __construct(){

		define('MY_VERSION', '1.0');
		define('MY_DIR', plugin_dir_path( __FILE__ ));
		define('MY_URL', plugins_url( '', __FILE__ ));

		add_shortcode('aesop_test', 			array($this, 'shortcode') );
		add_action('aesop_admin_styles', 		array($this, 'icon') );
		add_filter('aesop_avail_components',	array($this, 'options') );


		// optional enqueue js or css
		add_action('wp_enqueue_scripts', 		array($this,'scripts'));
	}

	/**
	*
	*	Components are shortcodes
	*
	*/
	function shortcode($atts, $content = null) {

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
	*	This appends an inline style right after the aesop admin style sheet
	*   It's used for adding in an icon into the generator. It uses dashicons, so refer
	*	to the url here to get the code you need
	*  	http://melchoyce.github.io/dashicons/
	*
	*/
	function icon(){

		$css = '
				#aesop-generator-wrap li.test a:before {
				content: "\f128";
				}
		';
		wp_add_inline_style('ai-core-styles', $css);
	}

	/**
	*
	*	This adds our options into the generator
	*
	*/
	function options($shortcodes) {

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


		return array_merge( $shortcodes, $custom );

	}

	/**
	*
	*	Optional add js or css
	*/
	function scripts(){

		// this handy function checks a post or page to see if your component exists beore enqueueing assets
		if ( function_exists('aesop_component_exists') && aesop_component_exists('test') ) {

			wp_enqueue_style('test-style', MY_URL.'/css/test.css', MY_VERSION );
			wp_enqueue_script('test-script', MY_URL.'/js/test.js', array('jquery'), MY_VERSION, true);

		}

	}

}

new myCustomComponent();


