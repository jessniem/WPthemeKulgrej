<?php
/**
* Template Name: Kundcitat
* Visar sidan Kundcitat
**/

get_header();

if (has_post_thumbnail()) { ?>
	<section class="header-img fixed" style="background-image:url(<?php
	if( wp_is_mobile() ) {
		echo the_post_thumbnail_url( 'large' );
	} else {
		echo the_post_thumbnail_url();
	} ?>);">
		<div class="header-bg">
			<h1 class="header-title"><?php the_title(); ?></h1>
		</div>
	</section> <?php
	} ?>

	<main class="main-container main-quote"> <?php

		// Query to display all quote posts
		$quotes = new WP_Query( array(
			"post_type"		=> "citat_cpt_kulgrej",
			"post_status"	=> "publish"
			) ); ?>


		<div class="quote-container"> <?php

			if( $quotes->have_posts() ) {

				while( $quotes->have_posts() ) { ?>

					<article class="quote-text line-height no-break"> <?php
						$quotes->the_post();

						// Get the metabox field values
						$name = get_post_meta( get_the_ID(), 'name', true );
						$title = get_post_meta( get_the_ID(), 'title', true );
						$company = get_post_meta( get_the_ID(), 'company', true );

						// Get the quote
						the_content(); ?>

						<p class="quoter"> <?php
							if( !empty( $name ) ) {
								echo $name;
							} ?>
						</p>

						<p> <?php
							if( !empty( $title ) ) {
								echo "<i>" . $title . "</i>" . ", ";
							}
							if( !empty( $company ) ) {
								echo $company;
							} ?>
						</p>
					</article> <?php
				}
				wp_reset_postdata();
			} else {
				_e( "Det finns inga kundcitat publicerade", "tema_kulgrej" );
			} ?>
		</div>
	</main> <?php

get_footer();

?>
