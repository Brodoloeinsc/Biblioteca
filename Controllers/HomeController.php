<?php

    namespace Controllers;

    class HomeController extends Controller{

        public function __construct(){
            $this->view = new \Views\MainView('home');
        }

        public function execute(){

            $db = new \Config\DB();

            $bookModel = new \Models\BookModel($db);
            $loanModel = new \Models\LoanModel($db);

            $totalBooks = $bookModel->countBooks();
            $availableBooks = $bookModel->countAvailableBooks();
            $loans = $loanModel->getLoans() ?? [];
            $totalLoans = count($loans);

            $availableBooks = $availableBooks - $totalLoans;

            $this->view->render(array(
                'title' => 'Início',
                'active' => 'home',
                'totalBooks' => $totalBooks,
                'availableBooks' => $availableBooks,
                'totalLoans' => $totalLoans,
                'loans' => $loans
            ));
        }
    }

