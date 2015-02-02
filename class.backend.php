<?php

/**
*
*	This file deals with adding our custom component to Aesop Story Engine backend interface
*	Note: If you're using this sample addon strictly for Lasso and will not require Aesop Story Engine, this file is not needed
*/
class myCustomComponentBack {

	function __construct(){

		add_action('aesop_admin_styles', 		array($this, 'icon') );

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

}
new myCustomComponentBack;