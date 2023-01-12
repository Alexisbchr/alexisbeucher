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

    }