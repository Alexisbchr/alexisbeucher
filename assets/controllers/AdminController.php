<?php

    class AdminController extends AbstractController
    {

        public function index()
        {
            if(isset($_SESSION['user']) && $_SESSION['user'] !== null){
                $page = "home";
                $pageName = "Administration";
                require "./assets/views/admin/layout.phtml";
            }
            else{
                header('Location: login');
                exit;
            }
            
        }

        public function addWorks()
        {
            if(isset($_SESSION['user']) && $_SESSION['user'] !== null)
            {
                
                $page = "addworks";
                var_dump($page);
                $pageName = "Works add";
                require "./assets/views/admin/layout.phtml";

                require './assets/managers/WorksManager.php';
                $worksManager = new WorksManager;
                $allWorks = $worksManager->getAllWorks();
                include "./assets/views/admin/includes/_allworks.phtml";
            }
            else{
                header('Location: login');
                exit;
            }
            
        }
    }