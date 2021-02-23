<?php
namespace MonthlyBasis\Poem\Model\Entity;

use DateTime;
use MonthlyBasis\Poem\Model\Entity as PoemEntity;

class Poem
{
    protected $body;
    protected $created;
    protected $poemId;
    protected $title;
    protected $userId;
    protected $views;

    public function getBody(): string
    {
        return $this->body;
    }

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function getPoemId(): int
    {
        return $this->poemId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getViews(): int
    {
        return $this->views;
    }

    public function setBody(string $body): PoemEntity\Poem
    {
        $this->body = $body;
        return $this;
    }

    public function setCreated(DateTime $created): PoemEntity\Poem
    {
        $this->created = $created;
        return $this;
    }

    public function setPoemId(int $poemId): PoemEntity\Poem
    {
        $this->poemId = $poemId;
        return $this;
    }

    public function setTitle(string $title): PoemEntity\Poem
    {
        $this->title = $title;
        return $this;
    }

    public function setUserId(int $userId): PoemEntity\Poem
    {
        $this->userId = $userId;
        return $this;
    }

    public function setViews(int $views): PoemEntity\Poem
    {
        $this->views = $views;
        return $this;
    }
}
