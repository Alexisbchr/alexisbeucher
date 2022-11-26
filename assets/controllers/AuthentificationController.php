<?php

    class AuthentificationController extends AbstractController
    {

        public function login()
        {
            $page = "login";
            $pageName = "Connexion";
            require "./assets/views/layout.phtml";
        }

        public function logincheck()
        {
      
            $page = "logincheck";
            $pageName = "LoginCheck";
            require "./assets/managers/UserManager.php";

            $usernameInput = $_POST['username'];
            $passwordInput = $_POST['password'];

            $username = $this->clean_input($_POST["username"]);
            $password = $this->clean_input($_POST["password"]);
            $password = sha1($_POST['password']);

            $userManager = new UserManager($username);
            $user = $userManager->getUserByUsername($username);
            if ($password === $user->getPassword() && $password !== null)
            {
                $_SESSION['user'] = $user;
                header('Location: admin');
            }
            else{
                header('Location: login');
                exit;
            }
            require "./assets/views/layout.phtml";
        }

        public function logout()
        {
          if(isset($_SESSION['user']) && $_SESSION['user'] !== null){
            $page = "logout";
            $pageName = "Déconnexion";
            header('Location: login');
            exit;
          }
          else{
           header('Location: login');
           exit;
          }
        }
    }