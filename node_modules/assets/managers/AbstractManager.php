<?php
abstract class AbstractManager
{
    protected PDO $db;

    // fonction qui initialise la connexion à la DB
    function __construct()
    {
        $this->db = new PDO(
        	
        'mysql:host=145.14.156.129;port=3306;dbname=u350390533_alexisbeucher;charset=utf8',
        'u350390533_alexis',
        'AccesDB12*'
		);
    }

    // getter de la DB
    protected function getDb()
    {
        return $this->db;
    }
}

// 'mysql:host=u350390533_alexisbeucher;port=3306;dbname=alexisbeucher;charset=utf8',
// 'u350390533_alexis',
// 'AccesDB12*'
// 'mysql:host=localhost;port=3306;dbname=alexisbeucher;charset=utf8',
// 'root',
// ''