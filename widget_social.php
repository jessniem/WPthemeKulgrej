<?php
// Creates the social media links widget
class SocialMediaLinks extends WP_Widget {

	public function __construct() {
		$id = "socialmedia_widget";
		$name = "Social Media Links";
		$desc = "Länkar till Facebook och Instagram.";

		parent::__construct( $id, $name, $desc );
	}
	// The Admin form displayed in Appearance -> Widgets
	public function form( $instance ) {
		$faceurl = $instance["facebook"];
		$faceid = esc_attr( $this->get_field_id( "facebook" ) );
		$facename = $this->get_field_name( "facebook" );

		$instaurl = $instance["instagram"];
		$instaid = esc_attr( $this->get_field_id( "instagram" ) );
		$instaname = $this->get_field_name( "instagram" ); ?>
		<p>
			<label for="<?php echo $faceid ?>">Facebook url: </label>
			<input type="text"
				id="<?php echo $faceid; ?>"
				name="<?php echo $facename; ?>"
				value="<?php echo $faceurl; ?>"
				placeholder="Lägg in hela url:en med http"
				class="widefat">
		</p>
		<p>
			<label for="<?php echo $instaid ?>">Instagram url: </label><br>
			<input type="text"
				id="<?php echo $instaid; ?>"
				name="<?php echo $instaname; ?>"
				value="<?php echo $instaurl; ?>"
				placeholder="Lägg in hela url:en med http"
				class="widefat">
		</p> <?php

	}
	// If a new input is made in the form, update in db
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		if( !empty( $new_instance["facebook"] ) ) {
				$instance["facebook"] = $new_instance["facebook"];
		}

		if ( !empty( $new_instance["instagram"] ) ) {
			$instance["instagram"] = $new_instance["instagram"];
		}
		return $instance;
	}
	// Displays widget in the front end area with
	// the the facebook and instagram icon
	// and corresponding links
	public function widget( $args, $instance ) {

		extract( $args );
		$faceurl = $instance["facebook"];
		$instaurl = $instance["instagram"];

		echo $args["before_widget"];
		echo "<a href='$faceurl' target='_blank' aria-label='Facebook'>";
		echo "<i class='fa fa-facebook-square fa-3x' aria-hidden='true'></i>";
		echo "</a>";
		echo "<a href='$instaurl' target='_blank' aria-label='Instagram'>";
		echo "<i class='fa fa-instagram fa-3x' aria-hidden='true'></i>";
		echo "</a>";
		echo $args[ "after_widget"];
	}
}

add_action( 'widgets_init', 'register_socialmediaurl_kulgrej' );
function register_socialmediaurl_kulgrej() {
	register_widget( 'SocialMediaLinks' );
}

?>
