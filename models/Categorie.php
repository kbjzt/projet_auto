<?php

class Categorie{
    private $id_cat;
    private $nom_cat;    

    
    public function getId_cat()
    {
        return $this->id_cat;
    }

    
    public function setId_cat($id_cat)
    {
        $this->id_cat = $id_cat;

        return $this;
    }

    
    public function getNom_cat()
    {
        return $this->nom_cat;
    }

   
    public function setNom_cat($nom_cat)
    {
        $this->nom_cat = $nom_cat;

        return $this;
    }
}