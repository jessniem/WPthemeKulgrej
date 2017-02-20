<?php

get_header(); ?>

<main class="main-container"> <?php

	// Query to display customer cases
	 $cases = new WP_Query( array(
	    "post_type"       	=>  "kundcase_cpt_kulgrej",
	    "post_status"		=>	"publish"
	    ) ); ?>

	<section class="cases-container"> <?php

		if( $cases->have_posts() ) {

		 	while( $cases->have_posts() ) {

		 		$cases->the_post();	?>

				<article class="cases-content">

					<div class="left">
						<?php the_post_thumbnail('cases'); ?>
					</div>

					<div class="right">
						<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a> <?php

						the_excerpt();

						$terms = wp_get_post_terms( get_the_ID(), "kundcase_projecttype" );

						foreach( $terms as $term ) {
							$term_link = get_term_link( $term );
							echo "<a href='" . esc_url( $term_link ) . "'>" . $term->name . "</a>" . " ";
						} ?>
					</div>
				</article> <?php
		 	}
		 	wp_reset_postdata();
		} else {
				echo _e( "Tyvärr finns det inga kundcase publicerade", "tema_kulgrej" );
		} ?>
	</section>
</main> <?php

get_footer();

?>
