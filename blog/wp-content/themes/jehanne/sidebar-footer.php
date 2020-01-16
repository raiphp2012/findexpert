<?php
/**
 * The sidebar containing the footer widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 */
?>

<?php if ( is_page_template( 'page-templates/front-page.php' ) || is_page_template( 'page-templates/front-page-no-column.php' ) ) : ?>
	
	<?php if ( is_active_sidebar( 'sidebar-14' ) ) : ?>

		<div class="sidebar-footer">
			<div class="widget-area">
				<?php dynamic_sidebar( 'sidebar-14' ); ?>
			</div><!-- .widget-area -->
		</div><!-- .sidebar-footer -->
		
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-15' ) ) : ?>

		<div class="sidebar-footer-full">
			<div class="widget-area">
				<?php dynamic_sidebar( 'sidebar-15' ); ?>
			</div><!-- .widget-area -->
		</div><!-- .sidebar-footer-full -->
	
	<?php endif; ?>
	
<?php else: ?>
	<?php if ( is_active_sidebar( 'sidebar-3' ) || is_active_sidebar( 'sidebar-7') ) : ?>

		<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
		
			<div class="sidebar-footer">
				<div class="widget-area">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</div><!-- .widget-area -->
			</div><!-- .sidebar-footer -->
			
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
		
			<div class="sidebar-footer-full">
				<div class="widget-area">
					<?php dynamic_sidebar( 'sidebar-7' ); ?>
				</div><!-- .widget-area -->
			</div><!-- .sidebar-footer-full -->
			
		<?php endif; ?>	
	<?php endif; ?>
	
<?php endif; ?>