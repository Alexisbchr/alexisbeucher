<?php

class ContactController extends AbstractController
{
    public function index()
    {
        $page = "contact";
        $pageName = "Contact";
        require "./assets/views/layout.phtml";
    }
}