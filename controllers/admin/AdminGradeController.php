<?php

class AdminGradeController{
    private $adGrade;

    public function __construct()
    {
        $this->adGrade = new AdminGradeModel();
    }

    public function listGrade()
    {
        $allGrade = $this->adGrade->getGrade();
        require_once('./views/admin/grades/adminGradesItems.php');
    }

    public function removeGrade()
    {
        if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
            $id = trim($_GET['id']);

            $nbline = $this->adGrade->deleteGrade($id);
            if ($nbline > 0){
                header('location:index.php?action=list_g');
            }
        }
    }

    public function addGrade(){
        if(isset($_POST['soumis']) && !empty($_POST['grade'])){
            $nom_grade = trim(htmlentities(addslashes($_POST['grade'])));
            $newGrade = new Grade();
            $newGrade->setNom_g($nom_grade);

            $ok = $this->adGrade->insertGrade($newGrade);
            if($ok){
                header('location:index.php?action=list_g');
            }
        }
        require_once('./views/admin/grades/adminAddGrade.php');
    }

}