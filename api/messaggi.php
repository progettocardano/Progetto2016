<?php
    require_once("../includes/connect.php");
    require_once("functions.php");

    header("Content-type: text/json");

    $orderby = (isset($_GET["orderby"])) ? $_GET["orderby"] : "";

    if(isset($_GET["matricola"])) { //ricezione messaggi per matricola
        $query = "SELECT * FROM messaggi WHERE matricola = {$_GET[matricola]} {$orderby}";
        $result = $DB->query($query);
        if($result) {
            $data = array();
            while($row = $result->fetch_assoc()) {
                array_push($data, $row);
            }
            die_message("Messaggi ottenuti con successo", true, $data);
        } else {
            die_message("Error no: {$DB->errno}; error: {$DB->error", false);
        }
    }
    
    if(isset($_GET["docente_id"])) { //ricezione messaggi per matricola
        $query = "SELECT * FROM messaggi WHERE docente_id = {$_GET[docente_id} {$orderby}";
        $result = $DB->query($query);
        if($result) {
            $data = array();
            while($row = $result->fetch_assoc()) {
                array_push($data, $row);
            }
            die_message("Messaggi ottenuti con successo", true, $data);
        } else {
            die_message("Error no: {$DB->errno}; error: {$DB->error", false);
        }
    }
    
?>
