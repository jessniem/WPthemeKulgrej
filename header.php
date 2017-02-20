<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

<header>
	<nav class="navbar1">
		<div class="left"> <?php
			if ( function_exists( 'the_custom_logo' ) ) {
			    the_custom_logo();
			} ?>
		</div>
		<div class="right">
			<?php wp_nav_menu( array( 'theme_location' => 'mainmenu' )); ?>
		</div>
	</nav>
</header>

<div class="wrapper">
