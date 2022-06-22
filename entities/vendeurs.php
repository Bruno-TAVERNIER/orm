<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="vendeurs")
 */
class Vendeurs{

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue
   */
  protected $id;

  /**
   * @ORM\Column(type="string", length=30)
   */
  protected $prenom;

  public function getId(): int {
    return $this->id;
  }
  public function getPrenom(): string {
    return $this->prenom;
  }
  public function setPrenom(string $p){
    $this->prenom = $p;
  }
}