
// ver: 6  ..  2013-07-24_Wed_08.38-AM 

///require <jquery.packed.js>

//show message on clicking send email button
jQuery(document).ready(function($){
		//worked..   $('#history').click(function(){
		$('#record-actions-send_email_test').click(function(){
		//$(this).attr("disabled","disabled");
				alert("\nGood news: You pressed the 'Send email' button!.\n\n\nPress OK to continue and send....\n\n\nPlease wait for up to a minute after pressing the OK button in this box to see the 'Success' message.\n");
	});

});

