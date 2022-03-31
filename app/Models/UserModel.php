<?php

namespace ProjetBlogKercode\Models;

class UserModel extends Manager
{
    public function createUser($pseudo, $mail, $password)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO user (pseudo, mail, password )  VALUES (?, ?, ?)');
        $req->execute(array($pseudo, $mail, $password));
    
        return $req;
    }

    
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

    // LAST ARTICLES 
    public function getLastArticles()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT title, url_image, alt_image, content, created_at FROM article ORDER BY id DESC LIMIT 4");
        return $req->fetchAll();
    }
}