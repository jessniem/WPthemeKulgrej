<?php
get_header();

if (has_post_thumbnail()) { ?>
	<section class="index-img" style="background-image:url(<?php echo the_post_thumbnail_url(); ?>);">
		<div class="header-bg">
			<h1 class="index-title"><span class="hidden">Kulgrej</span> <?php
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$alt_text =  get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
				$logo = wp_get_attachment_image_src( $custom_logo_id , 'medium' );

				if ( has_custom_logo() ) {
				    echo '<img alt="'. esc_attr( $alt_text[0] ).'" src="'. esc_url( $logo[0] ) .'">';
				} else {
				    echo esc_attr( get_bloginfo( 'name' ) );
				} ?>
			</h1>
		</div>
		<div class="turning-words">
			<p class="sentence">Vi gör <br>
			    <div class="tw">
					<span><?php _e( "montrar", "tema_kulgrej" ) ?></span>
					<span><?php _e( "speciallösningar", "tema_kulgrej" ) ?></span>
					<span><?php _e( "event", "tema_kulgrej" ) ?></span>
					<span><?php _e( "scenografi", "tema_kulgrej" ) ?></span>
					<span><?php _e( "kickoffer", "tema_kulgrej" ) ?></span>
					<span><?php _e( "specialsnickerier", "tema_kulgrej" ) ?></span>
					<span><?php _e( "popup store", "tema_kulgrej" ) ?></span>
					<span><?php _e( "produktlanseringar", "tema_kulgrej" ) ?></span>
					<span><?php _e( "upplevelser", "tema_kulgrej" ) ?></span>
			    </div>
			</p>
  		</div>
	</section> <?php
} ?>


 <?php
get_footer(); ?>
