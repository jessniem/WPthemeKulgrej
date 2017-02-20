<?php

require_once "widget_social.php";
require_once "widget_copyright.php";
require_once "theme_settings.php";

add_action( "wp_dashboard_setup", "tema_kulgrej_edit_dashboard_boxes" );
// Remove/add boxes on dashboard
function tema_kulgrej_edit_dashboard_boxes() {
	global $wp_meta_boxes;
	unset( $wp_meta_boxes["dashboard"]["side"]["core"]["dashboard_quick_press"] );
	unset($wp_meta_boxes["dashboard"]["normal"]["core"]["dashboard_right_now"] );
	unset($wp_meta_boxes["dashboard"]["side"]["core"]["dashboard_primary"] );
	wp_add_dashboard_widget( "kulgrejdashboard", "Genvägar", "kulgrej_dashwidget" );
}

// Create custom dashboard widget
function kulgrej_dashwidget() { ?>
	<h3>Vill du lägga till ett nytt kundcase?</h3>
	<p><a href="post-new.php?post_type=kundcase_cpt_kulgrej">Lägg till Kundcase</a></p>
	<h3>Vill du lägga till ett nytt kundcitat?</h3>
	<p><a href="post-new.php?post_type=citat_cpt_kulgrej">Lägg till Kundcitat</a></p>
	<h3>Här kan du ändra adressuppgifter mm:</h3>
	<p><a href="admin.php?page=tema_kulgrej_settings">Ändra uppgifter</a></p>
	<h3>Ändra på en specifik sida:</h3>
	<p><a href="edit.php?post_type=page">Redigera sida</a></p>
	<?php
}

add_action( "after_setup_theme", "add_editor_styles" );
function add_editor_styles() {
	add_editor_style( "admin-styles/editor-style.css" );
}

// Add buttons in text editor
add_filter('mce_buttons_2', 'wp_mce_buttons_2');
function wp_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}

// Add custom color scheme in admin
add_action( 'admin_init', 'admin_colors' );
function admin_colors() {
	wp_admin_css_color(
		'Kulgrej', __( 'Kulgrej' ),
		get_template_directory_uri() . '/admin-styles/colors.css',
		array( '#261C16', '#F19C08', '#087E8B', '#F2F2F2' )
	);
}

// Remove unnecessary scripts and styles in head
remove_action( "wp_head", "print_emoji_detection_script", 7 );
remove_action( "wp_print_styles", "print_emoji_styles" );
remove_action( "wp_head", "feed_links", 2);

// Add custom styles and scripts
add_action( 'wp_enqueue_scripts', 'setup_tema_kulgrej_styles' );
function setup_tema_kulgrej_styles () {
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/style.css', null, '1.0', 'all' );
	wp_enqueue_style( 'Fonts', '//fonts.googleapis.com/css?family=Catamaran:300,400%7cJosefin+Sans:300,400');
	wp_enqueue_script( 'font-awesome_js', '//use.fontawesome.com/af24f8bf7a.js' );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0', true );
}


function tema_kulgrej_setup () {

	register_nav_menu( 'mainmenu', 'Website main navigation' );

	add_theme_support( 'post-thumbnails', array( 'post', 'kundcase_cpt_kulgrej', 'citat_cpt_kulgrej', 'page' ) );

	// Custom logo
	add_theme_support( 'custom-logo', array(
		'width'			=> 300,
		'height'		=> 150,
		'flex-width'	=> true,
		'flex-height'	=> true
		) );

	// Register sidebars
	register_sidebar( array(
		"name"			=> __( "Footer kolumn 1", "tema_kulgrej" ),
		"id"			=> "footer1",
		"description"	=> __( "Kolumn 1 i footern", "tema_kulgrej" ),
		"before_widget"	=> "<div class='footer-col-1'>",
		"after_widget"	=> "</div>",
	) );
	register_sidebar( array(
		"name"			=> __( "Footer kolumn 2", "tema_kulgrej" ),
		"id"			=> "footer2",
		"description"	=> __( "Kolumn 2 i footern", "tema_kulgrej" ),
		"before_widget"	=> "<div class='footer-col-2'>",
		"after_widget"	=> "</div>",
	) );
	register_sidebar( array(
		"name"			=> __( "Footer kolumn 3", "tema_kulgrej" ),
		"id"			=> "footer3",
		"description"	=> __( "Kolumn 3 i footern", "tema_kulgrej" ),
		"before_widget"	=> "<div class='footer-col-3'>",
		"after_widget"	=> "</div>",
	) );
}

add_action( 'init', 'tema_kulgrej_setup' );

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
	return sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
		get_permalink( get_the_ID() ),
		__( ' Läs mer...', 'tema_kulgrej' )
    );
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/**
 * Filter the excerpt length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


?>
