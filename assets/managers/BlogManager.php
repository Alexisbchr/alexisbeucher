<?php

class BlogManager extends AbstractManager
{
    public function getAllArticles() : array
	{
        $db=$this->db;
        $query = $db->prepare('SELECT * FROM blog');
        $query->execute();
        $articles = $query->fetchAll(PDO::FETCH_ASSOC);
        return $articles;
	}
    public function getArticlesById(int $id) : array
	{
        $db=$this->db;
        $query = $db->prepare('SELECT * FROM blog WHERE blog.id=:id');
        $parameters = [
        'id' => $id
        ];
        $query->execute($parameters);
        $articles = $query->fetchAll(PDO::FETCH_ASSOC);
        return $articles;
	} 
    public function getUrlByImageId(int $image_id) : string
	{
        $db=$this->db;
        $query = $db->prepare('SELECT url FROM image_blog WHERE image_blog.id=:image_id');
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
        $query = $db->prepare('SELECT alt FROM image_blog WHERE image_blog.id=:image_id');
        $parameters = [
        'image_id' => $image_id
        ];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $alt = $result['alt'];
        return $alt;
	}
    public function addArticles(string $title, string $content, string $timestamp, int $imageArticleId) : void
    {
        $db=$this->db;
        $query = $db->prepare('INSERT INTO blog (title, content, timestamp, image_id)
            VALUES (:title, :content, :timestamp, :imageArticleId)');
        $parameters = [
            'title' => $title,
            'content' => $content,
            'timestamp' => $timestamp,
            'imageArticleId' => $imageArticleId
        ];
        $query->execute($parameters);
        return;
    }
    public function addImageArticles(string $file_name,string $url,string $alt) : ?int
    {
        $db=$this->db;
        $query = $db->prepare('INSERT INTO image_blog (file_name, url, alt)
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
    public function editArticle(string $title, string $content, string $timestamp) : void
    {
        $db=$this->db;
        $query = $db->prepare('UPDATE blog SET id=:id, title=:title, content=:content, timestamp=:timestamp WHERE id=:id');
        $parameters = [
            'title' => $title,
            'content' => $content,
            'timestamp' => $timestamp
        ];
        $query->execute($parameters);
        return;
    }
    public function deleteArticleById(int $id): void
	{
		$db=$this->db;
		$query = $db->prepare('DELETE FROM blog WHERE id=:id');
		$parameters = [
			'id' => $id
		];
		$query->execute($parameters);
        
	}
}