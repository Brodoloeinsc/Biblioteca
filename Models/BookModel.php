<?php

    namespace Models;

    class BookModel{

        public $host;
        public $user;
        public $pass;
        public $db;
        public $connection;
        
        public function __construct($setup){
            $this->host = $setup->host;
            $this->user = $setup->user;
            $this->pass =  $setup->pass;
            $this->db = $setup->db;
        }

        public function opendb(){
            try {
                $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
                $this->connection = new \PDO($dsn, $this->user, $this->pass);
                
                // Configurar PDO para lançar exceções em caso de erro
                $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        
            } catch (\PDOException $e) {
                die("Erro na conexão: " . $e->getMessage());
            }
        }

        public function createBook($name, $publisher, $translator, $bookshelf, $quantity){
            try {
                $this->opendb();
                $stmt = $this->connection->prepare("INSERT INTO books (name, publisher, translator, bookshelf, quantity) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$name, $publisher, $translator, $bookshelf, $quantity]);
                
            } catch (Exception $e) {
                throw $e;
            }
        }
        

    }