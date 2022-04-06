<?php

namespace ProjetBlogKercode\Models;
require_once "app/Models/ClassArticle.php";

class ArticleManager extends Manager{
    private $articles; //tableau d'articles

    public function ajoutArticle($article){
        $this->articles[] = $article;
    }

    public function getArticles(){
        return $this->articles;
    }

    public function chargementArticles()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT id, title, url_image, alt_image, created_at FROM article");
        $req->execute();
        $mesArticles = $req->fetchAll(\PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($mesArticles as $article){
            $firstArticle = new Article($article['id'], $article['title'], $article['url_image'], $article['alt_image'], $article['created_at']);
            $this->ajoutArticle($firstArticle);
        }
    }
}