<?php
$start = microtime(true);
// start PDO
try {
  $pdo = new PDO('mysql:host=localhost;dbname=doctrine;charset=utf8', 'root', '');
  //print_r($pdo);
  $categories = $pdo->query('select * from categories where id = 2')->fetch(PDO::FETCH_ASSOC);
  $emplacements = $pdo->query('select * from emplacements where id = 6')->fetch(PDO::FETCH_ASSOC);
  $rq = "INSERT INTO produits(nom, prix, categorie_id, emplacement_id)
       VALUES('Carottes', '1.50', 2, 5)";
  $result = $pdo->exec($rq);
  if($result) echo $pdo->lastInsertId() . ' enregistré<br>';
}
catch(Exception $e) {
  echo $e->getMessage();
}
$end = microtime(true);
echo 'temps PDO: ' . ($end - $start) . ' secondes<br>';

//start Doctrine
require_once "bootstrap.php";
require_once "entities/Categories.php";
require_once "entities/Produits.php";
require_once "entities/Emplacements.php";
require_once "entities/vendeurs.php";
$start2 = microtime(true);
try {
  $produit = new Produits();
  $produit->setNom('Patates');
  $produit->setPrix('1.48');
  // on va chercher la catégorie sous forme d'objet
  $cat = $entityManager->find('Categories', 2);
  // on va chercher l'emplacement sous forme d'objet
  $place = $entityManager->find('Emplacements', 6);
  //on injecte l'objet Categorie dans le produit 
  $produit->setCategorie($cat);
  //on injecte l'objet emplacement dans le produit
  $produit->setEmplacement($place);
  $entityManager->persist($produit);
  $entityManager->flush();
  echo '<p>Produit créé avec ID: ' . $produit->getId() . '</p>';
}
catch(Exception $e){
  echo $e->getMessage();
}
$end2 = microtime(true);
echo 'temps Doctrine: ' . ($end2 - $start2) . ' secondes<br>';

$tableau = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
print_r($tableau);
shuffle($tableau);
print_r($tableau);
echo rand(0, 59);

