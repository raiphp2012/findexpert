<form method="post" action="">
<h3><i class="popuppro-icon"></i><?php _e('Popup Settings','popuppro'); ?></h3>
<table class="form-table">

    <tr valign="top">
		<th scope="row"><label for="enabledpopup"><?php _e('Enabled Popup','popuppro'); ?></label></th>
		<td>
			<select name="enabledpopup" id="enabledpopup"  style="width:300px">
				<option value="1" <?php selected('1', popuppro_get_option('enabledpopup')); ?>><?php _e('Yes','popuppro'); ?></option>
				<option value="0" <?php selected('0', popuppro_get_option('enabledpopup')); ?>><?php _e('No','popuppro'); ?></option>
			</select>
			
		</td>
	</tr>

	<tr valign="top">
		<th scope="row"><label for="rounded_corner"><?php _e('Rounded Corner','popuppro'); ?></label></th>
		<td>
			<select name="rounded_corner" id="rounded_corner"  style="width:300px">
				<option value="1" <?php selected('1', popuppro_get_option('rounded_corner')); ?>><?php _e('Yes','popuppro'); ?></option>
				<option value="0" <?php selected('0', popuppro_get_option('rounded_corner')); ?>><?php _e('No','popuppro'); ?></option>
			</select>
			
		</td>
	</tr>

	<tr valign="top">
		<th scope="row"><label for="popuppro_delay"><?php _e('Delay For','popuppro'); ?></label></th>
		<td>
			<input type="text" name="popuppro_delay" id="popuppro_delay" value="<?php echo popuppro_get_option('popuppro_delay'); ?>" />
			
			
		</td>
	</tr>
		

	<tr valign="top" style="width:300px">
<th scope="row"><label for="popup_box_content"><?php _e('Popup Message','popuppro'); ?></label></th>
	<td>	
        		<?php wp_editor( popuppro_get_option('popup_box_content'), 'popup_box_content' ) ?>	
        	
	</td></tr>
	
	
</table>
<h3><?php _e('Mailing list Integration','popuppro'); ?></h3>
<table class="form-table">
  <tr valign="top">
		<th scope="row"><label for="popuppro_mailchimp_integration"><?php _e('Enabled Mailchimp Integration','popuppro'); ?></label></th>
		<td>
			<select name="popuppro_mailchimp_integration" id="popuppro_mailchimp_integration"  style="width:300px">
				<option value="1" <?php selected('1', popuppro_get_option('popuppro_mailchimp_integration')); ?>><?php _e('Yes','popuppro'); ?></option>
				<option value="0" <?php selected('0', popuppro_get_option('popuppro_mailchimp_integration')); ?>><?php _e('No','popuppro'); ?></option>
			</select>
			
		</td>
		
	</tr>
<tr valign="top">
		<th scope="row"><label for="popuppro_mailchimp_api_key"><?php _e('Mailchimp api key','popuppro'); ?></label></th>
		<td>
			<input type="text" name="popuppro_mailchimp_api_key" id="popuppro_mailchimp_api_key" value="<?php echo popuppro_get_option('popuppro_mailchimp_api_key'); ?>" />
			
		</td>
</tr>
<tr valign="top">
		<th scope="row"><label for="popuppro_mailchimp_list_id"><?php _e('Mailchimp list id','popuppro'); ?></label></th>
		<td>
			<input type="text" name="popuppro_mailchimp_list_id" id="popuppro_mailchimp_list_id" value="<?php echo popuppro_get_option('popuppro_mailchimp_list_id'); ?>"  />
			
		</td>

	</tr>



<tr valign="top">
		<th scope="row"><label for="popuppro_campaignmonitor_integration"><?php _e('CampaignMonitor integration','popuppro'); ?></label></th>
		<td>
			<select name="popuppro_campaignmonitor_integration" id="popuppro_campaignmonitor_integration"  style="width:300px">
				<option value="1" <?php selected('1', popuppro_get_option('popuppro_campaignmonitor_integration')); ?>><?php _e('Yes','popuppro'); ?></option>
				<option value="0" <?php selected('0', popuppro_get_option('popuppro_campaignmonitor_integration')); ?>><?php _e('No','popuppro'); ?></option>
			</select>
			
		</td>
		
	</tr>
<tr valign="top">
		<th scope="row"><label for="popuppro_campaignmonitor_key"><?php _e('CampaignMonitor Authorization Code','popuppro'); ?></label></th>
		<td>
			<input type="text" name="popuppro_campaignmonitor_key" id="popuppro_campaignmonitor_key" value="<?php echo popuppro_get_option('popuppro_campaignmonitor_key'); ?>" />
			
		</td>
</tr>
<tr valign="top">
		<th scope="row"><label for="popuppro_campaignmonitor_list_id"><?php _e('Campaignmonitor list id','popuppro'); ?></label></th>
		<td>
			<input type="text" name="popuppro_campaignmonitor_list_id" id="popuppro_campaignmonitor_list_id" value="<?php echo popuppro_get_option('popuppro_campaignmonitor_list_id'); ?>"  />
			
		</td>

	</tr>

</table >

<p class="submit">
	<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes','popuppro'); ?>"  />
	<input type="submit" name="reset-options" id="reset-options" class="button" value="<?php _e('Reset Options','popuppro'); ?>"  />
</p>

</form>
