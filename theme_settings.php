<?php

add_action( "admin_menu", "setup_theme_admin_menus" );

function setup_theme_admin_menus() {
	$menu_name = _x( "Kulgrejs inställningar", "tema_kulgrej" );
	$page_title = _x( "Kulgrej", "tema_kulgrej" );

	add_menu_page( $page_title, $menu_name, "edit_posts", "tema_kulgrej_settings", "tema_kulgrej_settings_page", "dashicons-smiley" );
}

/**
* The function creates a form for site info (Google Maps, Google Analytics, and other info)
**/
function tema_kulgrej_settings_page() { ?>

	<div class="wrap">
		<h1><?php _e( "Temainställningar: Kulgrej", "tema_kulgrej" ); ?></h1> <?php

		$inputData = array(
			"name" 		=> $_POST["name"],
			"gaid" 		=> $_POST["gaid"],
			"gmid" 		=> $_POST["gmid"],
			"lat" 		=> $_POST["lat"],
			"lng" 		=> $_POST["lng"],
			"address"	=> $_POST["address"],
			"postal" 	=> $_POST["postal"],
			"cookie"	=> $_POST["cookie"],
			"cookie-btn"=> $_POST["cookie-btn"]
		);

		// Save info in db
		foreach ($inputData as $key => $value) {
			if( isset( $_POST["submit"] ) ) {
				if ( !empty( $_POST[$key] ) ) {
					$new_value = esc_attr( $value );
					// Update in wp db
					update_option( $key, $new_value ); ?>
					<div id="settings-error-settings-updated" class="updated settings-error notice is-dismissable">
						<p><strong><?php _e( "Inställningarna sparades", "tema_kulgrej" ); ?></strong></p>
						<button type="button" class="notice-dismiss"></button>
					</div> <?php
				}
			}
		}

		$form = array(
			"name" 		=> "Namn",
			"gaid"		=> "Google Analytics Tracking ID",
			"gmid" 		=> "Google Maps Tracking ID",
			"lat"		=> "Latitud",
			"lng"		=> "Longitud",
			"address" 	=> "Gatuadress",
			"postal" 	=> "Postnummer & postort",
			"cookie"	=> "Text till cookie-notification",
			"cookie-btn"=> "Text på cookie-knappen"
		);

		// Create the form for the settings page ?>
		<form method="post">
			<h2><?php _e( "Inställnignar för Google Analytics, Google Maps och adress", "tema_kulgrej" ); ?></h2>
			<table class="form-table">
				<tbody> <?php
					foreach ($form as $key => $value) { ?>
						<tr>
							<th scope="row"><label for="<?php echo $key; ?>"><?php _e( $value, "tema_kulgrej" ); ?></label></th>
							<td> <?php
							 	if ( $key == "cookie" ) { ?>
							 		<textarea name="<?php echo $key; ?>" id="<?php echo $key; ?>"><?php echo get_option( $key ); ?></textarea> <?php
							 	} else { ?>
									<input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo get_option( $key ); ?> "> <?php
								} ?>
							</td>
						</tr> <?php
					} ?>
				</tbody>
			</table>
			<p class="submit">
				<input type="submit" name="submit" id="submit" value="<?php _e( "Spara ändringarna", "tema_kulgrej" ); ?>" class="button button-primary">
			</p>
		</form>
	</div> <?php
}

?>
