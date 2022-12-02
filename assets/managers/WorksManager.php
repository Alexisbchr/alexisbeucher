<?php

class WorksManager extends AbstractManager
{
    public function getAllWorks() : array
	{
        $db=$this->db;
        $query = $db->prepare('SELECT * FROM works');
        $query->execute();
        $allWorks = $query->fetchAll(PDO::FETCH_ASSOC);
        return $allWorks;
	}
    public function getWorkById(int $id) : array
	{
        $db=$this->db;
        $query = $db->prepare('SELECT works.*,category_works.category_name FROM works INNER JOIN category_works
        ON works.category_id=category_works.id WHERE works.id=:id');
        $parameters = [
        'id' => $id
        ];
        $query->execute($parameters);
        $work = $query->fetchAll(PDO::FETCH_ASSOC);
        return $work;
	}
    public function addWorks(string $name, string $customer, string $languages, string $website, string $category_id, string $description) : void
    {
        $db=$this->db;
        $query = $db->prepare('INSERT INTO works (name, customer, languages, website, category_id, description)
            VALUES (:name , :customer, :languages, :website, :category_id, :description)');
        $parameters = [
            'name' => $name,
            'customer' => $customer,
            'languages' => $languages,
            'website' => $website,
            'category_id' => $category_id,
            'description' => $description
        ];
        $query->execute($parameters);
        return;
    }
    public function editWorks(int $id, string $name, string $customer, string $languages, string $website, string $category_id, string $description) : void
    {
        $db=$this->db;
        $query = $db->prepare('UPDATE works SET id=:id, name=:name, customer=:customer, languages=:languages, website=:website, category_id=:category_id, description=:description WHERE id=:id');
        $parameters = [
            'id' => $id,
            'name' => $name,
            'customer' => $customer,
            'languages' => $languages,
            'website' => $website,
            'category_id' => $category_id,
            'description' => $description
        ];
        $query->execute($parameters);
        return;
    }

    public function deleteWorkById(int $id): void
	{
        var_dump($id);
		$db=$this->db;
		$query = $db->prepare('DELETE FROM works WHERE id=:id');
		$parameters = [
			'id' => $id
		];
		$query->execute($parameters);
        
	}
}