<?php
get_header(); ?>
	<main class="main-container">

		<h2><?php the_archive_title(); ?></h2> <?php

		if( have_posts() ) {
			while( have_posts() ) {
				the_post(); ?>

		<section>
			<article>
				<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a> <?php
				the_post_thumbnail('medium');

				the_excerpt();

					}
				} else {
					echo _e( "Tyvärr finns det inga inlägg inom den här kategorin.", "tema_kulgrej" );
				} ?>
			</article>
		</section>
	</main><?php

get_footer();

?>
