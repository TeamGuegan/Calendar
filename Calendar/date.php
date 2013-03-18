<?php

class Date {
    
    var $days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
    var $months = array('Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout',
                    'Septembre', 'Octobre', 'Novembre', 'Decembre');
    
    function getAllDateForYear($year) {
        $tab = array();
        $date = new DateTime($year."-01-01");
        while ($date->format('Y') <= $year) {
            $y = $date->format('Y');
            $m = $date->format('n');
            $d = $date->format('j');
            $w = str_replace('0', '7', $date->format('w'));
            $tab[$y][$m][$d] = $w;
            //Ajout d'un jour a la date : 1D = 1 DAY
            $date->add(new DateInterval('P1D'));
        }
        return $tab;
    }    
    
    function getAllDateForMonth($year, $month) {
        $tab = array();
        $date = new DateTime($year."-".$month."-01");
        while ($date->format('n') <= $month && $date->format('Y') == $year) {
            $m = $date->format('n');
            $d = $date->format('j');
            $w = str_replace('0', '7', $date->format('w'));
            $tab[$m][$d] = $w;
            //Ajout d'un jour a la date : 1D = 1 DAY
            $date->add(new DateInterval('P1D'));
        }
        return $tab;
    }
    
    function getNameForDay($year, $month, $day) {
        $date = new DateTime($year."-".$month."-".$day);
        $w = str_replace('0', '7', $date->format('w'));
        return $days[$w - 1];
    }
}

?>
