<?php

class myCustomComponentFront {

	function __construct(){

		add_action('lasso_toolbar_components', 	array($this,'components_list'));
		add_filter('lasso_components', 			array($this,'components_available'), 11, 1);

	}

	/**
	*
	*	Add our component to the drop-up list of components
	*
	*	Note: data-type must match the component slug listed above
	*/
	function components_list(){

		?><li data-type="test" title="Sample Title"></li><?php
	}

	/**
	*
	*	First let's wipe out the existing components and replae with our own
	*
	*
	*/
	function components_available($existing){

		$components = array(
			'test' => array(
				'name' => 'Image',
				'content' => self::my_callback()
			)
		);

		return array_merge($existing, $components);

	}


	/**
	*
	*	Create a docs image component ( HTML Based )
	*	Note: we use aesop-component class so that the user can has controls
	*
	*/
	/*
	function my_callback(){

		ob_start();

			?>
			<div class="cgcm-image-component aesop-component" data-component-type="test" >
				<img src="http://placekitten.com/800/540">
			</div>
			<?php

		return ob_get_clean();
	}
	*/

	/**
	*
	*	Create a docs image component ( Dynamic (shortcode) Based )
	*
	*/
	function my_callback(){
		return do_shortcode( '[aesop_test]' ); // note how this matches L:32 above. 'aesop' is automatically prefixed
	}

}
new myCustomComponentFront;