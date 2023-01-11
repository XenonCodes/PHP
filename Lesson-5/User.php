<?php

class User 
{
    private string $userName;
    private string $email;
    private ?string $sex;
    private ?int $age;
    private bool $isActive = true;
    private DateTime $dateCreated;

    public function __construct(string $userName, string $email, ?int $age = null, ?string $sex = null)
    {
        $this->userName = $userName;
        $this->email = $email;
        $this->age = $age;
        $this->sex = $sex;

        $this->dateCreated = new DateTime();
    }

    //---------------------SET------------------------------
    public function setAge(?int $age): void
    {
        $this->age = $this->getValidAge($age);
    }

    public function setSex(?string $str): void 
    {
        $this->sex = $this->getValidSex($str);
    }

    //---------------------GET------------------------------
    public function getUserName():string 
    {
        return $this->userName;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function getSex():string 
    {
        return $this->sex;
    }

    private function getValidSex(?string $sex): ?string
    {
        if ($sex == "man" || $sex == "girl") {
            return $sex;
        }
        return null;
    }

    private function getValidAge(?int $age): ?int
    {
        if ($age > 0 && $age <= 125) {
            return $age;
        }
        return null;
    }
}