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
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
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
                return $stmt->fetch(\PDO::FETCH_ASSOC);
            }catch(Exception $e){
                throw $e;
            }
        }

        public function createLoan($book_id, $book_name, $person_name, $person_cellphone, $person_address, $cpf, $start_date, $end_date) {
            try {
                $this->opendb();
                $stmt = $this->connection->prepare("INSERT INTO loans (book_id, book_name, person_name, person_cellphone, person_address, cpf, start_date, end_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$book_id, $book_name, $person_name, $person_cellphone, $person_address, $cpf, $start_date, $end_date]);
                return true;
            } catch (\PDOException $e) {
                throw $e;
            }
        }

        public function updateLoan($id, $end_date){
            try{
                $this->opendb();
                $stmt = $this->connection->prepare("UPDATE loans SET end_date = ? WHERE id = ?");
                return $stmt->execute([$end_date, $id]);
            }catch(Exception $e){
                throw $e;
            }
        }

        public function deleteLoan($id){
            $id = (int)$id;
            try{
                $this->opendb();
                $stmt = $this->connection->prepare("DELETE FROM loans WHERE id = ?");
                return $stmt->execute([$id]);
            }catch(Exception $e){
                throw $e;
            }
        }

        public function countLoans(){
            try {
                $this->opendb();
                $stmt = $this->connection->query("SELECT COUNT(*) as total FROM loans");
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                return $result['total'] ?? 0;
            } catch (Exception $e) {
                throw $e;
            }
        }

        public function countActiveLoans(){
            try {
                $this->opendb();
                $stmt = $this->connection->query("SELECT COUNT(*) as active FROM loans WHERE end_date >= CURDATE()");
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                return $result['active'] ?? 0;
            } catch (Exception $e) {
                throw $e;
            }
        }
    }
