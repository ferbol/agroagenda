
<?php
  include("../php/conexionMYSQL.php");
?>

         <!-- NO CACHE EN LOS BUSCADORES !-->
        <meta charset="utf-8">     
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache"> 

<div class="container">

                                <caption>
                                <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregar">Agregar Materia Prima<span class="glyphicon glyphicon-plus"></span>
                                </button>
                              </caption> <br><br>

<input class="form-control" id="myInput" type="text" placeholder="Buscar..." >
  <br>

 <div class="table-responsive" style="height: 500px !important;  "> 

                            <table class="table table-bordered table-striped table-hover" style="overflow-y: scroll ">
                             

                                <thead >
                                    <tr class="success">
                                        <th style="  border: 2px solid">Nombre</th>
                                        <th style="  border: 2px solid">Descripción</th>
                                        <th style="  border: 2px solid">Cantidad</th>
                                        <th style="  border: 2px solid">Uni. Med.</th>
                                        <th style="  border: 2px solid">Precio Unitario</th>
                                        <th style="  border: 2px solid">Precio Total</th>
                                        
                                        
                                        <th style="  border: 2px solid">Editar</th>
                                        <th style="  border: 2px solid">Eliminar</th>

                                    </tr>
                                </thead>
                       
                                  <?php

                                  
                                    $query="SELECT * FROM materiaprima";

                                    $resultado = mysqli_query($conn,$query);
                                    //echo $resultado;

                                    while ($fila = mysqli_fetch_array($resultado)) {


                                    
                                      $datos=$fila[0]."||".
                                             $fila[1]."||".
                                             $fila[2]."||".
                                             $fila[3]."||".
                                             $fila[4]."||".
                                             $fila[5]."||".
                                             $fila[6]."||";

                                             
                                  ?>

                                    <tbody id="myTable">

                                     <tr>
                                        
                                        
                                        <td><?php echo $fila[1] ?></td> <!-- NOMBRE -->
                                        <td><?php echo $fila[2] ?></td> <!-- DESCP -->
                                        <td><?php echo $fila[3] ?></td> <!-- CANT -->
                                        <td><?php echo $fila[4] ?></td> <!-- UNI MED -->
                                        
                                        <td >$<span><?php echo $fila[5] ?></span></td> <!-- PREC UNI -->

                                        <td>$<span id="precioTotal" class="precioTotal"><?php echo $fila[6]?></span></td> <!-- TOTAL -->
                                        
                                       
                                        <td style="width: 30px">

                                          <button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion"  onclick="agregarForm('<?php echo $datos ?>')">Editar</button>
                                        </td>
                                        
                                        <td style="width: 30px">
                                          <button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntarSiNo('<?php echo $fila[0] ?>')">Eliminar</button>
                                        </td>
                                     </tr>

                                    <?php

                                      }

                                    ?>

                                      <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        <td style="border: 2px solid; text-align: right; font-size: 16px solid" class="text text-success">COSTO TOTAL =</td>
                                        <td style="border: 2px solid; font-size: 16px solid" class="text text-success" >$<span id="resultadoCostoTotal"></span>

                                        </td>

                                        <td></td>
                                        <td></td>
                                      </tr>

                                    </tbody>

 
                                    
                       </table>


            </div>

         </div>

   <!-- /////////////////////////////FIN/////////////////////////////////// -->


          <!-- FUNCION BUSCAR ASOCIADO A myInput-->
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});



//CALCULAR COSTO TOTAL
var costoTotal=0;
$(".precioTotal").each(function(){
  costoTotal+=parseInt($(this).html()) || 0;
});
document.getElementById("resultadoCostoTotal").innerHTML = costoTotal;


</script>    