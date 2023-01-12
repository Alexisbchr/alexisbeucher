<?php

require './assets/entities/User.php';

class UserManager extends AbstractManager
{
    public function getUserByUsername(string $username)
    {
        $db=$this->db;
        $query = $db->prepare("SELECT * FROM user WHERE username=:username");
        $parameters = [
            'username' => $username
        ];
        $query->execute($parameters);
        $userArray = $query->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($userArray))
        {
            $userArray = new User($userArray[0]['id'], $userArray[0]['username'],
            $userArray[0]['password']);
            return $userArray;
        }
        else
        {
            header('Location: login');
        }
    }
  }

