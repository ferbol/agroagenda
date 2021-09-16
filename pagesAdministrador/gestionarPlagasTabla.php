
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
                                <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregar">Agregar<span class="glyphicon glyphicon-plus"></span>
                                </button>
                              </caption> <br><br>

<input class="form-control" id="myInput" type="text" placeholder="Buscar..." >
  <br>

 <div class="table-responsive" style="height: 400px !important;  "> 

                            <table class="table table-bordered table-striped table-hover" style="overflow-y: scroll ">
                             

                                <thead >
                                    <tr class="success">
                                        <th style="  border: 2px solid">Nombre</th>
                                        <th style="  border: 2px solid">Plaguicidas</th>
                                        <th style="  border: 2px solid">Tratamiento</th>
                                        
                                        
                                        <th style="  border: 2px solid">Editar</th>
                                        <th style="  border: 2px solid">Eliminar</th>

                                    </tr>
                                </thead>
                       
                                  <?php

                                  
                                    $query="SELECT * FROM plagas";

                                    $resultado = mysqli_query($conn,$query);
                                    //echo $resultado;

                                    while ($fila = mysqli_fetch_array($resultado)) {


                                    
                                      $datos=$fila[0]."||".
                                             $fila[1]."||".
                                             $fila[2]."||".
                                             $fila[3]."||";
                                             
                                  ?>

                                    <tbody id="myTable">

                                     <tr>
                                        
                                        
                                        <td><?php echo $fila[1] ?></td>
                                        <td><?php echo $fila[2] ?></td>
                                        <td><?php echo $fila[3] ?></td>
                                        
                                       
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
</script>    