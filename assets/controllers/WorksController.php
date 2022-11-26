<?php

    class WorksController extends AbstractController
    {
        public function index()
        {
            $page = "works_index";
            $pageName = "Works";
            require "./assets/views/layout.phtml";

            require './assets/managers/WorksManager.php';
            $worksManager = new WorksManager;
            $allWorks = $worksManager->getAllWorks();
            include "./assets/views/includes/_allworks.phtml";
        }

        public function show(int $id)
        {
            $page = "works_show";
            $pageName = "Works Article";
            require "./assets/views/layout.phtml";
        }
        
        public function addWorks()
        {
            $page = "works_index";
            $pageName = "Works";
            require "./assets/views/layout.phtml";

            require './assets/managers/WorksManager.php';
            $worksManager = new WorksManager;
            $allWorks = $worksManager->getAllWorks();
            include "./assets/views/includes/_allworks.phtml";
        }
    }