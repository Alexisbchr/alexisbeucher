<?php
require './src/entities/Images.php';

class ImagesController extends AbstractController
{

    public function addimage()
    {
      if(isset($_SESSION['user']) && $_SESSION['user'] !== null){
        $page = "addimage";
        $pageName = "Ajouter une photo";
        require_once './src/managers/ImagesManager.php';

        $imagesManager = new ImagesManager;
        $image = $imagesManager->addimage();
        require_once "./src/templates/admin/admlayout.phtml";
      }
      else{
       header('Location: /BelleEpoque/login');
       exit;
      }
    }
}