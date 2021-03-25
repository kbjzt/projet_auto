<?php

class Grade{
    private $id_g;
    private $nom_g;

    
    public function getId_g()
    {
        return $this->id_g;
    }

    
    public function setId_g($id_g)
    {
        $this->id_g = $id_g;

        return $this;
    }

    
    public function getNom_g()
    {
        return $this->nom_g;
    }

    
    public function setNom_g($nom_g)
    {
        $this->nom_g = $nom_g;

        return $this;
    }
}