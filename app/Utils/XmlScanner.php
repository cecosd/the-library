<?php

namespace App\Utils;

class XmlScanner {

    protected $xmlFiles = [];
    protected $basePath;

    public function __construct($basePath) {
        $this->basePath = $basePath;
    }

    public function getXmlFiles()
    {
        return $this->xmlFiles;
    }

    public function getBasePath()
    {
        return $this->basePath;
    }

    public function scanAll(string $dir) {

        $result = [];

        foreach(scandir($dir) as $filename) {
            
            if ($filename[0] === '.') continue;
           
            $filePath = $dir . '/' . $filename;

            if (is_dir($filePath)) {

                foreach ($this->scanAll($filePath) as $childFilename) {
                    $result[] = $filename . '/' . $childFilename;
                }
            } else {
                $result[] = $filePath;
                $this->xmlFiles[] = $filePath;
            }
        }

        return $result;
    }

}