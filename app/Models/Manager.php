<?php

namespace ProjetBlogKercode\Models;

use Exception;

class Manager
{

    private static $pdo = null;
    protected static function dbConnect()  //protected car utiliser uniquement par Manager et les classes qui vont hériter de la classe Manager
    {
        if(isset(self::$pdo)) {
            return self::$pdo;
          } else {
            
            $path = "mysql:host=" . $_ENV['DB_HOST'] . ":" . $_ENV['DB_PORT'] . ";dbname=" . $_ENV['DB_NAME'] . ";charset=utf8";
      
            self::$pdo = 	
              new \PDO(
                $path, 
                $_ENV['DB_USERNAME'], 
                $_ENV['DB_PASSWORD']
              );
              self::$pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_WARNING);
            return self::$pdo;
          }
    }
        }