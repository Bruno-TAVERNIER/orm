<?php
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="produits")
 */
class Produits {

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue
   */
  protected $id;

  /**
   * @ORM\Column(type="string", length=30)
   */
  protected $nom;

  /**
   * @ORM\Column(type="decimal", precision=4, scale=2)
   */
  protected $prix;

  /**
   * @ORM\ManyToOne(targetEntity="Categories")
   */
  protected $categorie;

  /**
   * @ORM\OneToONe(targetEntity="Emplacements")
   */
  protected $emplacement;

  /**
   * @ORM\ManyToMany(targetEntity="Vendeurs")
   */
  protected $vendeurs;

  /* pour le ManyToMany il faut un tableau de vendeurs */
  public function __construct(){
    $this->vendeurs = new ArrayCollection();
  }

  public function getId(): int {
    return $this->id;
  }
  public function getNom(): string {
    return $this->nom;
  }
  public function getPrix(): float {
    return $this->prix;
  }
  public function getCategorie(): Categories {
    return $this->categorie;
  }
  /* type nullable : de type demandé, ou null */
  public function getEmplacement(): ?Emplacements{
    return $this->emplacement;
  }
  public function getVendeurs() : array {
    //on retourne un tableau de vendeurs
    return $this->vendeurs->toArray();
  }

  public function setNom(string $n){
    $this->nom = $n;
  }
  public function setPrix(float $p){
    $this->prix = $p;
  }
  public function setCategorie(Categories $c) {
    $this->categorie = $c;
  }
  public function setEmplacement(Emplacements $e){
    $this->emplacement = $e;
  }
  //on aurait pu écrire à la place une fonction addVendeurs()
  public function setVendeurs(Vendeurs $v){
    $this->vendeurs[] = $v;
  }
  public function addVendeur(Vendeurs $v){
    $this->vendeurs[] = $v;
  }
}