<?php get_header(); ?>

<div id="page">
	<div id="main">
		<div id="box-container">
			<div id="entry-list" class="row">

				<?php
					global $wp_query;

					$found = $wp_query->found_posts;
					$none  = __( 'No results found. Please broaden your terms and search again.', 'ci_theme' );
					$one   = __( 'Just one result found. We either nailed it, or you might want to broaden your terms and search again.', 'ci_theme' );
					$many  = sprintf( _n( '%d result found.', '%d results found.', $found, 'ci_theme' ), $found );
				?>
				<?php
					global $paged;
	
					$max_page = (int) $wp_query->max_num_pages;
					if ( $max_page > (int) 1 )
						$paged = $wp_query->query_vars['paged']<=1 ? (int)1 : $wp_query->query_vars['paged'];
				?>

				<?php // Show this widget area only on the first page and only if its populated with widgets ?>
				<?php if ( $paged < 2 ): ?>
					<article class="widget-box entry box-item <?php ci_e_setting('listing_columns'); ?> columns">
						<div class="box-wrap">
							<h1 class="entry-title"><?php _e( 'Search Results', 'ci_theme' ); ?></h1>
							<p><?php ci_e_inflect($found, $none, $one, $many); ?></p>
							<?php if( $found==0 ) : ?>
								<?php get_search_form(); ?>
							<?php endif; ?>
						</div>
					</article>
				<?php endif; ?>

				<?php if ( have_posts() ): ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php
							$format = get_post_format($post->ID);
							if ( !$format ) {
								$format = 'standard';
							}
						?>
						<article id="post-<?php the_ID();?>" <?php post_class('entry box-item '.ci_setting('listing_columns').' columns format-'.$format); ?>>
							<div class="box-wrap">
								<?php include(locate_template('format-'.$format.'.php')); ?>
							</div>
						</article>
					<?php endwhile; ?>

					<?php if( is_active_sidebar('last-box-repeat') and (is_front_page() ) ): ?>
						<article class="widget-box entry box-item <?php ci_e_setting('listing_columns'); ?> columns">
							<div class="box-wrap">
								<?php dynamic_sidebar('last-box-repeat'); ?>
							</div>
						</article>
					<?php endif; ?>
				<?php endif; // have_posts() ?>

			</div> <!-- .entry-list -->
		</div>

		<?php if ( ci_setting('disable_infinitescroll') == 'enabled' ) : ?>
			<a class="load-more" href="#"><?php _e('Load More', 'ci_theme'); ?></a>
		<?php else:  ?>
			<a class="load-more" href="#" style="display: none;"><?php _e('Load More', 'ci_theme'); ?></a>
		<?php endif; ?>

		<div class="row pagination-row">
			<div id="paging">
				<?php next_posts_link( __( '&laquo; Next Set of Entries', 'ci_theme' ) ); ?>
			</div>
		</div>
	</div> <!-- #main -->
</div> <!-- #page -->

<?php get_footer(); ?>