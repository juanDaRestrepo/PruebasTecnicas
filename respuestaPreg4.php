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
if(preg_match('/[^\[\]\{\}\(\)]/',$cadena)==1 or (strlen($cadena)%2)!=0 or $cadena==null){
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
                        }elseif(($k+1)<strlen($cadena) and $i>0){
                            $i-=2;
                            break;
                        }else{
                            $message = "Correcto";
                            break;
                        }
                    }else{
                        echo "Entre aqui al e ";
                        $message = "Correcto";
                        break;
                    }  
                }else{
                     /* echo "entre a este correcto con br<br>";
                    $message = "Correcto"; */ 
                    if(($k+1)<strlen($cadena)){
                        $i=$k-1;
                        break; 
                    }elseif(cie($cadena[0])==$cadena[strlen($cadena)-1]){
                        echo "Entre a este else if";
                        $message = "Correcto";
                        break;
                    }else{
                        $message = "Incorrecto";
                        break;
                    }
                }
            }else{
                if(($k+1)<strlen($cadena)){
                    $difer++;
                    break;
                }else{
                    echo "Entre a este incorrecto";
                    $message ="Incorrecto";
                    break;
                }
            }     
        }
    }

    header("Location:pregunta4.php?message=$message");
   
}

?>