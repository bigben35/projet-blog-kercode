<?php

namespace ProjetBlogKercode\Models;


class AdminModel extends Manager
{
   

    public function recupPassword($mail, $password)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM user WHERE mail = ?');
        $req->execute(array($mail));

        return $req;
    }

    // public function compte($id)
    // {

    // }
}