<?php

namespace ProjetBlogKercode\Models;


class AdminModel extends Manager
{
    public function createAdmin($firstname, $mail, $password)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO admin_login (firstname, mail, password )  VALUES (?, ?, ?)');
        $req->execute(array($firstname, $mail, $password));
    
        return $req;
    }

    public function recupPassword($mail, $password)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM admin_login WHERE mail = ?');
        $req->execute(array($mail));

        return $req;
    }
}