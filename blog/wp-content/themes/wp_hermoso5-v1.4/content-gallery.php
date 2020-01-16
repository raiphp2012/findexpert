<article id="entry-<?php the_ID(); ?>" <?php post_class('entry row'); ?>>
	<div class="eight columns">
		<div class="entry-head">
			<?php if( comments_open() || have_comments() ): ?>
				<a class="comment-no" href="<?php echo get_comments_link(); ?>"><?php echo get_comments_number(); ?></a>
			<?php endif; ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>

			<div class="entry-meta">
				<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><i class="fa fa-calendar"></i><?php echo get_the_date(); ?></time>
				<span class="entry-author"><i class="fa fa-user"></i><?php the_author(); ?></span>
			</div>

			<?php
				$gal = ci_featgal_get_attachments();
				$attachments = $gal->posts;
				$image_count = count( $attachments );
			?>
			<?php if ( $image_count > 0 ) : ?>
				<ul class="row gallery-wrap">
					<?php
						foreach ( $attachments as $attachment )	{
							$attr = array(
								'alt'   => trim(strip_tags( get_post_meta($attachment->ID, '_wp_attachment_image_alt', true) )),
								'title' => trim(strip_tags( $attachment->post_title ))
							);
							$img_url = ci_get_image_src( $attachment->ID, 'large' );
							echo '<li class="three columns"><a href="'.$img_url.'" class="fancybox" data-fancybox-group="gallery-'.get_the_ID().'" title="">'.wp_get_attachment_image( $attachment->ID, 'ci_thumb_square', false, $attr ).'</a></li>';
						}
					?>
				</ul>
			<?php endif; ?>

			<?php the_content(); ?>

			<div id="comments">
				<?php comments_template(); ?>
			</div>
		</div>
	</div>

	<?php get_sidebar(); ?>
</article>
