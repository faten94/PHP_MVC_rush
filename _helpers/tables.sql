CREATE DATABASE IF NOT EXISTS `rush_mvc` ;
USE `rush_mvc`;

CREATE TABLE users (
    
    id INT NOT NULL AUTO_INCREMENT,
    
    username VARCHAR(255) NOT NULL,
    
    hashed_password VARCHAR(255) NOT NULL,

    password_verified VARCHAR(255) NOT NULL,
    
    email VARCHAR(255) NOT NULL,
    
    role_group VARCHAR(255) NOT NULL DEFAULT "USER",
    
    user_status VARCHAR(10) NOT NULL DEFAULT "ACTIVE",
    
    account_status VARCHAR(10),
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY(id)
    
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;;

CREATE TABLE articles (

   id INT NOT NULL AUTO_INCREMENT,

  title VARCHAR(255) NOT NULL,

  sentence VARCHAR(255) NOT NULL,

  content TEXT NOT NULL,

  created_by VARCHAR(255) NOT NULL,

  article_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

  article_modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  
  category VARCHAR(255) NOT NULL,

  tags VARCHAR(255) NOT NULL,

  PRIMARY KEY(id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;;


CREATE TABLE comments (

  id INT NOT NULL AUTO_INCREMENT,

  sentence VARCHAR(255) NOT NULL,

  content TEXT NOT NULL,

  commment_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

  comment_created_by VARCHAR(255) NOT NULL,

  article_id INT NOT NULL,

  PRIMARY KEY(id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;;