<?php get_header(); ?>

<div id="content">
	<?php
		global $wp_query;

		$found = $wp_query->found_posts;
		$none  = __( 'No results found. Please broaden your terms and search again.', 'ci_theme' );
		$one   = __( 'Just one result found. We either nailed it, or you might want to broaden your terms and search again.', 'ci_theme' );
		$many  = sprintf( _n( '%d result found.', '%d results found.', $found, 'ci_theme' ), $found );
	?>
	<div class="container blue search-container">
		<article class="entry row">
			<div class="twelve columns entry-head">
				<h1 class="entry-title"><?php _e( 'Search Results', 'ci_theme' ); ?></h1>

				<p><?php ci_e_inflect($found, $none, $one, $many); ?></p>
				<?php if( $found==0 ) get_search_form(); ?>
			</div>
		</article>
	</div> <!-- .container -->


	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php
			$format = get_post_format( get_the_ID() );
			if ( $format == '' ) {
				$format = 'standard';
			}

			// Set the default coloring for our formats in case the user hasn't set up any of his own.
			if ( $format == 'standard' OR $format == 'gallery' ) {
				$container_class = 'blue';
			} elseif ( $format == 'image' or $format == 'video' ) {
				$container_class = 'yellow';
			} elseif ( $format == 'quote' or $format == 'link' ) {
				$container_class = 'orange';
			} else {
				$container_class = 'blue';
			}
		?>

		<div id="entry-<?php the_ID(); ?>" class="container <?php echo $container_class; ?>">

			<?php do_action('ci_theme_print_post_custom_css', get_the_ID()); ?>

			<?php get_template_part('format', $format); ?>
		</div> <!-- .container -->

	<?php endwhile; endif; ?>

	<div id="paging">
		<div class="row">
			<?php ci_pagination( array(
				'container_id'    => '',
				'container_class' => 'twelve columns',
				'prev_text'       => __( 'Older posts', 'ci_theme' ),
				'next_text'       => __( 'Newer posts', 'ci_theme' )
			) ); ?>
		</div>
	</div>

</div> <!-- #content -->

<?php get_footer(); ?>
