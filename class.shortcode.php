<?php

/**
*
*	Draws the shorcode component used for Aesop Story Engine
* 	Note: components in shortcode form not required see class.front-end.php
*
*/
class myCustomComponentSC {

	// the shortcode HAS to start with aesop_
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

		// if lasso is active we need to map the sc atts as data-attributes
		if ( function_exists( 'lasso_editor_components' ) && lasso_user_can() ) {
			$options = function_exists('aesop_component_data_atts') ? aesop_component_data_atts('aesop_test', $unique, $atts) : false;
		} else {
			$options = false;
		}

		$out = sprintf('<div id="%s" class="aesop-component" %s><p>%s</p></div>', $unique, $options, $beta);

		return $out;
	}
}
new myCustomComponentSC;