<?php

namespace ProjetBlogKercode\Models;

class Article extends Manager
{
    private int $id;
    private string $title;
    private string $image;
    private string $accroche;
    private string $dateCreation;

    public function __construct(int $id, string $title, string $image, string $accroche, string $dateCreation)
    {
        $this->id = $id;
        $this->title = $title;
        $this->image = $image;
        $this->accroche = $accroche;
        $this->dateCreation = $dateCreation;
    }
}