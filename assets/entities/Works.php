<?php

class Works
{
    private int $id;
    private string $name;
    private string $customer;
    private string $languages;
    private string $website;
    private string $category_id;
    private string $description;


    /**
     * @param int $id;
     * @param string $name;
     * @param string $customer;
     * @param string $languages;
     * @param string $website;
     * @param int $category_id;
     * @param string $description;
     */
    
    public function __construct(int $id, string $name, string $customer, string $languages, string $website, int $category_id, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->customer = $customer;
        $this->languages = $languages;
        $this->website = $website;
        $this->category_id = $category_id;
        $this->description = $description;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): string
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLanguages(): string
    {
        return $this->languages;
    }

    /**
     * @param string $languages
     */
    public function setLanguages(string $languages): string
    {
        $this->languages = $languages;
    }
        /**
     * @return string
     */
    public function getCustomer(): string
    {
        return $this->customer;
    }

    /**
     * @param string $customer
     */
    public function setCustomer(string $customer): string
    {
        $this->customer = $customer;
    }

    /**
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * @param string $website
     */
    public function setWebsite(string $website): string
    {
        $this->website = $website;
    }

    /**
        * @return string
    */

    public function getCategory_id(): int
    {
        return $this->category_id;
    }

    /**
     * @param string $category_id
     */
    public function setCategory_id(int $category_id): int
    {
        $this->category_id = $category_id;
    }

    /**
     * @return int
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param int $description
     */
    public function setDescription(int $id): string
    {
        $this->description = $description;
    }
}