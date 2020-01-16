<?php get_header(); ?>
<?php while( have_posts() ) : the_post(); ?>
	<?php
		$format = get_post_format($post->ID);
		if ( !$format ) {
			$format = 'standard';
		}
	?>
	<div id="page">
		<div id="main">
			<div class="row">

				<div class="<?php ci_e_setting('main_content_cols'); ?> columns">
					<article id="post-<?php the_ID();?>" <?php post_class('entry box format-'.$format); ?>>
						<div class="box-wrap">
							<?php get_template_part('format-'.$format.'-single'); ?>

							<div class="entry-content group">
								<h1 class="entry-title">
									<?php the_title(); ?>
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

								<?php ci_e_content(); ?>

							</div> <!-- .entry-content -->

							<div class="entry-meta">
								<?php li_display_love_link(); ?>
							</div>

						</div>
					</article>

					<?php
						if ( ci_setting('layout') == 'default' )
							comments_template();
					?>
					</div> <!-- .columns -->

				<?php
					if ( ci_setting('layout') == 'default' )
						get_sidebar();
					else
						get_sidebar('alt');
				?>

			</div> <!-- .row -->
		</div> <!-- #main -->
	</div> <!-- #page -->
<?php endwhile; ?>
<?php get_footer(); ?>