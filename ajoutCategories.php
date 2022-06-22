<?php
require_once "bootstrap.php";
require_once "entities/Categories.php";

// création d'un objet de type Categories
$c1 = new Categories();
$c2 = new Categories();
$c1->setLibelle('Fruits');
$c2->setLibelle('Légumes');
//enregistrement => entityManager
$entityManager->persist($c1);
$entityManager->persist($c2);
$entityManager->flush();

echo '<p>Fruits générés avec l ID: ' . $c1->getId() .'</p>';
echo '<p>Légumes générés avec l ID: ' . $c2->getId() .'</p>';

