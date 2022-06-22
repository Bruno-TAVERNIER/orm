<?php
require_once "bootstrap.php";
require_once "entities/Emplacements.php";

$nom1 = substr(md5(uniqid()), 0, 8);
$nom2 = substr(md5(uniqid()), 0, 8);
// création d'un objet de type Emplacements
$e1 = new Emplacements();
$e2 = new Emplacements();
$e1->setNom($nom1);
$e2->setNom($nom2);
//enregistrement => entityManager
$entityManager->persist($e1);
$entityManager->persist($e2);
$entityManager->flush();

echo '<p>' . $nom1 .' généré avec l ID: ' . $e1->getId() .'</p>';
echo '<p>' . $nom2 .' généré avec l ID: ' . $e2->getId() .'</p>';

