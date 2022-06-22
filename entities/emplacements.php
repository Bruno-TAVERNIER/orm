<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="emplacements")
 */
class Emplacements {

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue
   */
  protected $id;
  /**
   * @ORM\column(type="string", length=10)
   */
  protected $nom;

  public function getId(): int {
    return $this->id;
  }
  public function getNom(): string {
    return $this->nom;
  }
  public function setNom(string $n){
    $this->nom = $n;
  }
}