<?php

    class BlogController extends AbstractController
    {
        public function index()
        {
            $page = "blog_index";
            $pageName = "blog";

            require './assets/managers/BlogManager.php';
            $blogManager = new BlogManager;
            $articles = $blogManager->getAllArticles();
            $lastNews = $this->lastnews();//On appelle la fonction qui récuperera les news aupres du manager
            $lastWorks = $this->lastworks();//On appelle la fonction qui récuperera les projets aupres du manager
            require "./assets/views/layout.phtml";

        }

        public function show(int $id)
        {
            
            $page = "blog_show";
            $pageName = "blog article";

            require './assets/managers/BlogManager.php';
            $blogManager = new BlogManager;
            $articles = $blogManager->getArticlesById($id);
            
            require "./assets/views/layout.phtml";
        }

        public function singlearticle(int $id)
        {
            if(isset($_SESSION['user']) && $_SESSION['user'] !== null){

                $page = "singlearticle";
                $pageName = "blog article";

                require './assets/managers/BlogManager.php';
                $blogManager = new BlogManager;
                $articles = $blogManager->getArticlesById($id);
                        
                $lastNews = $this->lastnews();//On appelle la fonction qui récuperera les news aupres du manager
                $lastWorks = $this->lastworks();//On appelle la fonction qui récuperera les projets aupres du manager
                require "./assets/views/admin/layout.phtml";

            }
            else
            {

                header('Location: login');
                exit;

            }
        }
        public function allarticles()
        {

            if(isset($_SESSION['user']) && $_SESSION['user'] !== null){

                $page = "blog_index";
                $pageName = "Administration";
                
                require './assets/managers/BlogManager.php';
                $blogManager = new BlogManager;
                $allArticles = $blogManager->getAllArticles();
                require "./assets/views/admin/layout.phtml";
            }
            else{

                header('Location: login');
                exit;

            }
            
        }

        public function addarticles()
        {

            if(isset($_SESSION['user']) && $_SESSION['user'] !== null)
            {
                
                $page = "addarticles";
                $pageName = "Ajouter un projet";

                if (
    
                    isset($_POST['title']) && !empty($_POST['title'])
                    && isset($_POST['content']) && !empty($_POST['content'])
                    && isset($_POST['timestamp']) && !empty($_POST['timestamp'])
                    && isset($_FILES['image']) && $_FILES['image']['size'] != 0
                    && isset($_POST['alt']) && !empty($_POST['alt'])

    
                )
                {
                    $title = $this->clean_input($_POST["title"]);
                    $content = $this->clean_input($_POST["content"]);
                    $timestamp = $this->clean_input($_POST["timestamp"]);
                    $file_name = $this->clean_input($_FILES["image"]['name']);
                    $alt = $this->clean_input($_POST["alt"]);

                    require './assets/managers/BlogManager.php';
                    $blogManager = new BlogManager;
                    $uploader = new FileUploader();
                    $images = $uploader->upload($_FILES['image']);
                    $imageArticleId = $blogManager->addImageArticles($images->getFileName(), $images->getUrl(), $alt);
                    $articles = $blogManager->addArticles($title, $content, $timestamp, $imageArticleId);
                    header('Location: /admin/blog');
                    exit();  
                }
                
                require "./assets/views/admin/layout.phtml";

            }
            else{

                header('Location: login');
                exit;

            }
            
        }

        public function editarticles($id)
        {

            if(isset($_SESSION['user']) && $_SESSION['user'] !== null)
            {
                
                $page = "editarticles";
                $pageName = "Editer un article";

                require_once './assets/managers/BlogManager.php';
                $blogManager = new BlogManager;
                $articles = $blogManager->getArticlesById($id);

                if (

                    isset($_POST['id']) && !empty($_POST['id'])
                    && isset($_POST['title']) && !empty($_POST['title'])
                    && isset($_POST['content']) && !empty($_POST['content'])
                    && isset($_POST['timestamp']) && !empty($_POST['timestamp'])
                    && isset($_FILES['image']) && $_FILES['image']['size'] != 0
                    && isset($_POST['alt']) && !empty($_POST['alt'])

    
                )
                {
                    $inputId = $this->clean_input($_POST["id"]);
				    $id = intval($inputId);
                    $title = $this->clean_input($_POST["title"]);
                    $content = $this->clean_input($_POST["content"]);
                    $timestamp = $this->clean_input($_POST["timestamp"]);
    
                    require_once './assets/managers/BlogManager.php';
                    $blogManager = new BlogManager;
                    $article = $blogManager->editArticles($id, $title, $content, $timestamp);
                    exit();
                }
                
                require "/assets/views/admin/layout.phtml";

            }
            else{

                header('Location: login');
                exit;

            }
            
        }

        public function deletearticles($id)
        {

            if(isset($_SESSION['user']) && $_SESSION['user'] !== null)
            {

                $page = "deletearticle";
                $pageName = "Supprimer un projet";
                require "./assets/views/admin/layout.phtml";
                
                require './assets/managers/BlogManager.php';
                $blogManager = new BlogManager;
                $article = $blogManager->deleteArticleById($id);
                

            }
            else{

                header('Location: login');
                exit;

            }
            
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