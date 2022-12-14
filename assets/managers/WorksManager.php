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
        $query = $db->prepare('SELECT works.*,category_works.category_name FROM works JOIN category_works
        ON works.category_id=category_works.id WHERE works.id=:id');
        $parameters = [
        'id' => $id
        ];
        $query->execute($parameters);
        $work = $query->fetchAll(PDO::FETCH_ASSOC);
        return $work;
	} 
    public function getUrlByImageId(int $image_id) : string
	{
        $db=$this->db;
        $query = $db->prepare('SELECT url FROM image_works WHERE image_works.id=:image_id');
        $parameters = [
        'image_id' => $image_id
        ];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $url = $result['url'];
        return $url;
	}
    public function getAltByImageId(int $image_id) : string
	{
        $db=$this->db;
        $query = $db->prepare('SELECT alt FROM image_works WHERE image_works.id=:image_id');
        $parameters = [
        'image_id' => $image_id
        ];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $alt = $result['alt'];
        return $alt;
	}
    public function getCategoryByImageId(int $image_id) : string
	{
        $db=$this->db;
        $query = $db->prepare('SELECT category_name FROM category_works WHERE image_works.id=:image_id');
        $parameters = [
        'image_id' => $image_id
        ];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        // var_dump($result);
        $category = $result['category_name'];
        return $category;
	}
    
    public function addWorks(string $name, string $customer, string $languages, string $website, 
        string $category_id, string $description, int $imageWorkId, string $realisation, string $information) : void
    {
        $db=$this->db;
        $query = $db->prepare('INSERT INTO works (name, customer, languages, website, category_id, description, image_id, realisation, information)
            VALUES (:name , :customer, :languages, :website, :category_id, :description, :imageWorkId, :realisation, :information)');
        $parameters = [
            'name' => $name,
            'customer' => $customer,
            'languages' => $languages,
            'website' => $website,
            'category_id' => $category_id,
            'description' => $description,
            'imageWorkId' => $imageWorkId,
            'realisation' => $realisation,
            'information' => $information
        ];
        $query->execute($parameters);
        return;
    }

    public function addImageWorks(string $file_name,string $url,string $alt) : ?int
    {
        $db=$this->db;
        $query = $db->prepare('INSERT INTO image_works (file_name, url, alt)
            VALUES (:file_name , :url, :alt)');
        $parameters = [
            'file_name' => $file_name,
            'url' => $url,
            'alt' => $alt
        ];
        $query->execute($parameters);
        // on récupère l'id insérée
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function editWorks(int $id, string $name, string $customer, string $languages, 
        string $website, string $category_id, string $description, string $realisation, string $information) : void
    {
        $db=$this->db;
        $query = $db->prepare('UPDATE works SET id=:id, name=:name, customer=:customer, languages=:languages, website=:website, category_id=:category_id, description=:description, realisation=:realisation, information=:information WHERE id=:id');
        $parameters = [
            'id' => $id,
            'name' => $name,
            'customer' => $customer,
            'languages' => $languages,
            'website' => $website,
            'category_id' => $category_id,
            'description' => $description,
            'realisation' => $realisation,
            'information' => $information,
        ];
        $query->execute($parameters);
        return;
    }

    public function deleteWorkById(int $id): void
	{
		$db=$this->db;
		$query = $db->prepare('DELETE FROM works WHERE id=:id');
		$parameters = [
			'id' => $id
		];
		$query->execute($parameters);
        
	}
}