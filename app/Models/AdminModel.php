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
}