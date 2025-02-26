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

        public function updateBook($id, $name = null, $publisher = null, $translator = null, $bookshelf = null, $quantity = null) {
            try {
                $this->opendb();
        
                // Montar a query dinamicamente
                $fields = [];
                $params = [];
        
                if ($name !== null) {
                    $fields[] = "name = ?";
                    $params[] = $name;
                }
                if ($publisher !== null) {
                    $fields[] = "publisher = ?";
                    $params[] = $publisher;
                }
                if ($translator !== null) {
                    $fields[] = "translator = ?";
                    $params[] = $translator;
                }
                if ($bookshelf !== null) {
                    $fields[] = "bookshelf = ?";
                    $params[] = $bookshelf;
                }
                if ($quantity !== null) {
                    $fields[] = "quantity = ?";
                    $params[] = $quantity;
                }
        
                // Verificar se há campos para atualizar
                if (count($fields) > 0) {
                    $sql = "UPDATE books SET " . implode(", ", $fields) . " WHERE id = ?";
                    $params[] = (int) $id; // Adicionar o ID como inteiro
        
                    $stmt = $this->connection->prepare($sql);
                    $result = $stmt->execute($params);
        
                    return $result; // Retorna true ou false
                } else {
                    return false; // Nada para atualizar
                }
        
            } catch (Exception $e) {
                throw $e;
            }
        }
        

        public function deleteBook($id){
            try {
                $id = (int)$id;
                $this->opendb();
                $stmt = $this->connection->prepare("DELETE FROM books WHERE id = ?");
                $result = $stmt->execute([$id]);
                return $result;
            } catch (Exception $e) {
                throw $e;
            }
        }

        public function showBook($id){
            try {
                $id = (int) $id;
                $this->opendb();
                $stmt = $this->connection->prepare("SELECT * FROM books WHERE id = ?");
                $stmt->execute([$id]);
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                return $result;
            } catch (Exception $e) {
                throw $e;
            }
        }
        
        public function showBooks(){
            try {
                $this->opendb();
                $stmt = $this->connection->prepare("SELECT * FROM books");
                $stmt->execute();
                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $result;
            } catch (Exception $e) {
                throw $e;
            }
        }

        public function countBooks(){
            try {
                $this->opendb();
                $stmt = $this->connection->query("SELECT COUNT(*) as total FROM books");
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                return $result['total'] ?? 0;
            } catch (Exception $e) {
                throw $e;
            }
        }

        public function countAvailableBooks(){
            try {
                $this->opendb();
                $stmt = $this->connection->query("SELECT SUM(quantity) as available FROM books");
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                return $result['available'] ?? 0;
            } catch (Exception $e) {
                throw $e;
            }
        }

    }