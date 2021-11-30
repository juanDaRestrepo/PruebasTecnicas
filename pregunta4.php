<?php
require_once('head.php');

@$resultado = $_GET['message'];

?>
    <div class="row mt-3" >
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <section>
                <div class="border rounded">
                    <div class="p-4 row justify-content-center">
                        <h2 class="text-center col-12">Cadena de caracteres [] {} ().</h2>
                        
                        <div class=" justify-content-center">
                            
                            <form action="respuestaPreg4.php" method="post" class=" justify-content-center" >
                                <label for=""><strong> ingresa una cadena incluyendo solo los caracteres [] {} ():&nbsp;</strong></label><input type="text" name="cadena" id="cadena">
                                <input type="submit" value="enviar" >
                                <?php if(isset($resultado)){
                                    echo $resultado;
                                    $resultado ="";
                                }
                                ?>
                            </form><br>
                            
                            <label for="resultado" class=" justify-content-center">
                                
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