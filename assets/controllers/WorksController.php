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
        
        public function allworks()
        {

            if(isset($_SESSION['user']) && $_SESSION['user'] !== null){

                $page = "works_index";
                $pageName = "Administration";
                
                require './assets/managers/WorksManager.php';
                $worksManager = new WorksManager;
                $allWorks = $worksManager->getAllWorks();
                require "./assets/views/admin/layout.phtml";
                require "./assets/views/includes/_adm-allworks.phtml";
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
                $pageName = "Ajouter un projet";

                if (
    
                    isset($_POST['name']) && !empty($_POST['name'])
                    && isset($_POST['customer']) && !empty($_POST['customer'])
                    && isset($_POST['languages']) && !empty($_POST['languages'])
                    && isset($_POST['website']) && !empty($_POST['website'])
                    && isset($_POST['category_id']) && !empty($_POST['category_id'])
                    && isset($_POST['description']) && !empty($_POST['description'])
                    && isset($_FILES['image']) && $_FILES['image']['size'] != 0
                    && isset($_POST['alt']) && !empty($_POST['alt'])
                    && isset($_POST['realisation']) && !empty($_POST['realisation'])
                    && isset($_POST['information']) && !empty($_POST['information'])

    
                )
                {
                    $name = $this->clean_input($_POST["name"]);
                    $customer = $this->clean_input($_POST["customer"]);
                    $languages = $this->clean_input($_POST["languages"]);
                    $website = $this->clean_input($_POST["website"]);
                    $category_id = $this->clean_input($_POST["category_id"]);
                    $description = $this->clean_input($_POST["description"]);
                    $file_name = $this->clean_input($_FILES["image"]['name']);
                    $file_name = $this->clean_input($_POST["name"]);
                    $alt = $this->clean_input($_POST["alt"]);
                    $realisation = $this->clean_input($_POST["realisation"]);
                    $information = $this->clean_input($_POST["information"]);

                    require './assets/managers/WorksManager.php';
                    $worksManager = new WorksManager;
                    $uploader = new FileUploader();
                    $images = $uploader->upload($_FILES['image']);
                    $imageWorkId = $worksManager->addImageWorks($images->getFileName(), "/".$images->getUrl(), $alt);
                    $work = $worksManager->addWorks($name, $customer, $languages, $website, $category_id, $description, $imageWorkId, $realisation, $information);
                    header('Location: /admin/works');
                    exit();  
                }
                
                require "./assets/views/admin/layout.phtml";

            }
            else{

                header('Location: login');
                exit;

            }
            
        }

        public function editWorks($id)
        {

            if(isset($_SESSION['user']) && $_SESSION['user'] !== null)
            {
                
                $page = "editworks";
                $pageName = "Editer un projet";

                require_once './assets/managers/WorksManager.php';
                $worksManager = new WorksManager;
                $work = $worksManager->getWorkById($id);

                if (

                    isset($_POST['id']) && !empty($_POST['id'])
                    && isset($_POST['name']) && !empty($_POST['name'])
                    && isset($_POST['customer']) && !empty($_POST['customer'])
                    && isset($_POST['languages']) && !empty($_POST['languages'])
                    && isset($_POST['website']) && !empty($_POST['website'])
                    && isset($_POST['category_id']) && !empty($_POST['category_id'])
                    && isset($_POST['description']) && !empty($_POST['description'])
                    && isset($_POST['realisation']) && !empty($_POST['realisation'])
                    && isset($_POST['information']) && !empty($_POST['information'])
    
                )
                {
                    $inputId = $this->clean_input($_POST["id"]);
				    $id = intval($inputId);
                    $name = $this->clean_input($_POST["name"]);
                    $customer = $this->clean_input($_POST["customer"]);
                    $languages = $this->clean_input($_POST["languages"]);
                    $website = $this->clean_input($_POST["website"]);
                    $category_id = $this->clean_input($_POST["category_id"]);
                    $description = $this->clean_input($_POST["description"]);
                    $realisation = $this->clean_input($_POST["realisation"]);
                    $information = $this->clean_input($_POST["information"]);
    
                    require_once './assets/managers/WorksManager.php';
                    $worksManager = new WorksManager;
                    $work = $worksManager->editWorks($id, $name, $customer, $languages, $website, $category_id, $description, $realisation, $information);
                    exit();
                }
                
                require "./assets/views/admin/layout.phtml";

            }
            else{

                header('Location: login');
                exit;

            }
            
        }

        public function deleteworks($id)
        {

            if(isset($_SESSION['user']) && $_SESSION['user'] !== null)
            {

                $page = "deleteworks";
                $pageName = "Supprimer un projet";
                require "./assets/views/admin/layout.phtml";
                
                require './assets/managers/WorksManager.php';
                $worksManager = new WorksManager;
                $work = $worksManager->deleteWorkById($id);
                

            }
            else{

                header('Location: login');
                exit;

            }
            
        }
    }