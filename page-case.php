<?php
/**
* Template Name: Kundcase
* Visar alla inlägg av typen kundcase.
**/

get_header();

if (has_post_thumbnail()) { ?>
	<section class="header-img fixed" style="background-image:url(<?php
		if( wp_is_mobile() ) {
			echo the_post_thumbnail_url('large');
		} else {
			echo the_post_thumbnail_url();
		} ?>);">
		<div class="header-bg">
			<h1 class="header-title"><?php the_title(); ?></h1>
		</div>
	</section> <?php
	} ?>

<main class="main-container"> <?php

	// query to display customer cases
	 $cases = new WP_Query( array(
	    "post_type"       	=>  "kundcase_cpt_kulgrej",
	    "post_status"		=>	"publish"
	    ) ); ?>

	<div class="cases-container"> <?php

		 if( $cases->have_posts() ) {

		 	while( $cases->have_posts() ) {

		 		$cases->the_post();	?>

				<div class="cases-content">

					<div class="left"> <?php
						the_post_thumbnail(); ?>
					</div>

					<article class="right">
						<a href="<?php the_permalink(); ?>"><p><?php the_title(); ?> </p></a> <?php

						the_content(); ?>

						<a href="<?php the_permalink(); ?>"><p>Läs mer</p></a> <?php

						$terms = wp_get_post_terms( get_the_ID(), "kundcase_projecttype" );

						foreach( $terms as $term ) {
							$term_link = get_term_link( $term );
							echo "<a href='" . esc_url( $term_link ) . "'>" . $term->name . "</a>" . " ";
						} ?>
					</article>
				</div><?php
		 		}
		 		wp_reset_postdata();
		 	} else {
				echo _e( "Tyvärr finns det inga kundcase publicerade", "tema_kulgrej" );
		 	} ?>
	</div>
 </main> <?php

get_footer();
?>
