<?php

namespace ProjetBlogKercode\Controllers;

class FrontController
{
    function home()
    {
        $slider = new \ProjetBlogKercode\Models\UserModel();
        $slides = $slider->getSlides();
        require "app/Views/front/home.php";
    }

    function contact()
    {
        require "app/Views/front/contact.php";
    }
}