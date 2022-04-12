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

    // PAGE BLOG 
    public function allArticles()
    {
        $bdd = $this->dbConnect();
        
        $req = $bdd->query("SELECT id, title, url_image, alt_image, accroche, created_at FROM article ORDER BY id DESC LIMIT 6");
        
        return $req->fetchAll();
    }

 

    // PAGE ARTICLE 
    public function afficherArticle()
    {
        $bdd = $this->dbConnect();
        $id = $_GET['id'];

        $req = $bdd->prepare("SELECT id, title, url_image, alt_image, content, created_at FROM article WHERE id=?");
        $req->execute([$id]);

        return $req->fetch();
    }


    // PAGES createUser et dashboard ?? 
    // COMMENTAIRES
    public function countCommentaires($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd ->prepare("SELECT COUNT(*) FROM commentaires WHERE id_article=?");
        $req ->execute([(int)$id]);
        $nb_commentaires = $req->fetch()[0];
        
        // var_dump($nb_commentaires);die;
        return $nb_commentaires;
    }
    
    
    public function getCommentaires()
    {
        $bdd = $this->dbConnect();
        $id = (int)$_GET['id'];
        $req = $bdd ->prepare("SELECT commentaires.*, user.pseudo FROM commentaires INNER JOIN user ON commentaires.id_user = user.id AND commentaires.id_article = ?");                         
    
        $req ->execute([$id]);
        $commentaires = $req ->fetchAll();
    
        // var_dump($commentaires);die;
    
        return $commentaires;
    }


    // commenter
    public function commenter()
    {
        if(isset($_SESSION['user'])){
            $bdd = $this->dbConnect();
            extract($_POST);

            $erreur ="";

            if(!empty($commentaire)){
                $id = (int)$_GET['id'];

                $req = $bdd->prepare("INSERT INTO commentaires(id_user, id_article, commentaire, created_at) VALUES (:id_user, :id_article, :commentaire, :created_at)");

                $req->execute([
                    "id_user" => $_SESSION['user'],
                    "id_article" => $id,
                    "commentaire" => nl2br(htmlspecialchars($commentaire)),
                    "created_at" => date('Y-m-d H:i:s')
                ]);

                header("Location: index.php?action=article&id=".$id);
            }
            else{
                $erreur .="Vous devez entrer un commentaire !";
            }
            return $erreur;
        }
    }


}