
<?php

include_once '../controllers/article_controller.php';
include_once '../controllers/user_controller.php';

$page = 'home';
if (isset($_GET['p'])) {
    $page = $_GET['p']; //je remplace la valeur de page avec la valeur qui est passé en paramettre    
}

switch ($page) {
    case 'article':
        //comment on appelle le controleur pour gerer le cas ou on est sur la page article.

        $callToController = new ArticleController;
        //   for($i=1; $i<5; $i=$i+1){
        $displayArticleController = $callToController->getAllArticles();
        //    }

        break;
    case 'home':
        //comment on appelle le controleur pour gerer le cas ou on est sur la page login.

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../views'); //dans quelle dossier va chercher les template
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);

        echo $twig->render('home_view.twig', ['page' => $page]);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $both = $_POST['both'];
            $PASSWORD = $_POST['password'];

            if (!preg_match("/^[a-zA-Z ]*$/", $_POST['both'])) {
                try {
                    $callToController = new UserController;
                    $login = $callToController->emailLogin($both, $PASSWORD);
                    // echo "on est dans le 1er if";
                    // var_dump($login);
                    // var_dump($both);
                    // var_dump($PASSWORD);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                try {
                    $callToController = new UserController;
                    $login = $callToController->userLogin($both, $PASSWORD);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }

            if ($callToController->emailLogin($both, $PASSWORD)) {
                $connexion = $callToController->emailLogin($both, $PASSWORD);
                $userEmail = emailLogin($both, $PASSWORD);
                // echo "on est dans le 2eme if";
                // var_dump($login);
                // var_dump($both);
                // var_dump($PASSWORD);

                if ($connexion) {
                    $_SESSION['login'] = $both;
                    header("Location: article");
                    exit();
                } else {
                    echo "Adresse Email ou Mot de passe incorrect." . PHP_EOL;
                    echo "Si vous n'avez pas de compte, veuillez vous inscrire sur la page 'inscription'." . PHP_EOL;
                }
            } else {
                $connexion = $callToController->userLogin($both, $PASSWORD);
                //        var_dump($connexion);

                if ($connexion) {
                    $_SESSION['login'] = $both;
                    header("Location: article");
                    exit();
                } else {
                    echo "Identifiant ou Mot de passe incorrect." . PHP_EOL;
                    echo "Si vous n'avez pas de compte, veuillez vous inscrire sur la page 'inscription'." . PHP_EOL;
                }
            }
        }


        break;
    case 'register';
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../views'); //dans quelle dossier va chercher les template
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);

        echo $twig->render('register_view.twig', ['page' => $page]);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $hashed_password = $_POST['hashed_password'];
            $password_verified = $_POST['password_verified'];
            $email = $_POST['email'];

            try {
                $callToController = new UserController;
                $register = $callToController->register($username, $hashed_password, $password_verified, $email);
                // echo "on est dans le 1er if";
                var_dump($register);
                var_dump($username);
                var_dump($hashed_password);
                var_dump($password_verified);
                var_dump($email);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            if ($callToController->register($username, $hashed_password, $password_verified, $email)) {
                $connexion = $callToController->emailLogin($username, $hashed_password);
                //$userEmail = emailLogin($username, $hashed_password);
                // echo "on est dans le 2eme if";
                // var_dump($login);
                // var_dump($both);
                // var_dump($PASSWORD);

                $_SESSION['login'] = $username;
                header("Location: article");
            }
        }

        break;
    case 'admin';
        //comment on appelle le controleur pour gerer le cas ou on est sur la page admin.

        break;
    default:
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../views'); //dans quelle dossier va chercher les template
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);

        //header ('HTTP/1.0 404 Not Found');
        $template = $twig->load('404.twig');

        echo $template->render(['page' => 'home']);

        break;
}
