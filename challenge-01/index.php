<?php

function findPoint($array_parameter){

        //convirtiendo en array los dos elementos del array principal.
        $array_child1 = explode(',',$array_parameter[0]);
        $array_child2 = explode(',',$array_parameter[1]);
        //

        //Eliminando duplicados y filtrando coincidencias.
        $result = array_unique(array_intersect($array_child1, $array_child2));
        //


        return implode(',',$result)."\n";      
    }





// keep this function call here
echo findPoint(['1, 3, 4, 7, 13', '1, 2, 4, 13, 15']);


//Inputs
echo findPoint(array("1, 3, 4, 7, 13", "1, 2, 4, 13, 15"));

echo '<br>';
echo '<br>';

echo findPoint(array("1, 3, 9, 10, 17, 18", "1, 4, 9, 10"));


?>