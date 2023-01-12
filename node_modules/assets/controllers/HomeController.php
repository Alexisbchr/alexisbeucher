<?php

class HomeController extends AbstractController
{
    public function index()
    {
        $page = "home";
        $pageName = "Accueil";
        $lastNews = $this->lastnews();//On appelle la fonction qui récuperera les news aupres du manager
        $lastWorks = $this->lastworks();//On appelle la fonction qui récuperera les projets aupres du manager
        require "./assets/views/layout.phtml";
    }

    private function lastnews()
    {
        require_once './assets/managers/BlogManager.php';
        $blogManager = new BlogManager;
        $lastNews = $blogManager->getLastNews();
        return $lastNews; // On renvoi les valeurs pour que index() puissent les utiliser
    }

    private function lastworks()
    {
        require_once './assets/managers/WorksManager.php';
        $worksManager = new WorksManager;
        $lastWorks = $worksManager->getLastWorks();
        return $lastWorks; // On renvoi les valeurs pour que index() puissent les utiliser
    }
}