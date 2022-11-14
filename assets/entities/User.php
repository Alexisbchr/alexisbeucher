<?php

class User
{
    private int $id;
    
    private string $username;

    private string $password;

    private tinyint $superadmin;


    /**
     * @param string $username
     * @param string $password
     * @param tinyint $superadmin
     */
    public function __construct(int $id, string $username, string $password, tinyint $superadmin )
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
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
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): string
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassWord(string $password): string
    {
        $this->password = $password;
    }
    
}