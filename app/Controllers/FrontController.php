<?php

namespace ProjetBlogKercode\Controllers;

class FrontController
{
    function home()
    {
        require "app/Views/front/homeView.php";
    }

    function contact()
    {
        require "app/Views/front/contact.php";
    }
}