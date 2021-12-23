<?php
   /*Development Connection
    $host = '127.0.0.1';
    $db = 'totalgroomin_db';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';*/

   //Remote Database Connection
   $host = 'remotemysql.com';
    $db = 'zfOW71A5Tk';
    $user = 'zfOW71A5Tk';
    $pass = 'P@$$word5';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connected';
    } catch(PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    require_once 'user.php';
    $crud = new crud($pdo);
    $user = new user($pdo);

    $user->insertUser("admin","password");

?>