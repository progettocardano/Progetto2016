<?php
    require_once("../includes/connect.php");
    require_once("functions.php");
    header("Content-type: text/json");
    
    if(isset($_GET["docente_id"])) {
        $query = "SELECT username, nome, cognome, materia, data_nascita, tipo FROM docenti WHERE docente_id = {$_GET[docente_id]}";
    } elseif(isset($_GET["username"])) {
        $query = "SELECT docente_id, nome, cognome, materia, data_nascita, tipo FROM docenti WHERE username = {$_GET[username]}";
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
?>
