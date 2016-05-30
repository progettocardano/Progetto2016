<?php
    require_once("../includes/connect.php");
    require_once("functions.php");
    
    //single result
    if(isset($_GET["matricola"])) {
        $query = "SELECT * FROM docenti WHERE matricola = {$_GET[matricola]}";
        $result = $DB->query($query);
        if($result) {
            if($result->num_rows < 1) {
                die_message("Nessun risultato", false);
            } else {
                $row = $result->fetch_assoc();
                die_message("Ottenuto con successo!", true, $row);
            }
        } else {
            die_message("Error no: {$DB->errno}; error: {$DB->error}", false);
        }
    }
    //multiple result
    
    if( (isset($_GET["nome"]) || isset($_GET["cognome"])) ) {
        $nome = $_GET["nome"];
        $cognome = $_GET["cognome"];
        
        $query = "SELECT
            matricola,username,nome,cognome,codice_fiscale,data_nascita,anno_prima_iscrizione,
            email,telefono_fisso,telefono_cellulare,indirizzo_residenza,comune_residenza,docente_id
            FROM studenti WHERE ";
        if($nome) {
            $query .= " nome = '{$nome}'";
            if($cognome) {
                $query .= "AND cognome = '{$cognome}'";
            }
        } elseif($cognome) {
            $query .= " cognome = '{$cognome}'";
            if($nome) {
                $query .= "AND nome = '{$nome}'";
            }
        }
        
        $result = $DB->query($query);
        if($result) {
            if($result->num_rows < 1) {
                die_message("Nessun risultato", false);
            } else {
                $data = array();
                
                while($row = $result->fetch_assoc()) {
                    array_push($data, $row);
                }
                die_message("Ottenuti con successo!", true, $data);
            }
        } else {
            die_message("Error no: {$DB->errno}; error: {$DB->error}", false);
        }
    }
?>
