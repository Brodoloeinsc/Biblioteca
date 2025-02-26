<?php

    namespace Controllers;

    use \Models\LoanModel;
    use \Models\BookModel;

    class EmprestimosController extends Controller{

        public function execute(){
    
            $db = new \Config\DB();
            $loan = new LoanModel($db);

            // Create
            \Router::route('emprestimos/cadastrar', function() use ($loan, $db){
                if(isset($_POST['submit'])){
                    $selectedBook = $_POST['book'];
                    
                    if (preg_match('/(\d+) - (.+)/', $selectedBook, $matches)) {
                        $bookId = $matches[1];  
                        $bookName = $matches[2];
                        $result = $loan->createLoan($bookId, $bookName, $_POST['person_name'], $_POST['person_cellphone'], $_POST['person_address'], $_POST['person_cpf'], $_POST['start_date'], $_POST['end_date']);
                        echo '<script>location.href="'.INCLUDE_PATH.'/emprestimos"</script>';
                        die();
                    } else {
                        echo "Formato inválido!";
                    }
                }else{      
                    $book = new BookModel($db);
                    $books = $book->showBooks();
                    $this->view = new \Views\MainView('emprestimos/cadastrar');
                    $this->view->render(array('title'=>'Cadastrar Emprestimo', 'active'=>'emprestimos', 'books' => $books));
                }
            });

            // Update
            \Router::route('emprestimos/extender', function() use ($loan){
                
                if(isset($_GET['id'])){
                    if(isset($_POST['submit'])){
                        $loan->updateLoan($_GET['id'], $_POST['end_date']);
                        $result = $loans = $loan->getLoans();
                        $this->view = new \Views\MainView('emprestimos');
                        if($result){
                            $this->view->render(array('title'=>'Ver Emprestimos', 'active'=>'emprestimos', 'loans'=>$loans, 'success'=>'Emprestimo extendido com sucesso'));
                        }else{
                            $this->view->render(array('title'=>'Ver Emprestimos', 'active'=>'emprestimos', 'loans'=>$loans, 'error'=>'Emprestimo nao pode ser extendido'));
                        }
                        die();
                    }
                    $loan = $loan->getLoan($_GET['id']);
                    $this->view = new \Views\MainView('emprestimos/extender');
                    $this->view->render(array('title'=>'Extender Emprestimo '.$loan['book_name'].'', 'active'=>'emprestimos', 'loan'=>$loan));
                }
            });

            // Delete
            \Router::route('emprestimos/devolucao', function() use ($loan){
                if(isset($_GET['id'])){
                    $result = $loan->deleteLoan($_GET['id']);
                }
                if(isset($result) && $result == true){
                    $loans = $loan->getLoans();
                    $this->view = new \Views\MainView('emprestimos');
                    $this->view->render(array('title'=>'Devolucao', 'active'=>'emprestimos', 'loans'=>$loans, 'success'=>'Livro devolvido com sucesso'));
                }else{
                    $loans = $loan->getLoans();
                    $this->view = new \Views\MainView('emprestimos');
                    $this->view->render(array('title'=>'Devolucao', 'active'=>'emprestimos', 'loans'=>$loans, 'error'=>'Houve algum erro na devolução do livro'));                    
                }
            });

            // Get All
            \Router::route('emprestimos', function() use ($loan){
                $loans = $loan->getLoans();
                $this->view = new \Views\MainView('emprestimos');
                $this->view->render(array('title'=>'Ver Emprestimos', 'active'=>'emprestimos', 'loans'=>$loans));
            });

            // Get One
            \Router::route('emprestimos/unidade', function() use ($loan){
                if(isset($_GET['id'])){
                    $loan = $loan->getLoan($_GET['id']);
                    $this->view = new \Views\MainView('emprestimos/unidade');
                    $this->view->render(array('title'=>'Ver Emprestimo '.$loan['book_name'].'', 'active'=>'emprestimos', 'loan'=>$loan));
                }else{
                    $loans = $loan->getLoans();
                    $this->view = new \Views\MainView('emprestimos');
                    $this->view->render(array('title'=>'Ver Emprestimos', 'active'=>'emprestimos', 'loans'=>$loans));
                }
            });
        }

    }