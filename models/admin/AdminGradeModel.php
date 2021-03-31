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
}