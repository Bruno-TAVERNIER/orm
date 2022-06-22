<?php
require_once "bootstrap.php";
require_once "entities/Categories.php";
require_once "entities/Produits.php";
require_once "entities/Emplacements.php";
require_once "entities/vendeurs.php";

//l'id viendra de l'url
$id = isset($_GET['id']) ? strip_tags($_GET['id']): 1;

//on va chercher un produit en fonction de son id
$produit = $entityManager->find('Produits', $id);
if(!is_null($produit)) {
  echo $produit->getNom() .'<br>';
  echo $produit->getCategorie()->getLibelle() .'<br>';
  echo $produit->getPrix() .' €<br>';
  /* les autres champs... */
}
else echo 'Oups';
