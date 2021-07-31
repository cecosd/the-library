<?php

namespace App\Utils;

class XmlBooksParser {

    protected $result = [];
    protected $files = [];

    public function __construct($files) {
        $this->files = $files;
    }

    public function parseFiles() {

        foreach($this->files as $file) {

            $xml = simplexml_load_file($file) or die("Error: Cannot create object");
        
            if(isset($xml->book)) {
        
                foreach($xml->book as $xmlBookObj) {
        
                    $author = new \App\Models\Author(preg_replace('/[\t\n]+/', '', $xmlBookObj->author));
                    $book = new \App\Models\Book(preg_replace('/[\t\n]+/', '', $xmlBookObj->name), $author);
        
                    if(!isset($this->result[$author->getName()])) {
                        $this->result[$author->getName()] = [];
                    }
                    
                    if(!in_array($book->getName(), $this->result[$author->getName()], true)){
                        $this->result[$author->getName()][] = $book->getName();
                    }
        
                }
            }
        }

        return $this->result;

    }

}