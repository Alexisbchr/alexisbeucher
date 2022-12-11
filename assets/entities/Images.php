<?php

class Images
{
    private int $id;
    private string $file_name;
    private string $url;
    private string $alt;

    /**
     * @param int $id
     * @param string $file_name
     * @param string $url
     * @param string $alt
     */
    
    public function __construct(string $file_name, string $url, string $alt)
    {
        $this->file_name = $file_name;
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