var $ = jQuery;

if( localStorage.getItem('notificationShown') == null ) {
	$('#hideNotification').click(hideNotification);
} else {
	$('#cookie-notification').addClass("hidden");
}
// } elseif ( localStorage.getItem('notificationShown') != null ) {
// 	$('#cookie-notification').addClass("hidden");
// }

// document.getElementById('hide-notification')
// .addEventListener('click', hideNotification)
$('#hide-notification').on('click', hideNotification);
//$('#hideNotification').click(hideNotification);

function hideNotification() {
	localStorage.setItem('notificationShown', true);
	$('#cookie-notification').fadeOut(500, function() { // det blir ganska lätt spagettikod, man kan nästla hur många funktioner i en funktion som helst
	$('#cookie-notification').addClass("hidden");
	});  //.hide(); //.css('display', 'none'); Man kan itne lägga till CSS på samma sätt i vanilla js, behöver använda jQuery elelr liknande
}
