<?php

    namespace Controllers;

    class LivrosController extends Controller{

        public function execute(){
            // if(isset($_POST['submit'])){
            //     \Models\ContatoModel::sendForm();
            //     echo '<script>location.href="'.INCLUDE_PATH.'/contato/sucesso"</script>';
            //     die();
            // }

            // Success
            \Router::route('livros/cadastrar', function(){
                $this->view = new \Views\MainView('livros-cadastro');
                $this->view->render(array('title'=>'Pagina Contato'));
            });

            \Router::route('livros/editar', function(){
                $this->view = new \Views\MainView('livros-editar');
                $this->view->render(array('title'=>'Pagina Contato'));
            });

            \Router::route('livros/deletar', function(){
                $this->view = new \Views\MainView('livros-deletar');
                $this->view->render(array('title'=>'Pagina Contato'));
            });

            // Only Register
            \Router::route('livros', function(){
                $this->view = new \Views\MainView('livros');
                $this->view->render(array('title'=>'Pagina Contato'));
            });
        }

    }