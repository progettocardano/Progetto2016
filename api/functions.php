<?php
    function die_message($message, $sucess, $data) {
        $message = array("message" => $message, "success" => $success, $data = null);
        if($data) $message["data"] = $data;
        die(json_encode($message));
    }
?>
