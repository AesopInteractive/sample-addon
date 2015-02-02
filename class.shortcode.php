<?php

/**
*
*	Draws the shorcode component
*
*/
class myCustomComponentSC {

	function __construct(){
		add_shortcode('aesop_test', 			array($this, 'shortcode') );
	}

	/**
	*
	*	Components are shortcodes
	*
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

		// account for multiple instances of this component
		static $instance = 0;
		$instance++;
		$unique = sprintf('test-shortcode-%s-%s',get_the_ID(), $instance);

		// example of getting an option value
		$beta  	= $atts['beta'];

		$out = sprintf('<p id="%s">%s</p>', $unique, $beta);

		return $out;
	}
}
new myCustomComponentSC;