<?php

class Images
{
    private int $id;
    private string $name;
    private string $file_name;
    private string $file_type;
    private string $url;
    private string $alt;

    /**
     * @param int $id
     * @param string $name
     * @param string $file_name
     * @param string $file_type
     * @param string $url
     * @param string $alt
     */
    
    public function __construct(int $id, string $name, string $file_name, string $file_type, string $url, string $alt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->file_name = $file_name;
        $this->file_type = $file_type;
        $this->url = $url;
        $this->alt = $alt;
    
    }
    
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->file_name;
    }

    /**
     * @param string $file_name
     */
    public function setFileName(string $file_name): void
    {
        $this->file_name = $file_name;
    }
    
        /**
     * @return string
     */
    public function getFileType(): string
    {
        return $this->file_type;
    }

    /**
     * @param string $file_type
     */
    public function setFiletype(string $file_type): void
    {
        $this->file_type = $file_type;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
    /**
     * @return string
     */
    public function getAlt(): string
    {
        return $this->alt;
    }

    /**
     * @param string $alt
     */
    public function setAlt(string $alt): void
    {
        $this->alt = $alt;
    }
}