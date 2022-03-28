<?php

namespace ProjetBlogKercode\Models;


class AdminModel extends Manager
{
    public function createAdmin($firstname, $mail, $password)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO user (firstname, mail, password )  VALUES (?, ?, ?)');
        $req->execute(array($firstname, $mail, $password));
    
        return $req;
    }

    public function recupPassword($mail, $password)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM user WHERE mail = ?');
        $req->execute(array($mail));

        return $req;
    }
}