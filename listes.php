<?php
require_once "bootstrap.php";
require_once "entities/Categories.php";
require_once "entities/Produits.php";
require_once "entities/Emplacements.php";
require_once "entities/vendeurs.php";


/* catégories */
$categorieRepository = $entityManager->getRepository('Categories');
$categories = $categorieRepository->findAll();
//echo '<pre>' . print_r($categories, true) . '</pre>';
echo '<ul>';
foreach($categories as $cat){
  echo '<li>' . $cat->getId() . ': ' . $cat->getLibelle() . '</li>';
}
echo '</ul>';

/* emplacements */
$emplacementsR = $entityManager->getRepository('Emplacements');
$emplacements = $emplacementsR->findAll();
echo '<ul>';
foreach($emplacements as $place){
  echo '<li>' . $place->getId() . ': ' . $place->getNom() . '</li>';
}
echo '</ul>';

/* produits */
$produitsR = $entityManager->getRepository('Produits');
$produits = $produitsR->findAll();
?>
<table border="1" rules="rows" width="50%" style="margin: 0 auto">
  <tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Catégorie</th>
    <th>Prix</th>
    <th>Emplacement</th>
    <th>vendeurs</th>
  </tr>
  <?php foreach($produits as $prod): ?>
    <tr>
      <td><?= $prod->getId(); ?></td>
      <td><?= $prod->getNom(); ?></td>
      <td><?= $prod->getCategorie()->getLibelle() ; ?></td>
      <td><?= $prod->getPrix(); ?> €</td>
      <!-- ?-> car l'emplacement peut être null "nullsafe". Si oublié erreur Warning -->
      <td><?= $prod->getEmplacement()?->getNom(); ?></td>
      <td>
        <ol> 
          <?php foreach($prod->getVendeurs() as $v): ?>
            <li><?= $v->getPrenom(); ?></li>
          <?php endforeach; ?>
        </ol>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
