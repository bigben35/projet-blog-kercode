<?php

namespace ProjetBlogKercode\Models;

use PDO;

class UserModel extends Manager
{
    public function createUser($pseudo, $mail, $password)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO user (pseudo, mail, password, created_at )  VALUES (:pseudo, :mail, :password, :created_at)');
        $req->execute([
            "pseudo" => htmlspecialchars($pseudo),
            "mail" => htmlspecialchars($mail),
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "created_at" => date('Y-m-d H:i:s')
        ]);
        return $req;
    }

 

    public function existe_pseudo($pseudo){
        
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT COUNT(id) FROM user WHERE pseudo=?");
    
        $req ->execute([$pseudo]);
    
        $resultat = $req->fetch()[0];
        return $resultat;
    }
    
    public function existe_mail($mail){
        
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT COUNT(id) FROM user WHERE mail=?");
    
        $req->execute([$mail]);
    
        $resultat = $req->fetch()[0];
        return $resultat;
    }


    public function recupPassword($mail)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, pseudo, mail, password, role, created_at FROM user WHERE mail =:mail');
        $req->execute(array(':mail' => $mail));

        return $req;
    }


    // PRESENTATION 
    public function getPresentation()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT url_image, alt_image, content FROM presentation");
        $req->execute();
        return $req->fetch(); //fetch car juste un bloc
    }

    // LAST ARTICLES 
    public function getLastArticles()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT id, title, url_image, alt_image, accroche, created_at FROM article ORDER BY id DESC LIMIT 4");
        $req->execute();
        return $req->fetchAll();
    }

    // PAGE BLOG 
  
    // compte le nombre d'articles 
    public function countArticles()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT COUNT(id) AS nb_articles FROM article");
        $req->execute();
        $result = $req->fetch();
        $nbArticles = $result['nb_articles'];
        return $nbArticles;
    }


    public function IdArticle()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT id FROM article");
        $req->execute();
        $result = $req->fetch();
        $maxId = $result['max_id'];
        // var_dump($maxId);die;
        return $maxId;
    }

    // affiche les articles par page
    public function articlePage($premierArticle, $parPage) 
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, title, url_image, alt_image, accroche, created_at 
        FROM article 
        ORDER BY created_at 
        DESC LIMIT :premierarticle, :parpage');
        $req->bindValue(':premierarticle', $premierArticle, PDO::PARAM_INT);
        $req->bindValue(':parpage', $parPage, PDO::PARAM_INT);
        $req->execute();
        $articles = $req->fetchAll(PDO::FETCH_ASSOC);
        
        return $articles;
    }


    // recherche un/des article(s) 
    public function rechercheArticle($query)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT id, title, accroche, url_image, alt_image, created_at FROM article WHERE title LIKE :query OR content LIKE :query ORDER BY id DESC LIMIT 6");
        $req->execute([':query' => '%'.$query.'%']);
    
        $search = $req->fetchAll();
        return $search;
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
        
        return $nb_commentaires;
    }
    
    
    public function getCommentaires()
    {
        $bdd = $this->dbConnect();
        $id = (int)$_GET['id'];
        $req = $bdd ->prepare("SELECT commentaires.*, user.pseudo FROM commentaires INNER JOIN user ON commentaires.id_user = user.id AND commentaires.id_article = ?");                         
    
        $req ->execute([$id]);
        $commentaires = $req ->fetchAll();
    
        return $commentaires;
    }


    public function commentaireUser()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT commentaires.* FROM commentaires WHERE commentaires.id_user = ?");

        $req->execute([$_SESSION['id']]);
        $commentaires = $req->fetchAll();

        return $commentaires;
    }


    // commenter
    public function commenter()
    {
        if(isset($_SESSION['id'])){
            $bdd = $this->dbConnect();
            extract($_POST);

            $erreur ="Vous devez entrer un commentaire !";

            if(!empty($commentaire)){
                $id = filter_var((int)$_GET['id'], FILTER_SANITIZE_NUMBER_INT);

                $req = $bdd->prepare("INSERT INTO commentaires(id_user, id_article, commentaire, created_at) VALUES (:id_user, :id_article, :commentaire, :created_at)");

                $req->execute([
                    "id_user" => $_SESSION['id'],
                    "id_article" => $id,
                    "commentaire" => nl2br(htmlspecialchars($commentaire)),
                    "created_at" => date('Y-m-d H:i:s')
                ]);

                header("Location: article&id=".$id);
            }
            else{
                
                return $erreur;
            }
        }
    }


}