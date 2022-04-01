<?php

namespace ProjetBlogKercode\Controllers;

class AdminController extends Controller
{
    
    // tableau de bord 
    function dashboard()
    {
        require 'app/Views/Admin/dashboard.php';
    }
}