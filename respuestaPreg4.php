<?php
$cadena = $_POST['cadena'];
$l = 1;
$difer = 0;
$k = 0;
//función para decidir caracter de cierre correspondiente al caracter de apertura
function cie($caracter){
    if($caracter=="["){
        return "]";
    }else if($caracter=="{"){
        return "}";
    }else{
        return ")";
    }
}  
// validar que el numero de caracteres que tiene la cadena es un numero par y que no tenga caracteres diferentes de los aceptados
if(preg_match('/[^\[\]\{\}\(\)]/',$cadena)==1 or (strlen($cadena)%2)!=0){
    $message = "incorrecto";
    header("Location:pregunta4.php?message=$message");
}else{
//validar cadena para saber si es correcta o incorrecta
    for($i=0;$i<strlen($cadena);$i++){
        for($k+=$l;$k<strlen($cadena);$k++){
            
           
            if(cie($cadena[$i])==$cadena[$k] and $difer==0){
                echo "entrepor aqui tambien"."<br>";
                echo "i".$i.":".$cadena[$i]."=".$cadena[$k]."k".$k."<br>";
                if(($k+1)<strlen($cadena)){
                    $i++;
                    $k++; 
                    break;
                }else{
                    $message = "Correcto";
                    
                }
            }elseif(cie($cadena[$i])==$cadena[$k] and $difer>0){
                echo "entre por aqui<br>";
                echo "i".$i.":".$cadena[$i]."=".$cadena[$k]."k".$k."<br>"; 
                if($i>0 and $k+1<strlen($cadena)){
                    $i--;
                    $k++;
                }
                if(cie($cadena[$i])==$cadena[$k]){
                    if(($k+1)<strlen($cadena)){
                        if($i==0){
                            $i=$k;
                            $k++; 
                            break;
                        }elseif(($k+1)<strlen($cadena)){
                            $i-=2;
                            break;
                        }else{
                            $message = "Correcto";
                            break;
                        }
                    }else{
                        $message = "Correcto";
                    }  
                }else{
                    $message = "Correcto";
                }
            }else{
                if(($k+1)<strlen($cadena)){
                    $difer++;
                    break;
                }else{
                    $message ="Incorrecto";
                }
            }     
        }
    }

    header("Location:pregunta4.php?message=$message");
   
}

?>