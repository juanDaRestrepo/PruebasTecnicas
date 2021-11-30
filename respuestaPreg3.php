<?php
    $frase = $_POST['frase'];
    //separo cada palabra de la frase en un array
    $arraySucio = explode ( ' ', $frase );
    $arrayLimpio = [];
    $arrayDefinitivo = [];
    $count = 0;
    //limpio cada palabra del array de caracteres especiales y convierto cada una de ellas a minuscula
    for($i=0;$i<sizeof($arraySucio);$i++){
        array_push($arrayLimpio, strtolower(preg_replace('/[^A-Za-z]/','',$arraySucio[$i])));
    }
    print_r($arrayLimpio);
    //compara cada una de las palabras de la cadena y voy armando un array asociativo con la palabra y su numero de coincidencias
    for($i=0;$i<sizeof($arrayLimpio);$i++){
        for($k=0;$k<sizeof($arrayLimpio);$k++){
            if($arrayLimpio[$i]==$arrayLimpio[$k]){
                $count++;
            }
        }
        $arrayDefinitivo[$arrayLimpio[$i]] = $count;
        $count = 0;
    }
    $arrayDefinitivo = serialize($arrayDefinitivo);
    $arrayDefinitivo = urlencode($arrayDefinitivo);
    
    header("Location:pregunta3.php?respuesta=$arrayDefinitivo");
   


?>