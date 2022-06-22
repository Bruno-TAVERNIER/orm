<?php
require_once "bootstrap.php";
require_once "entities/Categories.php";
require_once "entities/Produits.php";
require_once "entities/Emplacements.php";
require_once "entities/vendeurs.php";


$entityManager->getConnection()->beginTransaction(); // suspend auto-commit
try {
  $produit = new Produits();
  $produit->setNom('Tomates');
  $produit->setPrix('0.99');
  // on va chercher la catégorie sous forme d'objet
  $cat = $entityManager->find('Categories', 2);
  // on va chercher l'emplacement sous forme d'objet
  $place = $entityManager->find('Emplacements', 4);
  //on injecte l'objet Categorie dans le produit 
  $produit->setCategorie($cat);
  //on injecte l'objet emplacement dans le produit
  $produit->setEmplacement($place);
  //recherche des vendeurs
  $v1 = $entityManager->find('Vendeurs', 1);
  $v2 = $entityManager->find('Vendeurs', 2);
  //ajout des vendeurs sous forme d'objet
  $produit->setVendeurs($v1); // ou addVendeur($v1) 
  $produit->setVendeurs($v2);
  $entityManager->persist($produit);
  $entityManager->flush();
  $entityManager->getConnection()->commit();
  echo '<p>Produit créé avec ID: ' . $produit->getId() . '</p>';
}
catch(Exception $e) {
  echo 'oups';
  echo $e->getMessage();
  $entityManager->getConnection()->rollback();
}
