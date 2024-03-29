<?php
if(!class_exists('WP_List_Table')){
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
class facebook_comments_master_admin_addons_table extends WP_List_Table {
	/**
	 * Display the rows of records in the table
	 * @return string, echo the markup of the rows
	 */
	function display() {
	$path = ABSPATH . 'wp-content/plugins/facebook-comments-master-addons/';
	if ( is_plugin_active( 'facebook-comments-master-addons/facebook-comments-master-addons.php' ) && file_exists($path) ) {
		$facebook_comments_master_addon = "yes";
		$facebook_comments_master_addon_get = '<b>All add-ons Installed</b>';
	}
	else{
		$facebook_comments_master_addon = "no";
		$facebook_comments_master_addon_get = '<a class="button-primary" href="http://wordpress.techgasp.com/facebook-comments-master/" target="_blank" title="Get Add-ons" style="float:left;">Get Add-ons</a>';
	}
?>
<table class="widefat" cellspacing="0">
	<thead>
		<tr>
			<th><h2><img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; height:18px; vertical-align:middle;" /><?php _e('&nbsp;Screenshot', 'facebook_comments_master'); ?></h2></th>
			<th><h2><img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; height:18px; vertical-align:middle;" /><?php _e('&nbsp;Description', 'facebook_comments_master'); ?></h2></th>
			<th><h2><img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; height:18px; vertical-align:middle;" /><?php _e('&nbsp;Installed', 'facebook_comments_master'); ?></h2></th>
		</tr>
	</thead>

	<tfoot>
		<tr>
			<th><?php echo $facebook_comments_master_addon_get; ?></th>
			<th></th>
			<th></th>
		</tr>
	</tfoot>

	<tbody>
		<tr class="alternate">
			<td style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-facebookcommentsmaster-admin-addons-widget-viral.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('facebook_comments_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td style="vertical-align:middle"><h3>Facebook Comments Master Viral Widget</h3><p>The Viral Widget is packed with html5 Facebook Like and Share button to turn your wordpress website "virulent". Watch those visits and new users Boom! Works much like the Twitter Tweet by sharing your website pages.</p><p>Looks great when published under any of the below widgets, remember you can always hide the widget title to get the button closer to the below widgets.</p><p>Navigate to your wordpress widgets page and start using it.</p></td>
			<td style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-check-yes.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('facebook_comments_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr>
			<td style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-facebookcommentsmaster-admin-addons-widget-basic.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('facebook_comments_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td style="vertical-align:middle"><h3>Facebook Comments Master Basic Fast Loading Widget</h3><p>This Widget was specially designed in html5 to be easy to use and deploy, all settings are on <b>auto mode</b>. Extremely fast page load times and small system trace.</p><p><b>Fully Mobile Responsive</b>.</p><p>Navigate to your wordpress widgets page and start using it.</p></td>
			<td style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-check-yes.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('facebook_comments_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr class="alternate">
			<td style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-facebookcommentsmaster-admin-addons-widget-advanced.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('facebook_comments_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td style="vertical-align:middle"><h3>Facebook Comments Master Advanced Responsive Widget</h3><p>This is the "top of the line" Facebook Comments Widget specially designed for heavy duty professional wordpress websites where fast page load times, stability and perfect Google SEO is a must.</p><p>Coded in html5 it's packed with display options and is <b>Fully Mobile Responsive</b>.</p></td>
			<td style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-check-'.$facebook_comments_master_addon.'.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('facebook_comments_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr>
			<td style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-facebookcommentsmaster-admin-addons-shortcode-in.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('facebook_comments_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td style="vertical-align:middle"><h3>Individual Shortcode</h3><p>Facebook Comments Master uses TechGasp Wordpress Framework. The <b>Individual Shortcode</b> allows you to have a different customized shortcode in each page or post. Easy to use it can be found when you edit a page or a post under the wordpress text editor. Once you have created your shortcode, Just insert the shortcode <b>[facebook-comments-master]</b> anywhere inside that text.</p></td>
			<td style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-check-'.$facebook_comments_master_addon.'.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('facebook_comments_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr class="alternate">
			<td style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-facebookcommentsmaster-admin-addons-shortcode-un.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('facebook_comments_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td style="vertical-align:middle"><h3>Universal Shortcode</h3><p>Facebook Comments Master uses TechGasp Wordpress Framework. The <b>Universal Shortcode</b> allows you to have the same shortcode across different pages or posts. Easy to use it can be found right here under the Shortcodes menu. Once you have created your shortcode, Just insert the shortcode <b>[facebook-comments-master-un]</b> anywhere inside the text of your pages or posts.</p></td>
			<td style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-check-'.$facebook_comments_master_addon.'.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('facebook_comments_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr>
			<td style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-facebookcommentsmaster-admin-addons-updater.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('facebook_comments_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td style="vertical-align:middle"><h3>Advanced Updater</h3><p>The Advanced Updater allows you to easily Update / Upgrade your Advanced Plugin. You can instantly update your plugin after we release a new version with more goodies without having to wait for the nightly native wordpress updater that runs every 24/48 hours. Get it fresh, get it fast.</p></td>
			<td style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-check-'.$facebook_comments_master_addon.'.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('facebook_comments_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr class="alternate">
			<td style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-facebookcommentsmaster-admin-addons-support.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('facebook_comments_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td style="vertical-align:middle"><h3>Award Winning Professional Support</h3><p>Need professional help deploying this plugin? TechGasp provides 24/7 award winning professional wordpress support for all advanced version costumers and replies to support tickets usually within minutes of being received. Support Us and we will Support You.</p></td>
			<td style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-check-'.$facebook_comments_master_addon.'.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('facebook_comments_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
	</tbody>
</table>
<?php
		}
}
