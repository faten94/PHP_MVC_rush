
<?php 

include_once "../WebFramework/ORM.php";
include_once "../WebFramework/Router.php";

 
class UserController {

//formulaire pour s;inscrite

public function __construct(){


} 

public function register($username, $hashed_password, $password_verified, $email) {
$newORM = new ORM();
$connexion = $newORM->CreateUser($username, $hashed_password, $password_verified, $email);
return $connexion;
}

public function emailLogin($both, $hashed_password){

    $login = new ORM();
    $connexion = $login->emailLogin($both, $hashed_password);
  //  echo "on est dans le controler email";
  //  var_dump($connexion);

    return $connexion;
}


public function userLogin($both, $hashed_password){

    $login = new ORM();
    $connexion = $login->userLogin($both, $hashed_password);


  //  echo "on est dans le controler username";
  //  var_dump($connexion);

    return $connexion;
}




}
