<?php

    namespace Config;

    class Db{
        function __construct() {
            $this->host = "localhost";
            $this->user  = "root";
            $this->pass = '';
            $this->db = "Biblioteca";
        }
    }
?>