<?php
    require_once("../includes/connect.php");
    require_once("functions.php");

    header("Content-type: text/json");

    if(! (isset($_GET["matricola"]) || isset($_GET["docente_id"]))) {
        die_message("Non sono stati inseriti dei parametri", false);
    }

    $matricola = $_GET["matricola"];
    $docente_id = $_GET["docente_id"];
    $query =
 <<<SQL
    SELECT *
        FROM messaggi
    WHERE matricola = "$matricola"
        AND docente_id = "$docente_id"
SQL;
    $result =  $DB->query($query);
    if($result) {
        $val = array();
        while($row = $result->fetch_assoc()) {
            array_push($val, $row);
        }

        die(json_encode($val););
    } else if(!$result) {
        die_message("Error no: {$DB->errno}; Error: {$DB->error}", true);
    } else {
        die_message("Error no: {$result->errno}; Error: {$result->error}", true);
    }
?>
