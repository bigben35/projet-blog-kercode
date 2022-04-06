<?php

namespace ProjetBlogKercode\Models;

class Article extends Manager
{
    private int $id;
    private string $title;
    private string $url_image;
    private string $alt_image;
    private string $dateCreation;

    public function __construct(int $id, string $title, string $url_image, string $alt_image, string $dateCreation)
    {
        $this->id = $id;
        $this->title = $title;
        $this->url_image = $url_image;
        $this->alt_image = $alt_image;
        $this->dateCreation = $dateCreation;
    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function getTitle(){return $this->title;}
    public function setTitle($title){$this->title = $title;}

    public function getUrlImage(){return $this->url_image;}
    public function setUrlImage($url_image){$this->url_image = $url_image;}

    public function getAltImage(){return $this->alt_image;}
    public function setAltImage($alt_image){$this->alt_image = $alt_image;}

    public function getDateCreation(){return $this->dateCreation;}
    public function setDateCreation($dateCreation){$this->dateCreation = $dateCreation;}
}