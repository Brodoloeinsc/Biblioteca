<?php

    class Router {

        public static function route($path, $arg) {
            $url = isset($_GET['url']) ? $_GET['url'] : "";

            if ($url == $path) {
                $arg();
                die();
            }

            $path = explode("/", trim($path, "/"));
            $url = explode("/", trim($url, "/"));
            $ok = true;
            $par = [];

            if (count($path) == count($url)) {
                foreach ($path as $key => $value) {
                    if ($value == "?") {
                        $par[$key] = $url[$key];
                    } else if ($url[$key] != $value) {
                        $ok = false;
                        break;
                    }
                }

                if ($ok) {
                    $arg($par);
                    die();
                }
            }
        }

    }

?>
