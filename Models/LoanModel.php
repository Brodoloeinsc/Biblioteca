<?php

    namespace Models;

    class LoanModel{

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

        public function getLoans(){
            try {
                $this->opendb();
                $stmt = $this->connection->prepare("SELECT * FROM loans");
                $stmt->execute();
                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $result;
            } catch (Exception $e) {
                throw $e;
            }
        }

        public function getLoan($id){
            $id = (int)$id;
            try{
                $this->opendb();
                $stmt = $this->connection->prepare("SELECT * FROM loans WHERE id = ?");
                $stmt->execute([$id]);
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                return $result;
            }catch(Exception $e){
                throw $e;
            }
        }

        public function createLoan($book_id, $book_name, $person_name, $person_cellphone, $person_address, $cpf, $start_date, $end_date) {
            try {
                $this->opendb();
                
                $stmt = $this->connection->prepare("
                    INSERT INTO loans (book_id, book_name, person_name, person_cellphone, person_address, cpf, start_date, end_date)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
                ");
        
                $stmt->execute([$book_id, $book_name, $person_name, $person_cellphone, $person_address, $cpf, $start_date, $end_date]);
                
                return true;
        
            } catch (PDOException $e) {
                throw $e;
            }
        }
        

        public function updateLoan($id, $end_date){
            try{
                $this->opendb();
                $stmt = $this->connection->prepare("UPDATE loans SET end_date = ? WHERE id = ?");
                $result = $stmt->execute([$end_date, $id]);
                return $result;
            }catch(Exception $e){
                throw $e;
            }
        }

        public function deleteLoan($id){
            $id = (int)$id;
            try{
                $this->opendb();
                $stmt = $this->connection->prepare("DELETE FROM loans WHERE id = ?");
                $result = $stmt->execute([$id]);
                return $result;
            }catch(Exception $e){
                throw $e;
            }
        }



    }