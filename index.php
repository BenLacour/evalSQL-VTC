<?php

require("controller/controller.php");

try {
    if (isset($_GET["action"])) {
        switch ($_GET["action"]) {
            case "driver":
                driver();
                break;
            case "vehicule":
                vehicule();
                break;
            case "displayModify":
                displayModify();
                break;
            case "checkModify":
                checkModify();
                break;
            default:
                driver();
        }
    } else {
        driver();
    }
} catch (Exception $e) {
    die($e->getMessage());
}
