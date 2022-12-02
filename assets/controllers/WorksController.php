<?php

    class WorksController extends AbstractController
    {
        public function index()
        {
            $page = "works_index";
            $pageName = "Works";
            require './assets/managers/WorksManager.php';
            $worksManager = new WorksManager;
            $allWorks = $worksManager->getAllWorks();
            
            require "./assets/views/layout.phtml";

        }

        public function show(int $id)
        {
            $page = "works_show";
            $pageName = "Works Article";
            
            require './assets/managers/WorksManager.php';
            $worksManager = new WorksManager;
            $work = $worksManager->getWorkById($id);
            require "./assets/views/layout.phtml";
            
        }
        
    }