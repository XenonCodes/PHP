<?php

class User
{
    private int $id;
    private string $name;
    private string $userName;

    public function __construct(string $userName)
    {
        $this->userName = $userName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;
        return $this;
    }
}
