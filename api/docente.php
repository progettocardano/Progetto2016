<?php
    require_once("../includes/connect.php");
    require_once("functions.php");
	$method = $_SERVER["REQUEST_METHOD"];
	switch($method) {
		case "GET": {
			if(isset($_GET["docente_id"]) || isset($_GET["username"])) {
				if(isset($_GET["docente_id"])) {
					$query = "SELECT username, nome, cognome, materia, data_nascita, tipo FROM docenti WHERE docente_id = {$_GET[docente_id]}";
				} elseif(isset($_GET["username"])) {
					$query = "SELECT docente_id, nome, cognome, materia, data_nascita, tipo FROM docenti WHERE username = '{$_GET[username]}'";
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
					die_message("Error no: {$DB->errno}; error: {$DB->error}", false);
				}
			}
			break;
		}
		case "POST": { //inserimento
			$numparam = count($_POST);
			if($numparam < 6) {
				die_message("Numero di parametri insufficente(" . count($_POST) . ")", false);
			}
			foreach($_POST as $key => $val) {
				if(!$val || empty($val)) {
					die_message("Il campo {$key} non può essere vuoto", false);
				}
				//sanitize input
				if($key != "password") {
					$_POST[$key] = mysql_real_escape_string($val);
				}
			}
			//data_nascita => yyyy-mm-dd
			$password = crypt($_POST["password"], "$1$2$1npubhsaywn");
			$userType = ($_POST["userType"] == "true") ? "studenti" : "docenti";
			$tipo = ($_POST["userType"] == "true") ? 1 : 2;
			$query = "INSERT INTO {$userType}
				(username, password, nome, cognome, materia, data_nascita, tipo)
				VALUES(
					'{$_POST[username]}',
					'{$password}',
					'{$_POST[nome]}',
					'{$_POST[cognome]}',
					'{$_POST[materia]}',
					'{$_POST[data_nascita]}',
					{$tipo}
				);";
			$result = $DB->query($query);
			if($result) {
				if($DB->insert_id > 0) {
					die_message("Docente no. {$DB->insert_id} inserito con successo!", true);
				}
			} else {
				switch($DB->errno) {
					case 1062: {
						die_message("Utente '{$_POST[username]}' già esistente", false);
						break;
					}
				}
				die_message("Error no: {$DB->errno}; error: {$DB->error}; query: {$query}", false);
			}
			break;
		}
	}
?>
