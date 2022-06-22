<?php
// entité: représentation objet d'une table
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="categories") 
*/
class Categories {

  /* colonnes de la table */
  /**
  * @ORM\Id 
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue
  */
  protected $id;
  /**
   * @ORM\Column(type="string", length=30) 
   */
  protected $libelle;

  /* accesseurs ou getters/setters */
  public function getId(): int {
    return $this->id;
  }

  public function getLibelle(): string {
    return $this->libelle;
  }

  public function setLibelle(string $lib) {
    $this->libelle = $lib;
  }
}