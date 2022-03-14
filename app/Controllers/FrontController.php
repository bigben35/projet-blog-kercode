<?php

namespace ProjetBlogKercode\Controllers;

class FrontController
{
    function home()
    {
        require "app/Views/front/home.php";
    }

    function contact()
    {
        require "app/Views/front/contact.php";
    }
}