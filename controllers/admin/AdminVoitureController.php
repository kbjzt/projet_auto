<?php

class AdminVoitureController
{
    private $advm;

    public function __construct()
    {
        $this->advm = new AdminVoitureModel();
        $this->adcat = new AdminCategorieModel();
    }

    public function listVoiture()
    {
        AuthController::islogged();

        // var_dump($_POST);
        if (isset($_POST['soumis']) && !empty($_POST['search'])) {
            $search = trim(htmlentities(addslashes($_POST['search'])));
            $cars = $this->advm->getVoitures($search);
            require_once('./views/admin/voitures/adminVoituresItems.php');
            // unset($_POST);
        } else {

            $cars = $this->advm->getVoitures();
            require_once('./views/admin/voitures/adminVoituresItems.php');
        }
        // echo '<pre>';
        // var_dump($cars);
        // echo '</pre>';


    }



    public function addVoitures()
    {
        AuthController::islogged();

        if (isset($_POST['soumis']) && !empty($_POST['marque']) && !empty($_POST['prix'])) {
            $marque = trim(htmlspecialchars(addslashes($_POST['marque'])));
            $modele = trim(htmlspecialchars(addslashes($_POST['modele'])));
            $prix = trim(htmlspecialchars(addslashes($_POST['prix'])));
            $quantite = trim(htmlspecialchars(addslashes($_POST['quantite'])));
            $annee = trim(htmlspecialchars(addslashes($_POST['annee'])));
            $id_cat = trim(htmlspecialchars(addslashes($_POST['cat'])));
            $description = trim(htmlspecialchars(addslashes($_POST['desc'])));
            $image = $_FILES['image']['name'];

            $newV = new Voiture();
            $newV->setMarque($marque);
            $newV->setModele($modele);
            $newV->setPrix($prix);
            $newV->setQuantite($quantite);
            $newV->setAnnee($annee);
            $newV->getCategorie()->setId_cat($id_cat);
            $newV->setDescription($description);
            $newV->setImage($image);

            $destination = './assets/images/';
            move_uploaded_file($_FILES['image']['tmp_name'], $destination . $image);

            $ok = $this->advm->insertVoiture($newV);

            if ($ok) {
                header('location:index.php?action=list_v');
            }
        }
        //affichage du formulaire
        $tabCat = $this->adcat->getCategories();
        require_once('./views/admin/voitures/adminAddV.php');
    }
    public function removeVoiture()
    {
        AuthController::islogged();
        AuthController::accesUser();

        if (isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
            $id = trim($_GET['id']);

            $delV = new Voiture();
            $delV->setId_v($id);
            $nbline = $this->advm->deleteVoiture($delV);

            if ($nbline > 0) {
                header('location:index.php?action=list_v');
            }
        }
    }

    public function editVoiture()
    {
        AuthController::islogged();

        if (isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
            $id = trim($_GET['id']);
            $editV = new Voiture();
            $editV->setId_v($id);
            $editCar = $this->advm->voitureItem($editV);

            $tabCat = $this->adcat->getCategories();

            if (isset($_POST['soumis']) && !empty($_POST['marque']) && !empty($_POST['prix'])) {
                $marque = trim(htmlspecialchars(addslashes($_POST['marque'])));
                $modele = trim(htmlspecialchars(addslashes($_POST['modele'])));
                $prix = trim(htmlspecialchars(addslashes($_POST['prix'])));
                $quantite = trim(htmlspecialchars(addslashes($_POST['quantite'])));
                $annee = trim(htmlspecialchars(addslashes($_POST['annee'])));
                $id_cat = trim(htmlspecialchars(addslashes($_POST['cat'])));
                $description = trim(htmlspecialchars(addslashes($_POST['desc'])));
                $image = $_FILES['image']['name'];


                $editCar->setMarque($marque);
                $editCar->setModele($modele);
                $editCar->setPrix($prix);
                $editCar->setQuantite($quantite);
                $editCar->setAnnee($annee);
                $editCar->getCategorie()->setId_cat($id_cat);
                $editCar->setDescription($description);
                $editCar->setImage($image);

                $destination = './assets/images/';
                move_uploaded_file($_FILES['image']['tmp_name'], $destination . $image);

                $ok = $this->advm->updateVoiture($editCar);

                // if ($ok > 0) {
                    header('location:index.php?action=list_v');
                // }
            }

            require_once('./views/admin/voitures/adminEditV.php');
        }
    }
}
