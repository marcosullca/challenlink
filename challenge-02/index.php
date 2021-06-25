<?php

function noIterate($strArr)
{

    

    //convirtiendo a miniscula y sub_arrays los dos elementos del array principal.
    $array_child_big = str_split(strtolower($strArr[0]));
    $array_child_small = str_split(strtolower($strArr[1]));


    $array_response = array();
    for($i = 1; $i<count($array_child_small); $i++){
        
        //Inicializando el array que almacenará los elementos coincidentes por la izquierda.
        $array_right = array();

        //Una variable que pertenece al punto de partida para recorrer el array hacia izquierda y derecha.
        $punto_partida = array_search($array_child_small[0],$array_child_big);


        //recorriendo el array_child_big hacia la derecha.
        for($x = $punto_partida+1 ; 
            $x < count($array_child_big);$x++){

                //agregando datos a array_right en caso de coincidencia.
                if($array_child_small[$i] == $array_child_big[$x]){
                    array_push($array_right, $x);
                }

                $array_contador = array_count_values($array_child_small);

                //filtrando la cantidad de duplicados como requiere el array_child_small.
                if(count($array_right)>$array_contador[$array_child_small[$i]]){
                    $array_right = array_slice($array_right,0,-(count($array_right) - 
                    $array_contador[$array_child_small[$i]]));
                }

                
        }

        //Inicializando el array que almacenará los elementos coincidentes por la izquierda
        $array_left = array();

        //recorriendo el array_child_big hacia la izquierda
        for($x = $punto_partida-1 ; 
            $x >= 0;$x--){


                //agregando datos a array_left en caso de coincidencia.
                if($array_child_small[$i] == $array_child_big[$x]){
                    array_push($array_left, $x);

                }
                
                //filtrando la cantidad de duplicados como requiere el array_child_small.
                if(count($array_left)>$array_contador[$array_child_small[$i]]){
                    $array_left = array_slice($array_left,0,-(count($array_left) - 
                    $array_contador[$array_child_small[$i]]));
                }
                

        }

        //Uniendo el array_left y array_right en uno solo.
        $array_response = array_merge(array_merge($array_response,$array_left), $array_right);


    }

    sort($array_response);

    
    return implode(',',array_slice($array_child_big,$array_response[0],end($array_response)-$array_response[0]+1));
}

// keep this function call here
echo noIterate(["ahffaksfajeeubsne", "jefaa"]);

echo '<br>';
echo '<br>';

echo noIterate(["aaffhkksemckelloe", "fhea"]);
