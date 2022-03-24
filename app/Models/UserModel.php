<?php

namespace ProjetBlogKercode\Models;

class UserModel extends Manager
{
    // SLIDER 
    public function getSlides()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT url_image, alt_image FROM slider");
        return $req->fetchAll(); //fetchAll pour boucle 
    }

    // PRESENTATION 
    public function getPresentation()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT url_image, alt_image, content FROM presentation");
        return $req->fetch(); //fetch car juste un bloc
    }
}