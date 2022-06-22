<?php



/**
 * Produits
 */
class Produits
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prix;

    /**
     * @var \Categories
     */
    private $categorie;

    /**
     * @var \Emplacements
     */
    private $emplacement;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $vendeurs;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->vendeurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom.
     *
     * @param string $nom
     *
     * @return Produits
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prix.
     *
     * @param string $prix
     *
     * @return Produits
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix.
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set categorie.
     *
     * @param \Categories|null $categorie
     *
     * @return Produits
     */
    public function setCategorie(\Categories $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie.
     *
     * @return \Categories|null
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set emplacement.
     *
     * @param \Emplacements|null $emplacement
     *
     * @return Produits
     */
    public function setEmplacement(\Emplacements $emplacement = null)
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    /**
     * Get emplacement.
     *
     * @return \Emplacements|null
     */
    public function getEmplacement()
    {
        return $this->emplacement;
    }

    /**
     * Add vendeur.
     *
     * @param \Vendeurs $vendeur
     *
     * @return Produits
     */
    public function addVendeur(\Vendeurs $vendeur)
    {
        $this->vendeurs[] = $vendeur;

        return $this;
    }

    /**
     * Remove vendeur.
     *
     * @param \Vendeurs $vendeur
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeVendeur(\Vendeurs $vendeur)
    {
        return $this->vendeurs->removeElement($vendeur);
    }

    /**
     * Get vendeurs.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVendeurs()
    {
        return $this->vendeurs;
    }
}
