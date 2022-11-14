<?php
abstract class AbstractManager
{
    protected PDO $db;

    // fonction qui initialise la connexion à la DB
    function __construct()
    {
        $this->db = new PDO(
        	'mysql:host=localhost;port=3306;dbname=alexisbeucher;charset=utf8',
			'root',
			''
		);
    }

    // getter de la DB
    protected function getDb()
    {
        return $this->db;
    }
}

?>