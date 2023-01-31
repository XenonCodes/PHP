<?php

class Task
{
    private string $description; 
    private bool $isDone = false;  

    public function __construct(string $description = "Нет описания")
    {
        $this->description = $description;
    }
    
    public function setDescription(string $newDescription): void
    {
        $this->description = $newDescription;
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