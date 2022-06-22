<?php



/**
 * Vendeurs
 */
class Vendeurs
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $prenom;


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
     * Set prenom.
     *
     * @param string $prenom
     *
     * @return Vendeurs
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom.
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
}
