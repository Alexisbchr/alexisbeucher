<?php

class ContactController extends AbstractController
{
    public function index()
    {
        $page = "contact";
        $pageName = "Contact";
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
}