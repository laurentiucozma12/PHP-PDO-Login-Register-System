<?php
include ROOT_PATH."/app/config/connect.php";
include ROOT_PATH."/app/services/registerService.php";
include ROOT_PATH."/app/services/loginService.php";
include ROOT_PATH."/app/services/responseService.php";

class postService {

    public function __construct() {

        if (isset($_POST["register"])) {
            new registerService;
        }

        if (isset($_POST["login"])) {
            new loginService;
        }
    }
}
?>