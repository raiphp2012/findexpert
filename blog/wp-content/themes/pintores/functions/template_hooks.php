<?php 
add_filter('ci_footer_credits', 'ci_theme_footer_credits');
if( !function_exists('ci_theme_footer_credits') ):
function ci_theme_footer_credits($string){

	if ( ! CI_WHITELABEL ) {
		return sprintf( __( '<a href="%s">Powered by WordPress</a> - A theme by <a href="%s">CSSIgniter.com</a>', 'ci_theme' ),
			esc_url( 'https://wordpress.org' ),
			esc_url( 'http://www.cssigniter.com' )
		);
	} else {
		/* translators: %2$s is replaced by the website's name. */
		return sprintf( __( '<a href="%1$s">%2$s</a> - <a href="%3$s">Powered by WordPress</a>', 'ci_theme' ),
			esc_url( home_url() ),
			get_bloginfo( 'name' ),
			esc_url( 'https://wordpress.org' )
		);
	}

}
endif;
?>