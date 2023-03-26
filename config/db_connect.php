<?php 

	@session_start();
	// connect to the database
	$conn = mysqli_connect('localhost', 'bhavya', '12345678', 'daily-bugle') or die( 'Connection error: '. mysqli_connect_error());

	// check connection
	// if(!$conn){
		
	// }
