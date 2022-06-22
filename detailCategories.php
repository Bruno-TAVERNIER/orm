<?php
require_once "bootstrap.php";
require_once "entities/Categories.php";
require_once "entities/Produits.php";
require_once "entities/Emplacements.php";
require_once "entities/vendeurs.php";
use Doctrine\ORM\Query\ResultSetMapping;

//l'id viendra de l'url
$id = isset($_GET['id']) ? strip_tags($_GET['id']): 1;

//on va chercher une catégorie en fonction de son id
$cat = $entityManager->find('Categories', $id);
if(!is_null($cat)) {
  echo $cat->getId() . '<br>';
  echo $cat->getLibelle() .'<br>';
  /* nombre de produits qui sont dans cette catégorie... */
  $nombre = $entityManager->getRepository('Produits')->count(['categorie' => $cat->getId()]);
  echo $nombre . ' produits dans la catégorie <br>';
  /* recherche d'une liste en fonction d'un ou plusieurs autre(s) critère(s) que l'id */
  $produits = $entityManager->getRepository('Produits')->findBy(['categorie' => $cat->getId(), 'emplacement' => NULL]);
  foreach($produits as $p) {
    echo $p->getNom() . ' ' .$p->getPrix() . ' €<br>';
  }
  /* recherche d'un enregistrement en fonction d'un ou plusieurs critère(s) que l'id */
  $alfred = $entityManager->getRepository('Vendeurs')->findOneBy(['prenom' => 'Alfred']);
  echo $alfred->getId() . '<br/>';
  /* requete SQL personnalisée */
  $rsm = new ResultSetMapping();
  //définition du rsm => affectation des champs à des variables
  $rsm->addScalarResult('id', 'identifiant');
  $rsm->addScalarResult('nom', 'emplacement');
  $rsm->addScalarResult('produit', 'produit');
  $query = $entityManager->createNativeQuery("SELECT e.id, p.id, e.nom, p.nom as produit 
                                              FROM emplacements e
                                              JOIN produits p
                                              ON e.id = p.emplacement_id
                                              WHERE e.nom LIKE '%a%'", $rsm);
  $liste = $query->getResult();
  //print_r($liste);

  $rsm2 = new ResultSetMapping();
  $rsm2->addScalarResult('id', 'identifiant');
  $rsm2->addScalarResult('nom', 'emplacement');
  // requête avec sous-requete
  $query2 = $entityManager->createNativeQuery("SELECT * FROM emplacements
                                              WHERE id NOT IN(
                                                SELECT emplacement_id 
                                                FROM produits WHERE emplacement_id <> 'NULL'
                                              )", $rsm2);
$liste2 = $query2->getResult();
print_r($liste2);
}
else echo 'Oups';
