<?php

class Blog
{
    private int $id;
    private string $title;
    private string $content;
    private string $timestamp;


    /**
     * @param int $id
     * @param string $title
     * @param string $content
     * @param string $timestamp
     */
    
    public function __construct(int $id, string $title, string $content, string $timestamp)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->timestamp = $timestamp;
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
    public function setId(int $id): int
    {
        $this->id = $id;
    }
    

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): string
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): string
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    /**
     * @param string $content
     */
    public function setTimestamp(string $timestamp): string
    {
        $this->timestamp = $timestamp;
    }

    
    
}