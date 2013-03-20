<?php
    session_start();
?>

<! doctype html>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="http://code.jquery.com/jquery-latest.js"></script>   
        <script src="script.js" type="text/javascript"></script>   
        <script>displayAllMonths();
        changeMonth();
        displayYears();
        prevYear();
        nextYear();
        prevMonth();
        nextMonth();</script>  
        <title>Calendrier</title>
    </head>
    
    <body>
        <header>
        	<img id="image" src="calendrier.jpg" alt="calendar" width="100" height="100" />
        	<h1>Calendrier</h1>
        	<form id="formulaire" method="post" action="connexion.php">
        		<p> 
        			Utilisateur : <input type="text" name="user">
        		    Mot de passe : <input type="text" name="password">
        		    <input type="submit" value="se connecter">
        		</p>
        	</form>
        </header>
        <section>
        <?php 
        require 'date.php';
        $date = new Date();
        if (!isset($_GET["year"]) or !isset($_GET["month"])) {
            $year = date('Y');
            $month = date('n');
        } else {
            $year = $_GET["year"];
            $month = $_GET["month"];
        }
        $now = new DateTime();
//         $nowYear = $now->format('Y');
//         $nowMonth = $now->format('n');
//         $nowDay = $now->format('j');
        $tab = $date->getAllDateForMonth($year, $month);
        ?>
        <div class="boutonannee"> 
        	<input type="button" name="prevYear" id="prevYear" value="<<" />
        	<div id="AllYear"></div>
        	<div class="year"><?php echo $year?></div>
        	<input type="button" name="nextYear" id="nextYear" value=">>" />
        	<div id="AllMonth"></div>
        </div>
        <div class="months">
            <input type="button" name="prevMonth" id="prevMonth" value="<<" />
            <li id="month"><?php echo($date->months[$month - 1]);?></li>
            <input type="button" name="nextMonth" id="nextMonth" value=">>" />
        </div>
        <div>
        <?php 
            //recupere le premier sous tableau de $tab
            //$dates = current($tab);
            foreach ($tab as $days) {
                ?>
                <table class="calendar">
                    <thead>
                        <tr>
                            <?php 
                            foreach ($date->days as $d) {
                                ?>
                                <th><?php echo "$d"; ?></th>
                                <?php   
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php 
                            foreach ($days as $d => $w) {
                                if ($d == 1 && $w != 1) {
                                    ?>
                                    <td id="sansJour" colspan="<?php echo $w - 1;?>"></td>
                                    <?php     
                                }
                                ?>
                               <td><?php echo $d?></td>
                                <?php 
                                if ($w == 7) {
                                    ?>
                                    </tr><tr>
                                    <?php    
                                }
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
                <?php 
            }?>
            </div>  
        </section>
        <table class="tabEvent">
        	<tr>
        		<p>Creer un evenement</p>	
        		<input type="button" name="creatEvent" id="event" value="creer" />
        	<tr>
        	<tr>
        		<p>Ajouter un anniversaire</p>	
        		<input type="button" name="creatBirthday" id="birthday" value="creer" />
        	<tr>
        	<tr>
        		<p>Ajouter un rendez-vous</p>	
        		<input type="button" name="creatRDV" id="rdv" value="creer" />
        	<tr>
        </table>
    </body>
</html>