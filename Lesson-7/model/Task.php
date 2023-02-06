<?php

class Task
{
    private int $id;
    private string $description; 
    private bool $isDone;  

    public function __construct(string $description = "Нет описания", bool $isDone = false)
    {
        $this->description = $description;
        $this->isDone = $isDone;
    }
    
    public function setDescription(string $newDescription): void
    {
        $this->description = $newDescription;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getIsDone(): bool
    {
        return $this->isDone;
    }

    public function markAsDone(): void 
    {
        $this->isDone = !$this->isDone;
    }
} 