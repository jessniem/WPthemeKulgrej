<?php

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
} ?>

<div id="comments" class="comments-area"> <?php
	if ( have_comments() ) { ?>
		<h2 class="comments-title"> <?php
			get_the_title();
				} ?>
		</h2>

		<ul class="comment-list"> <?php
				wp_list_comments( array(
					'avatar_size' => 100,
					'style'       => 'ol',
					'short_ping'  => true,
				) ); ?>
		</ul> <?php
	comment_form(); ?>
</div>
