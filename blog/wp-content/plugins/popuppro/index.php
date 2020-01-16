<?php
/*
Plugin Name:popuppro
Plugin URI:http://www.wpseeds.com 
Description: A simple, attractive and extremely fast popup box for your WordPress site(so you can capture visitors).
Version: 1.1
Author: wpseeds
*/
define('popuppro_path',plugin_dir_path(__FILE__ ));
define('popuppro_url',plugin_dir_url(__FILE__ ));
require_once 'scripts/customjs.php';


if ( !class_exists( "PopupPro" ) ) {
	class PopupPro {


		function install() {
			
		if (is_admin()){
		foreach (glob(popuppro_path . 'admin/*.php') as $filename) { include $filename; }
		}
		foreach (glob(popuppro_path . 'functions/*.php') as $filename) { require_once $filename; }

			
		}

		function PopupPro() {


			$this->install();
		}

	}
}
if ( !function_exists( 'cp_sp_process_content' ) ) {
	function cp_sp_process_content( $content ) {
		$content = html_entity_decode($content) ;

		return $content;
	}
}
$PopupPro = new PopupPro();

function PopupPro_html_mask() {
	include 'css.php';
	include popuppro_path . "templates/default.php";
	

}
function PopupPro_html_script() {
	$delay=popuppro_get_option('popuppro_delay');
	PopupPro_javascript($delay );
}


if ( isset( $PopupPro ) && (popuppro_get_option('enabledpopup') =='1'  ) ) {

	

		function PopupPro_jquery_add() {
			if ( !is_admin() ) {
			
			
				wp_enqueue_script( 'jquery' );
				wp_register_script( 'jcookie', plugins_url( 'scripts/jquery.cookie.js', __FILE__ ) );
				wp_enqueue_script( 'jcookie' );
				wp_register_script( 'mailchimp', plugins_url( 'scripts/mailchimp.js', __FILE__ ) );
				wp_enqueue_script( 'mailchimp' );
				
			}
			
		}

		add_action( 'init', 'PopupPro_jquery_add' );
		add_action( 'wp_footer', 'PopupPro_html_mask' );
		add_action( 'wp_head', 'PopupPro_html_script' );
	


}
?>
