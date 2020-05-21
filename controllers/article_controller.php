
<?php

include_once "../WebFramework/ORM.php";


class ArticleController {

//formulaire pour creer un nouvel article

public function createArticle($db,$title, $sentence, $content, $created_by, $category, $tags) {
$newArticle = new ORM();
$resultArticle = $newArticle->CreateArticle($db,$title, $sentence, $content, $created_by, $category, $tags);

}

public function displayArticle($id) {
 
    $newArticle = new ORM();
    $displayArticle = $newArticle->DisplayArticle($id);
   // echo "je suis dans l'article controler" ;
   // var_dump($displayArticle);

     // rendu du view

    $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../views');//dans quelle dossier va chercher les template
    $twig = new \Twig\Environment($loader,[ 
        'cache' => false,
    ]);

//$displayArticle = $displayArticle[0];

    echo $twig->render('article_view.twig',['firstArticle' => $displayArticle ]);
}


public function getAllArticles() {
 
    $Articles = new ORM;
    $displayAllArticle = $Articles->getAllArticles();
   // echo "je suis dans l'article controler" ;
 //  var_dump($displayAllArticle);


    $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../views');//dans quelle dossier va chercher les template
    $twig = new \Twig\Environment($loader,[ 
        'cache' => false,
    ]);

//$displayArticle = $displayArticle[0];
  //  $displayAllArticle = $displayAllArticle[0];

    echo $twig->render('article_view.twig',['articles' => $displayAllArticle ]);
}

}