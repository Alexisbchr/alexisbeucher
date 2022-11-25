<?php

class WorksManager extends AbstractManager
{
    public function getAllWorks() : array
	{
        $db=$this->db;
        $query = $db->prepare('SELECT * FROM works');
        $query->execute();
        $allWorks= $query->fetchAll(PDO::FETCH_ASSOC);
        return $allWorks;
	}
}