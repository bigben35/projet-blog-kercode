<?php

namespace ProjetBlogKercode\Models;
require_once "app/Models/ClassArticle.php";

class ArticleManager extends Manager{
    private $articles; //tableau d'articles

    public function ajoutArticle($article)
    {
        $this->articles[] = $article;
    }

    public function getArticles()
    {
        return $this->articles;
    }

    public function chargementArticles()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT * FROM article");
        $req->execute();
        $mesArticles = $req->fetchAll(\PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($mesArticles as $article){
            $firstArticle = new Article($article['id'], $article['title'], $article['url_image'], $article['alt_image'], $article['accroche'], $article['content'], $article['created_at']);
            $this->ajoutArticle($firstArticle);
        }
    }

    public function getArticleById($id)
    {
       $bdd = $this->dbConnect();
       $req = $bdd->prepare("SELECT * FROM article WHERE id=?");
       $req->execute(array($id));
       return $req->fetch();
    }

    public function ajoutArticleBD($title, $url_image, $alt_image, $accroche, $content, $dateCreation)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("INSERT INTO article (title, url_image, alt_image, accroche, content, created_at) VALUES (:title, :url_image, :alt_image, :accroche, :content, :created_at");
        // $req->bindValue(':title',$title,\PDO::PARAM_STR);
        // $req->bindValue(':url_image',$url_image,\PDO::PARAM_STR);
        // $req->bindValue(':alt_image',$alt_image,\PDO::PARAM_STR);
        // $req->bindValue(':accroche',$accroche,\PDO::PARAM_STR);
        // $req->bindValue(':content',$content,\PDO::PARAM_STR);
        // $req->bindValue(':created_at',$dateCreation,\PDO::PARAM_STR);
        $resultat = $req->execute();
        return $req;
        
        if($resultat > 0){
            $article = new Article($this->dbConnect()->lastInsertId(),$title, $url_image, $alt_image, $accroche, $content, $dateCreation);
            var_dump($article);
            $this->ajoutArticle($article);
        }
        
    }
}