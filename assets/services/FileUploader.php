<?php

/**
 * File Uploader class used for media upload
 * @author Mari Doucet
 * @author Elefranc1
*/

require "./assets/entities/Images.php";

class FileUploader
{
    private string $uploadRepo = "/assets/uploads/";
    private array $allowedFileTypes = ["png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP"];
    private int $maxFileSize = 2000000; // 2 Mo
    
    public function setUploadRepo(string $uploadRepo) : self
    {
        $this->uploadRepo = $uploadRepo;
        return $this;
    }
    
    private function generateFileName() : string
    {
        $randomString = bin2hex(random_bytes(10)); // random string, 20 characters a-z 0-9
        
        return $randomString;
    }
    
    private function checkFileSize(int $fileSize) : bool
    {
        $uploadOk = 1;
        // vérifier que le fichier n'est pas trop gros
        if ($fileSize > $this->maxFileSize) {
        $uploadOk = 0;
    }
    
    return $uploadOk;
    }
    
    private function checkFileType(string $filename) : bool
    {
        $uploadOk = 1;
        // vérifier que le type est bien l'un des types autorisés
        $allowed = array('png', 'jpg', 'webp');
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($extension, $this->allowedFileTypes)) {
              $uploadOk = 0;
        }
        return $uploadOk;
    }
    
    public function upload(array $file) : ?Images
    {
        //checking the file type
        $typeOk=$this->checkFileType($file['name']);
        // checking the file size
        $sizeOk=$this->checkFileSize($file['size']);
        if ($typeOk && $sizeOk)
        {
            $originalName = $file["name"];
            $fileName = $this->generateFileName();
            $fileType = pathinfo($originalName)["extension"];
            $moveUploadedFileUrl = getcwd() . $this->uploadRepo . $fileName . ".". $fileType;
            move_uploaded_file($file["tmp_name"], $moveUploadedFileUrl);
            
            $url = $this->uploadRepo . $fileName . ".". $fileType;
            
            return new Images($fileName, $url, "");
        }
        else
        {
            return null;
        }
    }
}                                
   