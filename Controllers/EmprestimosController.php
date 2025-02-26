<?php

    namespace Controllers;

    class EmprestimosController extends Controller{

        public function execute(){
            // if(isset($_POST['submit'])){
            //     \Models\ContatoModel::sendForm();
            //     echo '<script>location.href="'.INCLUDE_PATH.'/contato/sucesso"</script>';
            //     die();
            // }

            // Register
            \Router::route('emprestimos/cadastrar', function(){
                $this->view = new \Views\MainView('emprestimos/cadastro');
                $this->view->render(array('title'=>'Cadastrar Emprestimo', 'active'=>'emprestimos'));
            });

            // Edit
            \Router::route('emprestimos/editar', function(){
                $this->view = new \Views\MainView('emprestimos/editar');
                $this->view->render(array('title'=>'Editar Emprestimo', 'active'=>'emprestimos'));
            });

            // Delete
            \Router::route('emprestimos/devolucao', function(){
                $this->view = new \Views\MainView('emprestimos/devolucao');
                $this->view->render(array('title'=>'Devolucao', 'active'=>'emprestimos'));
            });

            // Look All
            \Router::route('emprestimos', function(){
                $this->view = new \Views\MainView('emprestimos');
                $this->view->render(array('title'=>'Ver Emprestimo', 'active'=>'emprestimos'));
            });
        }

    }