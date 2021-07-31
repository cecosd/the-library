<?php

namespace App\Models;

use App\Models\Author;

class Book {

    protected $name;
    protected $author;

    public function __construct(string $name, Author $author) {
        $this->name = $name;
        $this->author = $author;
    }

    public function getName(): string
    {
        return $this->name;
    }
    
    public function setName(string $name): string
    {
        $this->name = $name;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }
    
    public function setAuthor(Author $author): Author
    {
        $this->author = $author;
    }

}