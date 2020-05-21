<?php

function connect_db($host, $username, $password, $port, $dbname){
  
    try{
      $connexion = new PDO('mysql:host='.$host.';dbname='.$dbname,$username,$password);
      $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);	
 //     echo "Connexion successful";
    }
    catch(PDOException $e){
      $e->getCode();
    }
    return $connexion;
  }

  connect_db("localhost", "faten", "faten", 3306, "rush_mvc");
  