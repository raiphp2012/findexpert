<?php
$has_thumb = false;
if ( has_post_thumbnail() ):
	$has_thumb = true;
	$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', true );
	?>
	<figure class="entry-thumb zoomable">
		<a href="<?php echo $url[0]; ?>" class="fancybox thumb" data-fancybox-group="fancybox[<?php the_ID(); ?>]">
			<?php the_post_thumbnail('ci_listing_thumb'); ?>
		</a>
		<div class="overlay"></div>
	</figure>
<?php endif; ?>

<?php $url = get_post_meta($post->ID, 'ci_format_audio_url', true); ?>

<div class="audio-wrap <?php if ( $has_thumb) { echo 'with-thumb'; } ?>">
	<audio class="ci-audio" src="<?php echo esc_attr( $url ); ?>"></audio>
</div> <!-- .audio-wrap -->
