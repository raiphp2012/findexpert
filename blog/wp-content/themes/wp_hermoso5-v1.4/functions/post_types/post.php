<?php
//
// Normal Post related functions.
//
add_action('admin_init', 'ci_add_cpt_post_meta');
add_action('save_post', 'ci_update_cpt_post_meta');

if( !function_exists('ci_add_cpt_post_meta') ):
function ci_add_cpt_post_meta() {
	add_meta_box( "ci_post_colors", __( 'Post Customizer', 'ci_theme' ), "ci_add_post_colors_meta_box", "post", "normal", "high" );
	add_meta_box( "ci_post_colors", __( 'Page Customizer', 'ci_theme' ), "ci_add_post_colors_meta_box", "page", "normal", "high" );
	add_meta_box( "ci_format_box_gallery", __( 'Gallery Details', 'ci_theme' ), "ci_add_format_gallery_meta_box", "post", "normal", "high" );
	add_meta_box( "ci_format_box_image", __( 'Image Details', 'ci_theme' ), "ci_add_format_image_meta_box", "post", "normal", "high" );
	add_meta_box( "ci_format_box_quote", __( 'Quote Details', 'ci_theme' ), "ci_add_format_quote_meta_box", "post", "normal", "high" );
	add_meta_box( "ci_format_box_video", __( 'Video Details', 'ci_theme' ), "ci_add_format_video_meta_box", "post", "normal", "high" );
	add_meta_box( "ci_format_box_audio", __( 'Audio Details', 'ci_theme' ), "ci_add_format_audio_meta_box", "post", "normal", "high" );
	add_meta_box( "ci_format_box_link", __( 'Link Details', 'ci_theme' ), "ci_add_format_link_meta_box", "post", "normal", "high" );
}
endif;

if( !function_exists('ci_update_cpt_post_meta') ):
function ci_update_cpt_post_meta( $post_id )
{
	if ( ci_can_save_meta( 'post' ) ) {
		update_post_meta( $post_id, "ci_format_quote_text", wp_kses_post( $_POST["ci_format_quote_text"] ) );
		update_post_meta( $post_id, "ci_format_quote_cite", esc_url_raw( $_POST["ci_format_quote_cite"] ) );
		update_post_meta( $post_id, "ci_format_quote_credit", sanitize_text_field( $_POST["ci_format_quote_credit"] ) );
		update_post_meta( $post_id, "ci_format_video_url", esc_url_raw( $_POST["ci_format_video_url"] ) );
		update_post_meta( $post_id, "ci_format_audio_url", esc_url_raw( $_POST["ci_format_audio_url"] ) );
		update_post_meta( $post_id, "ci_format_link_url", esc_url_raw( $_POST["ci_format_link_url"] ) );
		update_post_meta( $post_id, "ci_format_link_nofollow", ci_sanitize_checkbox( $_POST["ci_format_link_nofollow"], 'nofollow' ) );
		ci_metabox_gallery_save( $_POST );
	}

	if ( ci_can_save_meta( 'post' ) || ci_can_save_meta( 'page' ) ) {
		update_post_meta( $post_id, "ci_post_colors_preset", sanitize_key( $_POST["ci_post_colors_preset"] ) );
		update_post_meta( $post_id, "ci_post_background", ci_sanitize_hex_color( $_POST["ci_post_background"] ) );
		update_post_meta( $post_id, "ci_headings_color", ci_sanitize_hex_color( $_POST["ci_headings_color"] ) );
		update_post_meta( $post_id, "ci_link_color", ci_sanitize_hex_color( $_POST["ci_link_color"] ) );
		update_post_meta( $post_id, "ci_text_color", ci_sanitize_hex_color( $_POST["ci_text_color"] ) );
		update_post_meta( $post_id, "ci_image_on_left", ci_sanitize_checkbox( $_POST["ci_image_on_left"], 'disabled' ) );
		update_post_meta( $post_id, "ci_post_background_img", esc_url_raw( $_POST["ci_post_background_img"] ) );

		$options = array(
			'top left',
			'top center',
			'top right',
			'center left',
			'center center',
			'center right',
			'bottom left',
			'bottom center',
			'bottom right',
		);
		update_post_meta( $post_id, "ci_post_background_align", in_array( $_POST["ci_post_background_align"], $options ) ? $_POST["ci_post_background_align"] : '' );

		$options = array(
			'no-repeat',
			'repeat',
			'repeat-x',
			'repeat-y',
		);
		update_post_meta( $post_id, "ci_post_background_repeat", in_array( $_POST["ci_post_background_repeat"], $options ) ? $_POST["ci_post_background_repeat"] : '' );
	}

}
endif;

if ( !function_exists('ci_add_post_colors_meta_box') ) :
function ci_add_post_colors_meta_box( $object, $box ) {

	ci_prepare_metabox( $object->post_type );

	$selected_preset = get_post_meta( $object->ID, 'ci_post_colors_preset', true );

	?>
	<p><?php _e('You can customize the way that this post will be displayed. Select one of the available presets, or choose custom colors.', 'ci_theme'); ?></p>

	<div class="postbox-container ci-post-customizer-col spacer">
		<div class="postbox">
			<div title="<?php _e('Click to toggle', 'ci_theme'); ?>" class="handlediv"><br></div>
			<h3 class="hndle"><?php _e('Color Selection', 'ci_theme'); ?></h3>
			<div class="inside">
				<?php
					ci_metabox_checkbox( 'ci_image_on_left', 'disabled', __( 'Show featured image on the left?', 'ci_theme' ) );
					ci_metabox_input( 'ci_headings_color', __( 'Headings Text Color (H1-H6):', 'ci_theme' ), array( 'input_class' => 'colorpckr' ) );
					ci_metabox_input( 'ci_text_color', __( 'Post Text Color:', 'ci_theme' ), array( 'input_class' => 'colorpckr' ) );
					ci_metabox_input( 'ci_link_color', __( 'Link Color:', 'ci_theme' ), array( 'input_class' => 'colorpckr' ) );
				?>
			</div>
		</div>
	</div>

	<div class="postbox-container ci-post-customizer-col">
		<div class="postbox">
			<div title="<?php _e('Click to toggle', 'ci_theme'); ?>" class="handlediv"><br></div>
			<h3 class="hndle"><?php _e('Background Selection', 'ci_theme'); ?></h3>
			<div class="inside">
				<?php ci_metabox_input( 'ci_post_background', __( 'Background Color:', 'ci_theme' ), array( 'input_class' => 'colorpckr' ) ); ?>

				<p>
					<?php ci_metabox_input('ci_post_background_img', __('Background Image:', 'ci_theme'), array( 'input_class' => 'widefat uploaded', 'before' => '', 'after' => '' )); ?>
					<input type="button" class="ci-upload button" value="<?php _e('Select', 'ci_theme'); ?>" />
				</p>

				<?php
					$options = array(
						'top left'      => __( 'Top Left', 'ci_theme' ),
						'top center'    => __( 'Top Center', 'ci_theme' ),
						'top right'     => __( 'Top Right', 'ci_theme' ),
						'center left'   => __( 'Center Left', 'ci_theme' ),
						'center center' => __( 'Center Center', 'ci_theme' ),
						'center right'  => __( 'Center Right', 'ci_theme' ),
						'bottom left'   => __( 'Bottom Left', 'ci_theme' ),
						'bottom center' => __( 'Bottom Center', 'ci_theme' ),
						'bottom right'  => __( 'Bottom Right', 'ci_theme' ),
					);
					ci_metabox_dropdown( 'ci_post_background_align', $options, __( 'Image alignment:', 'ci_theme' ) );

					$options = array(
						'no-repeat' => __( 'No Repeat', 'ci_theme' ),
						'repeat'    => __( 'Repeat', 'ci_theme' ),
						'repeat-x'  => __( 'Repeat Horizontally', 'ci_theme' ),
						'repeat-y'  => __( 'Repeat Vertically', 'ci_theme' ),
					);
					ci_metabox_dropdown( 'ci_post_background_repeat', $options, __( 'Image repeat:', 'ci_theme' ) );
				?>
			</div>
		</div>
	</div>

	<div style="clear: both;">
	<fieldset>
		<p><?php _e('Please note that if a preset is selected, its saved values will <strong>always be preferred</strong> over the custom values selected.', 'ci_theme'); ?></p>
		<strong><label for="ci_post_colors_preset"><?php _e('Use a preset:', 'ci_theme'); ?></label></strong><br>
		<select id="ci_post_colors_preset" name="ci_post_colors_preset">
			<option value="" <?php selected($selected_preset, ''); ?>>&nbsp</option>
			<?php
				$presets = get_option(CI_DOMAIN.'_post_colors_presets', ci_default_post_color_presets());
				foreach($presets as $key => $values) {
					?><option value="<?php echo $key; ?>" <?php selected($selected_preset, $key); ?>><?php echo $values['preset_name']; ?></option><?php
				}
			?>
		</select>
		<a href="#" id="ci_post_colors_delete_preset"><?php _e('Delete selected preset', 'ci_theme'); ?></a><span id="ci_post_colors_delete_preset_progress" style="display: none;"></span>
	</fieldset>


	<p><a href="#" class="button" id="ci_post_colors_new_preset"><?php _e('Save as new preset', 'ci_theme'); ?></a></p>
	<p id="ci_post_colors_new_preset_controls" style="display: none;">
		<label for="ci_post_colors_new_preset_name"><?php _e('Preset name:', 'ci_theme'); ?></label><br>
		<input type="text" id="ci_post_colors_new_preset_name" name="ci_post_colors_new_preset_name" value="" />
		<input type="button" class="button" id="create_ci_post_colors_new_preset" name="create_ci_post_colors_new_preset" value="<?php _e('Save', 'ci_theme'); ?>" />
		<span id="ci_post_colors_new_preset_progress" style="display: none;"></span>
	</p>
	</div>
	<?php
}
endif;

if( !function_exists('ci_add_format_gallery_meta_box') ):
function ci_add_format_gallery_meta_box( $object, $box )
{
	ci_prepare_metabox('post');

	?><p><?php _e('You can create a gallery for your post by pressing the "Add Images" button below. You should also set a featured image that will be used as this post\'s cover.', 'ci_theme'); ?></p><?php
	ci_metabox_gallery();
}
endif;

if( !function_exists('ci_add_format_image_meta_box') ):
function ci_add_format_image_meta_box( $object, $box ) {
	ci_prepare_metabox('post');

	?>
	<p><?php sprintf(__('You need to upload (or assign) a <strong>Featured Image</strong> to the post. This can be done by clicking <a href="#" class="ci-upload">here</a>, or pressing the <strong>Upload Images</strong> button bellow, or via the <strong>Add Media <img src="%s" /> button</strong>, just below the post\'s title.', 'ci_theme'), get_admin_url().'/images/media-button.png'); ?></p>
	<p><?php _e('Once you have uploaded or selected your image, click on the <strong>Use as featured image</strong> button.', 'ci_theme'); ?></p>
	<p><input type="button" class="button ci-upload" value="<?php echo esc_attr(__('Upload Images', 'ci_theme')); ?>" /></p>
	<?php
}
endif;

if( !function_exists('ci_add_format_quote_meta_box') ):
function ci_add_format_quote_meta_box( $object, $box ) {

	ci_prepare_metabox('post');

	ci_metabox_textarea( 'ci_format_quote_text', __( 'Quoted text:', 'ci_theme' ) );
	?><p><?php _e('Write the name of your source here. Always give credit to the person who said it, rather than the place you found it. Even if it is something you found on a website, try to find out who wrote it, and write the author\'s name instead of the website\'s/company\'s name.', 'ci_theme'); ?></p><?php
	ci_metabox_input( 'ci_format_quote_credit', __( 'Cite:', 'ci_theme' ) );
	?><p><?php _e('If your quote is something you found online, you can enter the URL here, and the name you entered above will become a link.', 'ci_theme'); ?></p><?php
	ci_metabox_input( 'ci_format_quote_cite', __( 'Citation URL:', 'ci_theme' ), array( 'esc_func' => 'esc_url' ) );

}
endif;

if( !function_exists('ci_add_format_video_meta_box') ):
function ci_add_format_video_meta_box( $object, $box ) {

	ci_prepare_metabox('post');

	?>
	<p><?php echo sprintf(__('In the following box, you can simply enter the URL of a supported website\'s video. It needs to start with <strong>http://</strong> or <strong>https://</strong> (E.g. <em>%1$s</em>). A list of supported websites can be <a href="%2$s">found here</a>.', 'ci_theme'), 'http://www.youtube.com/watch?v=4Z9WVZddH9w', 'http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F'); ?></p>
	<p><?php _e("If you want to embed a video from an unsupported website, copy the video's embed code and paste it into the same box below.", 'ci_theme'); ?></p>
	<p><?php _e('Your video will be re-sized automatically to fit the width of the post area.', 'ci_theme'); ?></p>
	<?php
	ci_metabox_input('ci_format_video_url', __('The URL of the video to be embedded:', 'ci_theme'), array('esc_func' => 'esc_url'));
}
endif;

if( !function_exists('ci_add_format_audio_meta_box') ):
function ci_add_format_audio_meta_box( $object, $box ) {

	ci_prepare_metabox('post');

	?>
	<p>
		<?php ci_metabox_input( 'ci_format_audio_url', __( 'The URL of the MP3 file to embed:', 'ci_theme' ), array(
			'input_class' => 'widefat uploaded',
			'before'      => '',
			'after'       => ''
		) ); ?>
		<input id="ci-upload-audio-button" type="button" class="button ci-upload" value="<?php echo esc_attr(__('Upload MP3', 'ci_theme')); ?>" />
	</p>
	<?php
}
endif;

if( !function_exists('ci_add_format_link_meta_box') ):
function ci_add_format_link_meta_box( $object, $box ) {

	ci_prepare_metabox('post');

	?><p><?php _e('Linked posts are just like normal posts, but their title redirects to the URL you enter instead of the normal post content. You may optionally mark the link with the <strong>nofollow</strong> attribute, in case you link against a naughty website which you don\'t want search engines to affiliate you with.', 'ci_theme'); ?></p><?php
	ci_metabox_input( 'ci_format_link_url', __( 'URL:', 'ci_theme' ), array( 'esc_func' => 'esc_url' ) );
	ci_metabox_checkbox( 'ci_format_link_nofollow', 'nofollow', __( 'Add <strong><code>rel="nofollow"</code></strong> to link.', 'ci_theme' ) );
}
endif;
?>