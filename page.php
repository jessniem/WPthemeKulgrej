<?php get_header(); ?>

<main class="main-container">
	<div> <?php
		if( have_posts() ) {
			while( have_posts() ) { ?>
			<section> <?php
				the_post();
				the_content();

				}
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
				    comments_template();
				} ?>
			</section> <?php
		} ?>
	</div>
</main> <?php

get_footer();

?>
