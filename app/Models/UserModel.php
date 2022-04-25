<?php

namespace ProjetBlogKercode\Models;

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
        $req = $bdd->prepare("SELECT COUNT(*) FROM user WHERE pseudo=?");
    
        $req ->execute([$pseudo]);
    
        $resultat = $req->fetch()[0];
    
        return $resultat;
    }
    
    public function existe_mail($mail){
        
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT COUNT(*) FROM user WHERE mail=?");
    
        $req->execute([$mail]);
    
        $resultat = $req->fetch()[0];
    
        return $resultat;
    }


    public function recupPassword($mail)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM user WHERE mail =:mail');
        $req->execute(array(':mail' => $mail));

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
        $req = $bdd->query("SELECT id, title, url_image, alt_image, accroche, created_at FROM article ORDER BY id DESC LIMIT 4");
        return $req->fetchAll();
    }

    // PAGE BLOG 
    public function allArticles()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT id, title, url_image, alt_image, accroche, created_at FROM article ORDER BY id DESC LIMIT 6");
        
        return $req->fetchAll();
    }

    public function rechercheArticle($query)
    {
        $bdd = $this->dbConnect();
        // $query = htmlspecialchars($_GET['query']);
        $req = $bdd->prepare("SELECT id, title, accroche, url_image, alt_image, created_at FROM article WHERE title LIKE :query OR content LIKE :query ORDER BY id DESC LIMIT 6");

        $req->execute([':query' => '%'.$query.'%']);
        // var_dump($query);die;

        $search = $req->fetchAll();
        // var_dump($search);die;

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
        // var_dump($req);die;
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


    public function commentaireUser()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT commentaires.* FROM commentaires WHERE commentaires.id_user = ?");

        $req->execute([$_SESSION['id']]);
        // var_dump([$_SESSION['id']]);die;
        $commentaires = $req->fetchAll();

        return $commentaires;
        // var_dump($commentaires);die;
    }


    // commenter
    public function commenter()
    {
        if(isset($_SESSION['id'])){
            $bdd = $this->dbConnect();
            extract($_POST);

            // $erreur ="";
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
            // var_dump($erreur);die;
        }
    }


}