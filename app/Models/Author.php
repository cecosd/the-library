<?php

namespace App\Models;

class Author {

    protected $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
    
    public function setName(string $name): string
    {
        $this->name = $name;
    }

}