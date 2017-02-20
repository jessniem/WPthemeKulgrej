<?php
// Creates the copyright info widget
class CopyrightInfo extends WP_Widget {

	public function __construct() {
		$id = "copyright_widget";
		$name = "Copyright Info";
		$desc = "Visa copyright i footern";

		parent::__construct( $id, $name, $desc );
	}
	// The admin form displayed in Appearances -> Widgets
	public function form( $instance ) {
		$copyname = $instance["copyright"];
		$copyid = esc_attr( $this->get_field_id( "copyright" ) );
		$copy = $this->get_field_name( "copyright" ); ?>
		<p>
			<label for="<?php echo $copyid ?>">Copyright: </label>
			<input type="text"
				id="<?php echo $copyid; ?>"
				name="<?php echo $copy; ?>"
				value="<?php echo $copyname; ?>"
				placeholder="Copyright"
				class="widefat">
		</p> <?php
	}

	// If a new input is made, update the field	in the db
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		if( !empty( $new_instance["copyright"] ) ) {
				$instance["copyright"] = $new_instance["copyright"];
			}

		return $instance;
	}
	// Displays widget in the front end area with
	// the copyright symbol and current year
	public function widget( $args, $instance ) {

		extract( $args );
		echo $args["before_widget"];
		echo "&copy; " . date('o') . " ";
		echo $instance["copyright"];
		echo $args["after_widget"];
	}
}

add_action( 'widgets_init', 'register_copyrightinfo_kulgrej' );
function register_copyrightinfo_kulgrej() {
	register_widget( 'CopyrightInfo' );
}

?>
