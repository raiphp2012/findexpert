<!doctype html>
<!--[if IE 8]> <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php do_action('after_open_body_tag'); ?>

<?php get_template_part('inc_mobile_bar'); ?>

<div id="page">

	<header id="header">
		<div class="row">
			<div class="four columns">
				<?php ci_e_logo('<h1 id="logo">', '</h1>'); ?>
			</div>

			<div class="eight columns">
				<nav id="nav">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'ci_main_menu',
							'fallback_cb'    => '',
							'container'      => '',
							'menu_id'        => 'navigation',
							'menu_class'     => 'group'
						) );
					?>
				</nav><!-- #nav -->
			</div>
		</div>
	</header>
