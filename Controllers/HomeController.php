<?php

    namespace Controllers;

    class HomeController extends Controller{

        public function __construct(){
            $this->view = new \Views\MainView('home');
        }

        public function execute(){
            $this->view->render(array('title'=>'Inicio', 'active'=>'home'));
        }

    }