<?php
    require_once("connect_settings.php");
    
    $GUEST = 0;
    $STUDENTE = 1;
    $DOCENTE = 2;
    
    if(!$DB) {
        echo ("Codice: " . mysqli_connect_errno());
        echo ("Errore: " . mysqli_connect_error());
        exit;
    }
    
    session_start();
	$STATE = (object) (array(
        "guest" => true,
        "studente" => false,
        "docente" => false,
    ));
	
	if(isset($_SESSION["user"])) {
		$STATE->guest = false;
        if($_SESSION["user"]["tipo"] == $STUDENTE) {
            $STATE->studente = true;
            $STATE->docente = false;
        } else {
            $STATE->studente = false;
            $STATE->docente = true;
        }
	}
?>