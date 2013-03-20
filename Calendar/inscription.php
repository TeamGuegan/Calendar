<?php
    session_start();
    if (isset($_SESSION["user"])) {
        header("Location : index.php");
    }
?>

<! doctype html>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
                
        <title>inscription</title>
    </head>
    

    <body>
        <header>
        </header>
        <section>
            <?php 
            if (isset($_POST["pseudo"]) or isset($_POST["password"])) {
                include_once 'bdd.php';
                $pseudo = htmlspecialchars($_POST["pseudo"]);
                $pass = htmlspecialchars($_POST["password"]);
                $bdd = bdd_connect("users");
                $req = $bdd->prepare("SELECT COUNT(*) AS nb FROM users WHERE user = :pseudo");
                $req->execute(array(
                    "pseudo" => $pseudo
                ));
                $donnee = $req->fetch();
                if ($donnee["nb"] != 0) {
                    ?>
                    <script type="text/javascript">
                        alert("ce pseudo est deja utilisé");
                        location.href = "connexion.php"; 
                    </script>
                    <?php 
                }
                //Ajouter INSERT INTO et finir inscription
            }
            ?>
        </section>
    </body>
</html>