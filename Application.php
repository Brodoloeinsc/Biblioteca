<?php

    define('INCLUDE_PATH', 'http://localhost/Biblioteca');

    class Application{

        public function execute(){
            $url = isset($_GET['url']) ? explode('/',$_GET['url'])[0] : 'Home';
            
            $url = ucfirst($url);
            $url.="Controller";

            if(file_exists('Controllers/'.$url.'.php')){
                $className = "Controllers\\".$url;
                $controller = new $className;
                $controller->execute();
            }else{
                Die("Incorrect Route");
            }
        }

    }

?>