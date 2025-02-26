<?php

    namespace Controllers;
    use \Models\BookModel;

    class LivrosController extends Controller{

        public function execute(){

            $db = new \Config\DB();
            $book = new BookModel($db);

            // Register
            \Router::route('livros/cadastrar', function() use ($book){
                if(isset($_POST['submit'])){
                    $book->createBook($_POST['name'], $_POST['publisher'], $_POST['translator'], $_POST['bookshelf'], $_POST['quantity']);
                    echo '<script>location.href="'.INCLUDE_PATH.'/livros"</script>';
                    die();
                }else{      
                    $this->view = new \Views\MainView('livros/cadastrar');
                    $this->view->render(array('title'=>'Cadastrar Livro', 'active'=>'livros'));
                }
            });

            // Update
            \Router::route('livros/editar', function() use ($book){                
                if(isset($_GET['id'])){
                    if(isset($_POST['submit'])){
                        $book->updateBook($_GET['id'], $_POST['name'], $_POST['publisher'], $_POST['translator'], $_POST['bookshelf'], $_POST['quantity']);
                    }
                    $singleBook = $book->showBook($_GET['id']);
                    $this->view = new \Views\MainView('livros/editar');
                    $this->view->render(array('title'=>'Editar Livro', 'active'=>'livros', 'book' => $singleBook));
                }
            });

            // Delete
            \Router::route('livros/deletar', function() use ($book){
                if(isset($_GET['id'])){
                    $result = $book->deleteBook($_GET['id']);
                    if($result == true){
                        echo '<script>location.href="'.INCLUDE_PATH.'/livros?success=Livro deletado com sucesso"</script>';
                        die();  
                    }else{
                        echo '<script>location.href="'.INCLUDE_PATH.'/livros?error=Erro para deletar o livro"</script>';
                        die();  
                    }
                }else{      
                    echo '<script>location.href="'.INCLUDE_PATH.'/livros?error=Erro para deletar o livro"</script>';
                    die();   
                }
            });

            // Look All
            \Router::route('livros', function() use ($book){
                $books = $book->showBooks();
                $this->view = new \Views\MainView('livros');
                if(isset($_GET['error'])){
                    $this->view->render(array('title'=>'Ver Livros', 'active'=>'livros', 'books'=>$books, 'error'=>$_GET['error']));
                }else if(isset($_GET['success'])){
                    $this->view->render(array('title'=>'Ver Livros', 'active'=>'livros', 'books'=>$books, 'success'=>$_GET['success']));
                }else{
                    $this->view->render(array('title'=>'Ver Livros', 'active'=>'livros', 'books'=>$books));
                }
            });
        }

    }