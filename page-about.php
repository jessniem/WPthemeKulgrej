<?php
/**
* Template Name: Om oss
* Visar sidan Om oss
**/

get_header();

if (has_post_thumbnail()) { ?>
	<section class="header-img fixed" style="background-image:url(<?php
	if( wp_is_mobile() ) {
		echo the_post_thumbnail_url('large');
	} else {
		echo the_post_thumbnail_url();
	}

	 ?>);">
		<div class="header-bg">
			<h1 class="header-title"><?php the_title(); ?></h1>
		</div>
	</section> <?php
} ?>

<main class="main-container flex">

<div class="about-us">
	<?php
	if( have_posts() ) {
		while( have_posts() ) { ?>
		<article class="about-text line-height"> <?php
			the_post();
			the_content();
		} ?>
		</article>
</div>


<div class="contact-info">
	<article class="about">
		<?php the_field( 'left' ); ?>
	</article>
	<article class="about">
		<?php the_field( 'right' ); ?>
	</article>
</div> <?php

} ?>

</main> <!-- /main-container -->


<?php get_footer(); ?>
