<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\console\ConsoleRunner;

require_once "vendor/autoload.php";

//configuration Doctrine pour annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/entities"), 
                                                       $isDevMode, 
                                                       $proxyDir, 
                                                       $cache, 
                                                       $useSimpleAnnotationReader);
//on peut aussi utiliser du XML
//$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/config/xml'), $isDevMode);
//ou yaml
//$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/config/yaml'), $isDevMode);

//configuration BDD
$dbParams = [
  'driver' => 'pdo_mysql',
  'user' => 'root',
  'password' => '',
  'dbname' => 'doctrine'
];
//création de l'EntityManager
$entityManager = EntityManager::create($dbParams, $config);