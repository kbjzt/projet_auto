<?php

// require_once('../Categorie.php');
// require_once('../Driver.php');

class AmdminCategorieModel extends Driver{

    public function getCategories(){
        $sql = "SELECT * FROM Categorie";

        $result = $this->getRequest($sql);

        $rows =  $result->fetchAll(PDO::FETCH_OBJ);
        //orm
        $tabCat = [];

        foreach ($rows as $row) {
            $cat = new Categorie();
            $cat->setId_cat($row->id_cat);
            $cat->setNom_cat($row->nom_cat);
        array_push($tabCat, $cat);
        }
        return $tabCat;

    }

    public function deleteCategorie(){
        $sql = "DELETE ";
    }
}

// $adminCat = new AmdminCategorieModel();
// var_dump($adminCat->getCategories());