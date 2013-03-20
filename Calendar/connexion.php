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
                
        <title>connexion</title>
    </head>
    
    <body>
        <header>
        
        </header>
        <section>
        <?php 
            if (!isset($_POST["user"]) and !isset($_POST["password"])) {
        ?>
                <h3>Inscription</h3>
                <p>
                    <form action="inscription.php" method="post">
                        <label for="pseudo">pseudo : </label> <input type="text" name="pseudo" id="pseudo"/> <br/>
                        <label for="pass">mot de passe : </label> <input type="password" name="password" id="pass"/><br/>
                        <input type="submit" value="s'inscrire"/>
                    </form>
                </p>
                <h3>Connexion</h3>
                <p>
                    <form action="connexion.php" method="post">
                        <label for="user">nom d'utilisateur : </label><input type="text" name="user" id="user"/><br/>
                        <label for="password">mot de passe : </label><input type="password" name="password" id="password"/><br/>
                        <input type="submit" value="se connecter"/>
                    </form>
                </p>
            <?php 
            } else {
                include_once 'bdd.php';
                $bdd = bdd_connect("users");
                $user = htmlspecialchars($_POST["user"]);
                $pass = htmlspecialchars($_POST["password"]);
                $req = $bdd->prepare("SELECT user, pass FROM users WHERE user = :user AND pass = :pass");
                $req->execute(array(
                        "user" => $user,
                        "pass" => $pass
                ));
                $donnee = $req->fetch();
                if (strcmp($donnee["user"], $user) == 0 and strcmp($donnee["pass"], $pass) == 0) {
                    $_SESSION["user"] = $user;
                    ?>
                    <script type="text/javascript">
                        location.href = "index.php";
                    </script>
                    <?php 
                }
            }
            ?>
        </section>
    </body>
</html>