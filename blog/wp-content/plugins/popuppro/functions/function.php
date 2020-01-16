<?php
add_action('wp_head','print_ajax_url', 999);
function print_ajax_url(){?>
<script type="text/javascript">
var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script><?php 
		}
add_action('wp_enqueue_scripts','add_popuppro_css');
function add_popuppro_css()
{
	wp_register_style('popuppro_css', popuppro_url.'css/style.css');
	wp_enqueue_style('popuppro_css');
		
	wp_register_style('fontowsome', popuppro_url.'assets/font-awesome-4.2.0/css/font-awesome.min.css');
	wp_enqueue_style('fontowsome');

}


?>
