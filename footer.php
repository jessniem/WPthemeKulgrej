</div><!-- /wrapper, header.php -->

<?php

$cookie = get_option("cookie");

if (!empty($cookie) && $cookie !== " ") { ?>
	<div id="cookie-notification" class="cookie-notificaton" >
		<?php echo $cookie; ?><br>
		<button class="cookie-button" id="hide-notification"><?php echo get_option("cookie-btn"); ?></button>
	</div> <?php
} ?>

<footer> <?php
	dynamic_sidebar( 'footer1' );
	dynamic_sidebar( 'footer2' );
	dynamic_sidebar( 'footer3' );

	?>
</footer>
<?php wp_footer(); ?>
</body>
</html>
