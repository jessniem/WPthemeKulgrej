<?php
/**
 * The template for displaying search results pages
 */
get_header(); ?>

<section class="header-img search-img">
		<div class="header-bg">
			<h1 class="header-title"><?php _e( "Sökresultat", "tema_kulgrej" ); ?></h1>
		</div>
	</section>
<main class="main-container search"> <?php
		if ( have_posts() ) { ?>
	<h1 class="search-result"><?php printf( __( "Sökresultat för: %s", "tema_kulgrej" ), get_search_query() ); ?></h1> <?php
	} else { ?>
		<h2 class="search-result"><?php printf( __( "Tyvärr hittades inga resultat för: %s", "tema_kulgrej" ), get_search_query() ); ?></h2> <?php

	}

	if ( have_posts() ) {
		while( have_posts() ) {
			the_post(); ?>
			<a href="<?php echo the_permalink(); ?>">
				<div class="list-result">
					<h3><?php echo the_title(); ?></h3>
					<p><?php the_excerpt(); ?></p>
					<p class="search-category"><?php the_category(); ?></p>
				</div>
			</a> <?php
		}
	} ?>
</main> <?php

get_footer();

?>
