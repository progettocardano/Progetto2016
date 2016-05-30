<?php
    require_once("../includes/connect.php");
    require_once("functions.php");
	$method = $_SERVER["REQUEST_METHOD"];
	if($method != "POST") die_message("Richiesta " . $method . " non accettata", false); 
    //non sono stati ricevuti username o password
    if(! (isset($_POST["username"]) || isset($_POST["password"]))) {
        die_message("Non è stato inserito username o password", false);
    }
    if(!isset($_POST["userType"])) {
        die_message("Non è stato inserito il tipo di utente", false);
    }
    $username = $_POST["username"];
    $password = crypt($_POST["password"], "$1$2$1npubhsaywn");
    $userType = ($_POST["userType"] == "true") ? "studenti": "docenti";
    $query = "SELECT * FROM {$userType} WHERE username = '{$username}' AND password = '{$password}'";
    $result =  $DB->query($query);
    if($result) {
        if($result->num_rows != 1) { // login fallito
            die_message("Nome utente o password non corretta", false);
         }
        
        while($row = $result->fetch_assoc()) {
            unset($row["password"]);
            $_SESSION["user"] = $row;
        }
        
        die_message("Login effettuato con successo!", true);
    } else if(!$result) {
        die_message("Error no: {$DB->errno}; Error: {$DB->error}", true);
    } else {
        die_message("Error no: {$result->errno}; Error: {$result->error}", true);
    }
?>
