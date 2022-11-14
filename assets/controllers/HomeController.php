<?php

class HomeController extends AbstractController
{
    public function index()
    {
        $page = "home";
        $pageName = "Accueil";
        require "./assets/views/layout.phtml";
    }
}