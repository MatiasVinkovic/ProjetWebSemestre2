<?php

function calculer_indice($page_actuelle_func, $coefficient){
    //4 conseils par page
    return 4*($page_actuelle_func -1)+ $coefficient;
    
}

function calculer_indice_bas($nombre_conseil, $coefficient){
    //4 conseils par page
    
    return ($nombre_conseil -1)- $coefficient;
    
}




?>