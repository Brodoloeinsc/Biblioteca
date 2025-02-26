<?php

    namespace Controllers;
    use \Models\BookModel;

    class LivrosController extends Controller{

        public function execute(){

            // Register
            \Router::route('livros/cadastrar', function(){
                if(isset($_POST['submit'])){
                    $db = new \Config\DB();
                    $book = new BookModel($db);
                    $book->createBook($_POST['name'], $_POST['publisher'], $_POST['translator'], $_POST['bookshelf'], $_POST['quantity'],);
                }else{      
                    $this->view = new \Views\MainView('livros/cadastrar');
                    $this->view->render(array('title'=>'Cadastrar Livro', 'active'=>'livros'));
                }
            });

            // Edit
            \Router::route('livros/editar', function(){
                $this->view = new \Views\MainView('livros/editar');
                $this->view->render(array('title'=>'Editar Livro', 'active'=>'livros'));
            });

            // Delete
            \Router::route('livros/deletar', function(){
                $this->view = new \Views\MainView('livros/deletar');
                $this->view->render(array('title'=>'Deletar Livro', 'active'=>'livros'));
            });

            // Look All
            \Router::route('livros', function(){
                $this->view = new \Views\MainView('livros');
                $this->view->render(array('title'=>'Ver Livros', 'active'=>'livros'));
            });
        }

    }