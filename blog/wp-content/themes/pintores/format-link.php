<?php if ( has_post_thumbnail() ): ?>
	<?php
	$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', true );

	if ( ci_setting('feat_image_links_to') === 'feat_image' ) {
		$post_url = $url[0];
		$overlay = true;
		$zoomable = true;
	} else {
		$post_url = get_permalink();
		$overlay = false;
		$zoomable= false;
	}
	?>
	<figure class="entry-thumb <?php if ( $zoomable ) { echo 'zoomable'; } ?>">
		<a href="<?php echo $post_url ?>" class="<?php if ( $zoomable ) { echo 'fancybox'; } ?> thumb" data-fancybox-group="fancybox[<?php the_ID(); ?>]">
			<?php the_post_thumbnail('ci_listing_thumb'); ?>
		</a>
		<?php if ( $overlay ) : ?><div class="overlay"></div><?php endif; ?>
	</figure>
<?php endif; ?>


<?php
	// Get all the link format custom fields
	$linkurl = get_post_meta($post->ID, 'ci_format_link_url', true);
	$nofollow = get_post_meta($post->ID, 'ci_format_link_nofollow', true);
	$nofollow = $nofollow=='nofollow' ? 'rel="nofollow"' : '';
?>
<div class="link-container">
	<a href="<?php echo esc_url($linkurl); ?>" <?php echo $nofollow; ?> target="_blank" title="<?php echo esc_attr(sprintf(__('External link to: %s', 'ci_theme'), get_the_title())); ?>"><?php echo esc_url($linkurl); ?></a>
</div>

<?php include(locate_template('inc_listing-post-meta.php')); ?>