<div class="entry-content">

	<?php if ( !ci_setting('disable_meta_'.$format) ): ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ci_theme' ), get_the_title() ) ); ?>">
				<?php the_title(); ?>
			</a>
		</h1>
		
		<?php if ( ci_setting('show_post_cats') ) { ?>
			<p class="entry-cats"><?php the_category(', '); ?></p>
		<?php } ?>	
		
		<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
			<?php
				echo sprintf(_x('Posted on %s', 'posted on date', 'ci_theme'), get_the_date());
	
				if ( ci_setting('show_author_info') )
				{
					echo ' ' . sprintf(_x('by %s', 'by author name', 'ci_theme'), get_the_author_meta('display_name'));
				}
			?>
		</time>
				
	<?php endif; ?>

	<?php
		if ( !ci_setting('disable_excerpt_'.$format) )
		{
			ci_e_content();
		}
	?>
</div><!-- .entry-content -->

<div class="entry-meta">
	<?php li_display_love_link(); ?>

	<a class="comment-no" href="<?php comments_link(); ?>"  title="<?php echo esc_attr(sprintf(__('%s Comments', 'ci_theme'), get_comments_number())); ?>">
		<i class="fa fa-comments"></i> <?php echo get_comments_number(); ?>
	</a>

	<a class="permalink" href="<?php the_permalink(); ?>"  title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ci_theme' ), get_the_title() ) ); ?>">
		<i class="fa fa-link"></i>
	</a>
</div><!-- .entry-meta -->

<?php
$withcomments = 1; // This is required so that comments can be shown in the homepage.
comments_template('/inc_listing-comments.php');
?>
