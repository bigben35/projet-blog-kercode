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

    public function recupPassword($mail, $password)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM user WHERE mail = ?');
        $req->execute(array($mail));

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


    // PAGES createUser et dashboard ?? 
    function nb_commentaires($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd ->prepare("SELECT COUNT(*) FROM commentaire WHERE article_id=?");
        $req ->execute([(int)$id]);
    
        $nb_commentaires = $req->fetch()[0];
        // var_dump($nb_commentaires);die;
        return $nb_commentaires;
    }
    
    
    function commentaires()
    {
        $bdd = $this->dbConnect();
        $id = (int)$_GET['id'];
        $req = $bdd ->prepare("SELECT commentaire.*, user.pseudo FROM commentaire INNER JOIN user ON commentaires.user_id = users.id AND commentaires.article_id = ?");       //prepare quand on passe un paramètre variable; bien reprendre cette requête pour bien la comprendre!!                       
    
        $req ->execute([$id]);
        $commentaires = $req ->fetchAll();
    
        // var_dump($commentaires);die;
    
        return $commentaires;
    }



}