<?php

class Input {

    public static function method($method = "post") {
        switch ($method) {
            case "post": {
                    return (!empty($_POST) && $_SERVER['REQUEST_METHOD'] == "POST");
                    break;
                }

            case "get": {
                    return (!empty($_GET) && $_SERVER['REQUEST_METHOD'] == "GET");
                    break;
                }
        }
    }
}
