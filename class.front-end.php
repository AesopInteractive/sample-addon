<?php

class myCustomComponentFront {

	function __construct(){

		add_filter('lasso_components', 			array($this,'components_available'), 11, 1);
		add_action('lasso_toolbar_components', 	array($this,'components_list'));

	}

	/**
	*
	*	First let's wipe out the existing components and replae with our own
	*
	*
	*/
	function components_available($existing){

		$components = array(
			'sample_addon' => array(
				'name' => 'Image',
				'content' => self::my_callback()
			)
		);

		return array_merge($existing, $components);

	}

	/**
	*
	*	Add our component to the drop-up list of components
	*
	*	Note: data-type must match the component slug listed above
	*/
	function components_list(){

		?><li data-type="sample_addon" title="Sample Title"></li><?php
	}

	/**
	*
	*	Create a docs image component
	*	Note: we use aesop-component class so that the user can has controls
	*
	*/
	function my_callback(){

		ob_start();

			?>
			<div class="cgcm-image-component aesop-component" data-component-type="sample_addon" data-src="http://placekitten.com/800/540" >
				<img src="http://placekitten.com/800/540">
			</div>
			<?php

		return ob_get_clean();
	}

}
new myCustomComponentFront;