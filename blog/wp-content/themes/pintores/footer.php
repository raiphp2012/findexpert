<section id="bottom-widget" style="display: none;">
	<div class="row">
		<?php dynamic_sidebar('bottom-row-widgets'); ?>
	</div>
</section> <!-- #bottom-widget -->

<footer id="footer">
	<div class="row">
		<div class="footer-widget-holder three columns">
			<?php dynamic_sidebar('footer-col-1'); ?>
		</div>

		<div class="footer-widget-holder three columns">
			<?php dynamic_sidebar('footer-col-2'); ?>
		</div>

		<div class="footer-widget-holder three columns">
			<?php dynamic_sidebar('footer-col-3'); ?>
		</div>

		<div class="footer-widget-holder three columns">
			<?php dynamic_sidebar('footer-col-4'); ?>
		</div>
	</div>


	

                
            
</footer>

<?php wp_footer(); ?>

</body>
</html>