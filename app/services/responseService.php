<?php

class responseService {

    static $message;
    static $title;

    public static function get() {

        return [
            "message" => self::$message,
            "title" => self::$title
        ];

    }

    public static function set($message, $isSuccess = null) {

        self::$message = $message;
        self::$title = $isSuccess ? "Success" : "Error";

    }
}

?>

<?php $response = responseService::get();  echo $response["title"]; ?>