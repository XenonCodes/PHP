<?php

//1)Разработайте класс Task, выполняющий ответственность обычной задачи Todo-списка. Класс должен содержать приватные свойства description, dateCreated, dateUpdated, dateDone, priority (int), isDone (bool) и обязательное user (User). В качества класса пользователя воспользуйтесь разработанным на уроке. Класс Task должен содержать все необходимые для взаимодействия со свойствами методы (getters, setters). При вызове метода setDescription обновляйте значение свойства dateUpdated. Разработайте метод markAsDone, помечающий задачу выполненной, а также обновляющий свойства dateUpdated и dateDone.

class Task
{
    private string $description; //описание GET|SET
    private DateTime $dateCreated;  //дата создания GET
    private DateTime $dateUpdated;  //дата обновления GET
    private ?DateTime $dateDone = NULL;  //дата завершения GET
    private int $priority;  //приоритет GET|SET
    private bool $isDone = false;  //сделано? GET
    private User $user;  //пользователь GET
    private array $comments = []; //коментарии SET|GET

    public function __construct(User $user, string $description = "Нет описания", int $priority = 3)
    {
        $this->description = $description;
        $this->priority = $priority;
        $this->user = $user;

        $this->dateCreated = new DateTime();
        $this->dateUpdated = new DateTime();
    }

    public function markAsDone(): void //отметьте как Выполненное
    {
        $this->dateUpdated = new DateTime();
        $this->dateDone = new DateTime();
        $this->isDone = !$this->isDone;

    }
//-------------------SET----------------------------------
    public function setDescription(string $newDescription): void
    {
        $this->dateUpdated = new DateTime();
        $this->description = $newDescription;
    }

    public function setPriority(int $newPriority): void
    {
        $this->priority = $newPriority;
    }

    public function setComment(Comment $newComment): void
    {
        $this->comments[] = $newComment;
    }
//---------------------GET------------------------------
    public function getDate(string $dateEvent): ?string
    {
        if(is_null($this->$dateEvent))
        {
            return NULL;
        }
        return $this->$dateEvent->format('d.m.Y H:i:s');
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getIsDone(): bool
    {
        return $this->isDone;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function getComments(): array
    {
        return $this->comments;
    }
} 