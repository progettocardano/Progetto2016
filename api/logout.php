<?php
    require_once("../includes/connect.php");
    require_once("functions.php");
    
    session_destroy();
    
    die_message("Logout effettuato", true);
?>