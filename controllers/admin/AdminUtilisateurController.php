<?php

class AdminUtilisateurController
{
    private $adUser;
    private $adGrade;

    public function __construct()
    {
        $this->adUser = new AdminUtilisateurModel();
        $this->adGrade = new AdminGradeModel();
    }

    public function listUsers()
    {
        AuthController::islogged();

        if (isset($_GET['id']) && isset($_GET['statut']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $statut = $_GET['statut'];
            $user = new Utilisateurs();
            if ($statut == 1) {
                $statut = 0;
            } else {
                $statut = 1;
            }
            $user->setId($id);
            $user->setStatut($statut);

            $this->adUser->updateStatut($user);
        }
        $allUsers = $this->adUser->getUsers();
        require_once('./views/admin/utilisateurs/adminUtilisateursItems.php');
    }

    public function login()
    {
        
        if(isset($_POST['soumis'])){
            if (strlen($_POST['pass']) >= 4 && !empty($_POST['loginEmail'])) {
                $loginEmail = trim(htmlentities(addslashes($_POST['loginEmail'])));
                $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));
                $data_u = $this->adUser->signIn($loginEmail, $pass);
    
                if (!empty($data_u)) {
                    if ($data_u->statut > 0) {
                        session_start();
                        $_SESSION['Auth'] = $data_u;
                        header('location:index.php?action=list_v');
                    } else {
                        $error = "Votre compte à été supprimé";
                    }
                } else {
                    $error = "Votre login/email et/ou mot de passe ne correspondent pas";
                }
            }else{
                $error = "Entrez des données valides";
            }
        }

        require_once('./views/admin/utilisateurs/login.php');
    }

    public function addUsers(){
        if (isset($_POST['soumis'])){
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && strlen($_POST['pass']) >= 4){
                $nom = trim(htmlspecialchars(addslashes($_POST['nom'])));
                $prenom = trim(htmlspecialchars(addslashes($_POST['prenom'])));
                $login = trim(htmlspecialchars(addslashes($_POST['login'])));
                $pass = md5(trim(htmlspecialchars(addslashes($_POST['pass']))));
                $email = trim(htmlspecialchars(addslashes($_POST['email'])));
                $id_g = trim(htmlspecialchars(addslashes($_POST['id_g'])));
                $statut = 1;

                $newU = new Utilisateurs();
                $newU->setNom($nom);
                $newU->setPrenom($prenom);
                $newU->setLogin($login);
                $newU->setPass($pass);
                $newU->setEmail($email);
                $newU->setStatut($statut);
                $newU->getGrade()->setId_g($id_g);

                $ok = $this->adUser->register($newU);
                if($ok){
                    header('location:index.php?action=list_u');
                }
            }
        }
        $tabGrade = $this->adGrade->getGrade();
        require_once('./views/admin/utilisateurs/register.php');
    }
}
