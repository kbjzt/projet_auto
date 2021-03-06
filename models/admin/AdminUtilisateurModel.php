<?php

class AdminUtilisateurModel extends Driver
{

    public function getUsers()
    {
        $sql = "SELECT * FROM utilisateurs u
                INNER JOIN grade g
                ON u.id_g = g.id_g
                ORDER BY u.id";

        $result = $this->getRequest($sql);

        $rows = $result->fetchAll(PDO::FETCH_OBJ);
        $tabUser = [];

        foreach ($rows as $row) {
            $user = new Utilisateurs();
            $user->setId($row->id);
            $user->setNom($row->nom);
            $user->setPrenom($row->prenom);
            $user->setLogin($row->login);
            $user->setPass($row->pass);
            $user->getGrade()->setId_g($row->id_g);
            $user->getGrade()->setNom_g($row->nom_g);
            $user->setEmail($row->email);
            $user->setStatut($row->statut);
            array_push($tabUser, $user);
        }
        return $tabUser;
    }

    public function updateStatut(Utilisateurs $user)
    {
        $sql = "UPDATE Utilisateurs SET statut = :statut WHERE id = :id";
        $result = $this->getRequest($sql, ['statut' => $user->getStatut(), 'id' => $user->getId()]);
        return $result->rowCount();
    }


    public function signIn($loginEmail, $pass)
    {
        $sql = "SELECT * FROM Utilisateurs 
                WHERE (login = :logEmail OR email = :logEmail) AND pass = :pass";

        $result = $this->getRequest($sql, ['logEmail' => $loginEmail, 'pass' => $pass]);

        $row = $result->fetch(PDO::FETCH_OBJ);

        return $row;
    }

    public function register(Utilisateurs $user)
    {
        $sql = "SELECT * FROM Utilisateurs WHERE email = :email";
        $result = $this->getRequest($sql, ['email' => $user->getEmail()]);

        if ($result->rowCount() == 0) {
            $req = "INSERT INTO Utilisateurs (nom, prenom, login, pass, email, statut, id_g)
                    VALUES (:nom, :prenom, :login, :pass, :email, :statut, :id_g)";
            $tabParams = ["nom" => $user->getNom(), "prenom" => $user->getPrenom(), "login" => $user->getLogin(), "pass" => $user->getPass(), "email" => $user->getEmail(), "statut" => $user->getStatut(), "id_g" => $user->getGrade()->getId_g()];

            $res = $this->getRequest($req, $tabParams);

            return $res;
        }else{
            return 'Cet utilisateur existe d??ja';
        }
    }
}
