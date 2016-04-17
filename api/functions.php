<?php
    function die_message($message, $success) {
        die(json_encode(array("message" => $message, "success" => $success)));
    }
?>