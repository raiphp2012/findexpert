<?php
	get_template_part('panel/constants');

	load_theme_textdomain( 'ci_theme', get_template_directory() . '/lang' );

	// This is the main options array. Can be accessed as a global in order to reduce function calls.
	$ci = get_option(THEME_OPTIONS);
	$ci_defaults = array();

	// The $content_width needs to be before the inclusion of the rest of the files, as it is used inside of some of them.
	if ( ! isset( $content_width ) ) $content_width = 498;


	//
	// Let's bootstrap the theme.
	//
	get_template_part('panel/bootstrap');

	get_template_part('functions/loveit');

	//
	// Let WordPress manage the title.
	//
	add_theme_support( 'title-tag' );

	//
	// Define our various image sizes.
	//
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'ci_listing_thumb', 900, 9999, false);
	add_image_size( 'ci_listing_gallery', 740, 450, true);
	add_image_size( 'ci_featured_full', 1280, 500, true);



	// Define our post formats
	add_theme_support( 'post-formats', array( 'image', 'gallery', 'video', 'audio', 'quote', 'link') );
	add_post_type_support( 'post', 'post-formats' );


	add_fancybox_support();

	// Let the theme know that we have WP-PageNavi styled.
	add_ci_theme_support('wp_pagenavi');

	// Let the user choose a color scheme on each post individually.
	add_ci_theme_support('post-color-scheme', array('page', 'post'));


	// Don't use default styles for galleries
	add_filter( 'use_default_gallery_style', '__return_false' );


	// Remove width and height attributes from the <img> tag.
	// Remove also when an image is sent to the editor. When the user resizes the image from the handles, width and height
	// are re-inserted, so expected behaviour is not lost.
	add_filter('post_thumbnail_html', 'ci_remove_thumbnail_dimensions');

	add_filter('image_send_to_editor', 'ci_remove_thumbnail_dimensions');
	if( !function_exists('ci_remove_thumbnail_dimensions') ):
	function ci_remove_thumbnail_dimensions($html)
	{
		$html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
		return $html;
	}
	endif;


	// Correctly embed a video, depending if it's just a URL or HTML embed code.
	if( !function_exists('ci_embed_video') ):
	function ci_embed_video($width=620, $height=380, $div_id='entry-video', $div_class='entry-video', $post_id=null)
	{
		global $post;
		if($post_id===null) $post_id = $post->ID;

		$url = get_post_meta( $post_id, 'ci_format_video_url', true );
		if ( !empty( $url ) )
		{

			$div = '<div';
			if(!empty($div_id)) $div .= ' id="'.$div_id.'"';
			if(!empty($div_class)) $div .= ' class="'.$div_class.'"';
			$div .= '>';

			echo $div;

			if ( substr( $url, 0, 7 ) == 'http://' or substr( $url, 0, 8 ) == 'https://' ) {
				// It's a URL. Let's try oEmbed.
				$url = wp_oembed_get( $url, array( 'width' => $width ) );
			}

			// It's not a URL. Adjust width and height and spit out whatever they wrote.
			$count_width = 0;
			$count_height = 0;

			// Replace width
			$replacement_width = 'width="' . $width . '"';
			$url = preg_replace( '/width=["|\']?\d*["|\']?/', $replacement_width, $url, -1, $count_width );

			// Replace height
			$replacement_height = 'height="' . $height . '"';
			$url = preg_replace( '/height=["|\']?\d*["|\']?/', $replacement_height, $url, -1, $count_height );

			// No width? Let's add it
			if ( $count_width == 0 ) {
				$url = str_replace( '<iframe ', '<iframe ' . $replacement_width . ' ', $url );
				$url = str_replace( '<object ', '<object ' . $replacement_width . ' ', $url );
				$url = str_replace( '<embed ', '<embed ' . $replacement_width . ' ', $url );
			}

			// No height? Let's add it
			if ( $count_height == 0 ) {
				$url = str_replace( '<iframe ', '<iframe ' . $replacement_height . ' ', $url );
				$url = str_replace( '<object ', '<object ' . $replacement_height . ' ', $url );
				$url = str_replace( '<embed ', '<embed ' . $replacement_height . ' ', $url );
			}

			echo $url;

			echo '</div>';
		}

	}
	endif;


	// Change the markup of our listing page comments.
	if ( !function_exists('ci_listings_comments') ) {
		function ci_listings_comments($comment, $args, $depth) {
			$GLOBALS['comment'] = $comment;
		?>

		<li id="comment-<?php comment_ID(); ?>" class="comment">

			<div class="comment-text group">
				<?php echo get_avatar($comment,$size='35'); ?>
				<p>
					<?php printf('<strong>%s</strong>', get_comment_author_link()); ?>:
					<?php if ($comment->comment_approved == '0') : ?>

						<em><?php _e('Your comment is awaiting moderation.', 'ci_theme'); ?></em>

					<?php endif; ?>

					<?php
					echo wp_trim_words(apply_filters( 'get_comment_text', $comment->comment_content, $comment ), ci_setting('front_page_comments_limit'));
					?>
				</p>
			</div>
		<?php
		}
	}
