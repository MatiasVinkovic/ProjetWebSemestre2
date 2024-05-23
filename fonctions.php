<?php

function calculer_indice($page_actuelle_func, $coefficient){
    //4 conseils par page
    return 4*($page_actuelle_func -1)+ $coefficient;
    
}


function calculer_indice_recherche($page_actuelle_func, $coefficient){
    //4 conseils par page
    return 2*($page_actuelle_func -1)+ $coefficient;
    
}



function test_func($a,$b){
    return $a + $b;
}



?>