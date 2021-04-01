<?php
class AdminGradeModel extends Driver{

    public function getGrade(){
        $sql = "SELECT * FROM Grade ";

        $result = $this->getRequest($sql);
        $rows = $result->fetchAll(PDO::FETCH_OBJ);

        $tabGrade = [];

        foreach ($rows as $row){
            $grade = new Grade();
            $grade->setId_g($row->id_g);
            $grade->setNom_g($row->nom_g);

            array_push($tabGrade, $grade);
        }
        return $tabGrade;
    }

    public function deleteGrade($id){
        $sql = "DELETE FROM Grade WHERE id_g = :id";

        $result = $this->getRequest($sql, ['id'=>$id]);
        $nb = $result->rowCount();
        return $nb;
    }

    public function insertGrade(Grade $g){
        $sql = "INSERT INTO Grade (nom_g)
                VALUES (:nom) ";
        
        $result = $this->getRequest($sql, ['nom'=>$g->getNom_g()]);
        return $result;
    }


}