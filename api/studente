<?php
    require_once("../includes/connect.php");
    require_once("functions.php");

    header("Content-type: text/json");
    
    //single result
    if(isset($_GET["matricola"])) {
        $query = "SELECT * FROM docenti WHERE matricola = {$_GET[matricola]}";
    }
    $result = $DB->query($query);
    if($result) {
        if($result->num_rows < 1) {
            die_message("Nessun risultato", false);
        } else {
            $row = $result->fetch_assoc();
            die_message("Ottenuto con successo!", true, $row);
        }
    } else {
        die_message("Error no: {$DB->errno}; error: {$DB->error", false)
    }
    
    //multiple result
    
    if( (isset($_GET["nome"]) || isset($_GET["cognome"])) ) {
    
    }
?>
