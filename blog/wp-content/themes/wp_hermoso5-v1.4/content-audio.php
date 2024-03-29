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

			<figure class="entry-thumb audio-hold">
				<span class="audio-link-hold">
					<span class="audio-link">
						<a class="audio-play sm2_link" href="<?php echo esc_url( get_post_meta( get_the_ID(), 'ci_format_audio_url', true ) ); ?>">
							<i class="icon-ci-player"></i>
						</a>
					</span>
				</span>
			</figure>

			<?php ci_e_content(); ?>
			<div id="comments">
				<?php comments_template(); ?>
			</div>
		</div>
	</div>

	<?php get_sidebar(); ?>
</article>
