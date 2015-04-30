<?php

/**
*	Plugin Name: Sample Aesop Story Engine Addon
*
*/

class myCustomComponent {

	function __construct(){

		define('MY_VERSION', '1.0');
		define('MY_DIR', plugin_dir_path( __FILE__ ));
		define('MY_URL', plugins_url( '', __FILE__ ));

		require_once(MY_DIR.'class.shortcode.php');
		require_once(MY_DIR.'class.settings.php');

		if ( class_exists('Aesop_Core') )
			require_once(MY_DIR.'class.backend.php');

		// compatibility aesop front end editor
		if ( function_exists( 'lasso_editor_components' ) ) {

			//define('LASSO_CUSTOM', true);
			require_once(MY_DIR.'class.front-end.php');
		}

		// optional enqueue js or css
		add_action('wp_enqueue_scripts', 		array($this,'scripts'));
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

new myCustomComponent;

