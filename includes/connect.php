<?php
    $DB = mysqli_connect(
        "localhost",         //host
        "root",     //username
        "",         //password
        "my_database"  //database
    );
    
    if(!$DB) {
        echo ("Codice: " . mysqli_connect_errno());
        echo ("Errore: " . mysqli_connect_error());
        exit;
    }
    
    session_start();
	$LOGGED_IN = false;
	
	if(isset($_SESSION["user"])) {
		$LOGGED_IN = true;
	}
?>