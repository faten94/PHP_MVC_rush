<?php

class Users {

    private $id = 0;
        public function  setId($id){ $this->id = $id; }
        public function  getId(){ return $this->id; }
    private $username;
        public function  setUsername($username){ $this->username = $username; }
        public function  getUsername(){ return $this->username; }
    private $hashed_password;
        public function  setHashedPassword($hashed_password){ $this->hashed_password = $hashed_password; }
        public function  getHashedPassword(){ return $this->hashed_password; }
    private $password_verified;
        public function  setPasswordVerified($password_verified){ $this->password_verified = $password_verified; }
        public function  getPasswordVerified(){ return $this->password_verified; }
    private $email;
        public function  setEmail($email){ $this->email = $email; }
        public function  getEmail(){ return $this->email; }
    private $role_group;
        public function  setRoleGroup($role_group){ $this->role_group = $role_group; }
        public function  getRoleGroup(){ return $this->role_group; }
    private $user_status;
        public function  setUserStatus($user_status){ $this->user_status = $user_status; }
        public function  getUserStatus(){ return $this->user_status; }
    private $account_status;
        public function  setAccountStatus($account_status){ $this->account_status = $account_status; }
        public function  getAccountStatus(){ return $this->account_status; }
    private $created_at;
        public function  setCreatedAt($created_at){ $this->created_at = $created_at; }
        public function  getCreatedAt(){ return $this->created_at; }
    private $modified_at;
        public function  setModifiedAt($modified_at){ $this->modified_at = $modified_at; }
        public function  getModifiedAt(){ return $this->modified_at; }

    public function  __construct(){

    }

    static function getAllUsers() {

        global $db;

        $reqUsers = $db->prepare('SELECT * FROM users');

        $reqUsers->execute([]);

        return $reqUsers->fetchAll();

    }

    static function createUser($db,$username, $hashed_password, $password_verified, $email) {

      //  echo "test";

        $sql = 'INSERT INTO users (username, hashed_password, password_verified, email)
                    VALUES(:username, :hashed_password, :password_verified, :email)';

        $reqUsers = $db->prepare($sql);

        $reqUsers->bindParam(':username', $username);
        $reqUsers->bindParam(':hashed_password', $hashed_password);
        $reqUsers->bindParam(':password_verified', $password_verified);
        $reqUsers->bindParam(':email', $email);
                
        $result = $reqUsers->execute();

        return $result;
    }

     
    static function emailLogin($db,$email, $hashed_password) {

        //   echo "testdisplayArticle ". PHP_EOL;
   
           $sql = 'SELECT * FROM users WHERE email=:email AND hashed_password=:hashed_password';
   
           $reqUsers = $db->prepare($sql);
   
           $reqUsers->bindParam(':email', $email);

           $reqUsers->bindParam(':hashed_password', $hashed_password);
                   
           $result = $reqUsers->execute();


           $return = $reqUsers->fetch();
     //      echo "on est dans le model email";
     //      var_dump($return);

           return $return;
          
       }
   
 

     
    static function userLogin($db,$username, $hashed_password) {

        //   echo "testdisplayArticle ". PHP_EOL;
   
           $sql = 'SELECT * FROM users WHERE username=:username AND hashed_password=:hashed_password';
   
           $reqUsers = $db->prepare($sql);
   
           $reqUsers->bindParam(':username', $username);

           $reqUsers->bindParam(':hashed_password', $hashed_password);
                   
           $result = $reqUsers->execute();

           $return = $reqUsers->fetch();
           echo "on est dans le model user";
           var_dump($return);
   
           return $return;
          
       }

}


