<?php

class Voiture{
    private $id_v;
    private $marque;
    private $modele;
    private $prix;
    private $quantite;
    private $annee;
    private $description;
    private $categorie;
    private $image;


    public function __construct()
    {
        $this->categorie = new Categorie();
    }

    
    public function getId_v()
    {
        return $this->id_v;
    }

    
    public function setId_v($id_v)
    {
        $this->id_v = $id_v;

        return $this;
    }

    
    public function getMarque()
    {
        return $this->marque;
    }

    
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    
    public function getModele()
    {
        return $this->modele;
    }

    
    public function setModele($modele)
    {
        $this->modele = $modele;

        return $this;
    }

    
    public function getPrix()
    {
        return $this->prix;
    }

    
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

   
    public function getQuantite()
    {
        return $this->quantite;
    }

    
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    
    public function getAnnee()
    {
        return $this->annee;
    }

    
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    
    public function getDescription()
    {
        return $this->description;
    }

    
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
}