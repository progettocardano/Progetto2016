<?php
    require_once("../includes/connect.php");
    require_once("functions.php");
	$method = $_SERVER["REQUEST_METHOD"];
	switch($method) {
		case "GET": {
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
					die_message("Error no: {$DB->errno}; error: {$DB->error}", false);
				}
			}
			
			if(isset($_GET["docente_id"])) { //ricezione messaggi per matricola
				$query = "SELECT * FROM messaggi WHERE docente_id = {$_GET[docente_id]} {$orderby}";
				$result = $DB->query($query);
				if($result) {
					$data = array();
					while($row = $result->fetch_assoc()) {
						array_push($data, $row);
					}
					die_message("Messaggi ottenuti con successo", true, $data);
				} else {
					die_message("Error no: {$DB->errno}; error: {$DB->error}", false);
				}
			}
			break;
		}
		case "POST": {
			$numparam = count($_POST);
			if($numparam < 3) {
				die_message("Numero di parametri insufficente(" . count($_POST) . ")", false);
			}
			foreach($_POST as $key => $val) {
				if(!$val || empty($val)) {
					die_message("Il campo {$key} non può essere vuoto", false);
				}
				//sanitize input
				$_POST[$key] = mysql_real_escape_string($val);
			}
			//data => yyyy-mm-dd
			$data = date("yyyy-mm-dd HH:ss", time())
			$query = "INSERT INTO messaggi
				(matricola, docente_id, data, messaggio)
				VALUES(
					'{$_POST[matricola]}',
					'{$_POST[docente_id]}',
					'{$data}',
					'{$_POST[messaggio]}'
				);";
			$result = $DB->query($query);
			if($result) {
				if($DB->insert_id > 0) {
					die_message("Messaggio {$DB->insert_id} inviato con successo!", true);
				}
			} else {
				die_message("Error no: {$DB->errno}; error: {$DB->error}; query: {$query}", false);
			}
			break;
		}
    }
?>
