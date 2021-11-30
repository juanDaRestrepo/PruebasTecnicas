<?php
require_once('head.php');
@$respuesta = $_GET['respuesta'];
@$respuesta = unserialize($_GET['respuesta']);

?>
    <div class="row mt-3" >
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <section>
                <div class="border rounded">
                    <div class="p-4 row justify-content-center">
                        <h2 class="text-center col-12">Palabras repetidas en cadena.</h2>
                        
                        <div class=" justify-content-center">
                            
                            <form action="respuestaPreg3.php" method="post" >
                                <label for=""><strong> ingresa un fase:&nbsp;</strong></label><input type="text" name="frase" id="frase">
                                <input type="submit" value="enviar">
                                
                            </form><br>
                            
                            <label for="resultado" class=" justify-content-center">
                                <?php if(is_array($respuesta) || is_object($respuesta)){
                                        foreach(@$respuesta as $clave => $valor){
                                            if($valor>1){
                                ?>
                                            <ul>
                                                <?php echo "<li>{$clave} - {$valor} veces</li><br>" ?>
                                            </ul>                                              
                                        <?php        
                                            }else{
                                        ?>
                                            <ul>
                                                <?php echo "<li>{$clave} - {$valor} vez</li><br>" ?>
                                            </ul> 
                                    <?php
                                                } 
                                        }
                                    }?>
                            </label><br>
                        </div>
                    </div>
                </div>
            </section >
                    
        </div>
        <div class="col-md-4"></div>
    </div>
<?php
require_once('foot.php');
?>