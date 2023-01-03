<?php

class ContactController extends AbstractController
{
    public function index()
    {
        $page = "contact";
        $pageName = "Contact";
        $lastNews = $this->lastnews();//On appelle la fonction qui récuperera les news aupres du manager
        $lastWorks = $this->lastworks();//On appelle la fonction qui récuperera les projets aupres du manager
        require "./assets/views/layout.phtml";
        if (isset($_POST['message'],($_POST['text']))) {
            $retour = mail('contact@alexisbeucher.fr', 'Envoi depuis la page Contact', $_POST['message'], $_POST['text'], 
            'From: contact@alexisbeucher.fr' . "\r\n" . 'Reply-to: ' . $_POST['email']);
            if($retour){
                echo '<h2>Message envoyé!</h2>';
            }
    }
    }
    public function postcontact()
    {
        $page = "post_contact";
        $pageName = "Mail Envoyé";

        // récupéré le post de contact
        
            $message = $_POST['message'];
            $email = $_POST['email'];
            $name = $_POST['name'];
            $headers = 'FROM : alexis.beucher01@gmail.com';
            mail('alexis.beucher01@gmail.com', 'Formulaire de contact', $message, $headers);
            
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