<?php get_header();

if (has_post_thumbnail()) { ?>
	<section class="header-img" style="background-image:url(<?php
		if( wp_is_mobile() ) {
			echo the_post_thumbnail_url('large');
		} else {
			echo the_post_thumbnail_url();
		} ?>);">
		<div class="header-bg">
			<h1 class="header-title"><?php the_title(); ?></h1>
		</div>
	</section> <?php
	}
?>
<main class="main-container"> <?php
	if( have_posts() ) {
		while( have_posts() ) {
			the_post(); ?>
			<h3><?php the_title(); ?></h3> <?php
			the_content();

			$terms = wp_get_post_terms( get_the_ID(), "kundcase_projecttype" );

			foreach( $terms as $term ) {
				$term_link = get_term_link( $term );
				echo "<a href='" . esc_url( $term_link ) . "'>" . $term->name . "</a>" . " ";
			}
		}
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
		    comments_template();
		}
	} ?>

</main> <?php

get_footer();

?>
