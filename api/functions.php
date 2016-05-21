<?php
    function die_message($message, $success, $data) {
        $result = array("message" => $message, "success" => $success);
        if(isset($data)) {
            array_push($result, $data);
        }
        die(json_encode($result));
    }
?>
