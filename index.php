<?php

require './app/bootstrap.php';

$xmlScanner = new \App\Utils\XmlScanner(dirname(__FILE__) . '/books-library');

$xmlScanner->scanAll($xmlScanner->getBasePath());

$xmlParser = new \App\Utils\XmlBooksParser($xmlScanner->getXmlFiles());

echo json_encode($xmlParser->parseFiles());