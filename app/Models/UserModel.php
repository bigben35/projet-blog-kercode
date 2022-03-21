<?php

namespace ProjetBlogKercode\Models;

class UserModel extends Manager
{
    public function getSlides()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT url_image, alt_image FROM slider");
        return $req->fetchAll();
    }
}