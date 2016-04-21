<?php
    require_once("connect_settings.php");
    require_once("class.user.php");
    
    if(!$DB) {
        echo ("Codice: " . mysqli_connect_errno());
        echo ("Errore: " . mysqli_connect_error());
        exit;
    }
    
    session_start();
	$user = new User();
	
	if(isset($_SESSION["user"])) {
        $user->setState((int) $_SESSION["user"]["tipo"]);
	}
?>