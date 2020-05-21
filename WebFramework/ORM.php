<?php
 

 include_once '../models/article_model.php';
 include_once '../models/user_model.php';

class ORM {

  private $db;

  public function connect_db($host, $username, $password, $port, $dbname){
  
    try{
      $connexion = new PDO('mysql:host='.$host.';dbname='.$dbname,$username,$password);
      $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);	
    //  echo "Connexion successful" . PHP_EOL;
    }
    catch(PDOException $e){
      $e->getCode();
    }
    return $connexion;
  }

  
  public function __construct()
  {
    $this->db = $this->connect_db("localhost", "faten", "faten", 3306, "rush_mvc");
  }

public function CreateUser($username, $hashed_password, $password_verified, $email){

    $newUser = new Users;
    $result = $newUser->createUser($this->db,$username, $hashed_password, $password_verified, $email);


  return $result;
}


public function emailLogin($both, $hashed_password){

  $login = new Users;
  $result = $login->emailLogin($this->db,$both, $hashed_password);
 // echo "on est dans lORM email";
  
 var_dump($result);

  return $result;
}


public function userLogin($both, $hashed_password){

  $login = new Users;
  $result = $login->userLogin($this->db,$both, $hashed_password);

 // echo "on est dans lORM username";
 var_dump($result);
  
  return $result;

}

public function CreateArticle($title, $sentence, $content, $created_by, $category, $tags){

  $newArticle = new Articles;
  $newArticle->createArticle($this->db,$title, $sentence, $content, $created_by, $category, $tags);
 
} 

public function DisplayArticle($id){

  $newArticleDisplay = new Articles;
  return $newArticleDisplay->displayArticle($this->db,$id);

}


public function getAllArticles(){

  $ArticlesDisplay = new Articles;
  return $ArticlesDisplay->getAllArticles($this->db);

}
  
}

 // public function persist($object)
 // {
    // TODO: Implement this function
 // }

  /**
   * Synchronize each managed models with the database.
   */
//  public function flush()
 // {
    // TODO: Implement this function
 // }


