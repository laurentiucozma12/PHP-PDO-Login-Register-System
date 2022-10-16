<?php

class responseService {

    static $message;
    static $title;
    static $isSuccess;

    public static function get() {

        if (self::$isSuccess === false) {
            echo 
            '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <strong>'.self::$title.'!</strong> '.self::$message.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
        }

        if (self::$isSuccess === true) {
            echo 
            '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#check-circle-fill"/></svg>
                <strong>'.self::$title.'!</strong> '.self::$message.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
        }

    }

    public static function set($message, $isSuccess = null) {

        self::$isSuccess = $isSuccess ? true : false;
        self::$message = $message;
        self::$title = $isSuccess ? "Success" : "Error";

    }
}

?>
