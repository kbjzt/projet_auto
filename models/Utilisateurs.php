<?php

class Utilisateurs{
    private $id;
    private $nom;
    private $prenom;
    private $login;
    private $pass;
    private $email;
    private $grade;

    public function __construct()
    {
        
    }

   
    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    
    public function getNom()
    {
        return $this->nom;
    }

    
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    
    public function getPrenom()
    {
        return $this->prenom;
    }

    
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    
    public function getLogin()
    {
        return $this->login;
    }

    
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    
    public function getPass()
    {
        return $this->pass;
    }

    
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    
    public function getEmail()
    {
        return $this->email;
    }

    
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    
    public function getGrade()
    {
        return $this->grade;
    }

    
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }
}