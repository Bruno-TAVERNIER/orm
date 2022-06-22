<?php
$pdo = new PDO('mysql:host=localhost;dbname=taxis;charset=utf8', 'root', '');
// demande l'affichage des erreurs au lieu des exceptions => debug en développement 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
//définition du fetch_mode par défaut
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

print_r($pdo); // PDO Object()

$count = $pdo->exec("INSERT INTO conducteur(nom, prenom) VALUES('Blondy', 'Alpha')");
echo $count . ' lignes insérées<br>';
echo '<p>Avec ID:  '. $id = $pdo->lastInsertId() . '<br/>';

//une info dans une variable => fetchColumn()
$stmt = $pdo->query('SELECT COUNT(*) FROM  conducteur');
$nbLignes = $stmt->fetchColumn();
echo $nbLignes . ' conducteurs <br/>';
unset($stmt);

// une ligne dans un tableau 
$stmt2 = $pdo->query("SELECT * FROM conducteur WHERE id_conducteur = 11");
$conducteur = $stmt2->fetch(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($conducteur);
echo '</pre>';

// plusieurs lignes dans un tableau à deux dimensions
$liste = $pdo->query("SELECT * from conducteur")->fetchAll();
echo '<pre>';
print_r($liste);
echo '</pre>';

$stmt3 = $pdo->query("SELECT * from conducteur");
while($row = $stmt3->fetch()){
  print_r($row);
}

// requete préparée avec LIKE
$stmt4 = $pdo->prepare("SELECT * FROM conducteur WHERE nom LIKE :nom");
$stmt4->execute([':nom' => '%dy%']);
$like = $stmt4->fetchAll();
echo '<pre>';
print_r($like);
echo '</pre>';
// arrêt de la connexion
$pdo = null;
?>