<?php
	$format = get_post_format( get_the_ID() );
	if ( $format == '' ) {
		$format = 'standard';
	}

	// Echo column classes depending on the layout selected
	$image_left = get_post_meta( get_the_ID(), 'ci_image_on_left', true );

	if ( ( $image_left != 'disabled' ) ) {
		$col_class = 'seven pull-five';
		$img_class = "five push-seven";
	} elseif ( ( $image_left == 'disabled' ) ) {
		$col_class = 'seven';
		$img_class = 'five';
	} else {
		$col_class = 'twelve';
		$img_class = '';
	}
?>

<article id="entry-<?php the_ID(); ?>" <?php post_class('entry row'); ?>>

	<div class="<?php echo $img_class; ?> columns">
		<figure class="entry-thumb audio-hold">
			<span class="audio-link-hold">
				<span class="audio-link">
					<a class="audio-play sm2_link" href="<?php echo esc_url( get_post_meta( get_the_ID(), 'ci_format_audio_url', true ) ); ?>">
						<i class="icon-ci-player"></i>
					</a>
				</span>
			</span>
		</figure>
	</div>

	<div class="<?php echo $col_class; ?> columns entry-head">
		<?php if( comments_open() || have_comments() ): ?>
			<a class="comment-no" href="<?php echo get_comments_link(); ?>"><?php echo get_comments_number(); ?></a>
		<?php endif; ?>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo sprintf(__('Permanent link to: %s', 'ci_theme'), get_the_title()); ?>"><?php the_title(); ?></a></h1>

		<div class="entry-meta">
			<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><i class="fa fa-calendar"></i><?php echo get_the_date(); ?></time>
			<span class="entry-author"><i class="fa fa-user"></i><?php the_author(); ?></span>
		</div>

		<?php ci_e_content(); ?>

		<a href="<?php the_permalink(); ?>" class="read-more" title="<?php echo sprintf(__('Permanent link to: %s', 'ci_theme'), get_the_title()); ?>"><?php ci_e_setting('read_more_text'); ?></a>
	</div>
</article>
