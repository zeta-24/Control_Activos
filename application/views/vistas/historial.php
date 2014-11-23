<html>
<?php $this->load->view("vistas/header");?>

<script>
    function confirma(){
          if (confirm("¿Realmente desea eliminarlo?")){ 
              alert("El registro ha sido eliminado.") }
              else { 
              return false
          }
      }
</script>
<body>
	<div class="container">
		<center>
			<h1>Historial</h1>
		</center>
<div class="panel panel-primary">
    <div class="panel-heading">
        Activos
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">
            <table id="tbActivos" class="display">
                <thead>
					<tr>
						<th>Fecha</th>
						<th>Sede</th>
						<th>Edificio</th>
						<th>Piso</th>
						<th>Sala</th>
						<th>Estado</th>
                        <th></th>
					</tr>
                </thead>
                <tbody>
                    <?php foreach ($auditorias as $fila)
                    {
                    ?>
                    <tr>
                        
                        <td>
							<?php echo $fila->fecha;?>
                        </td>
                            
                        <td>
							<?php echo $fila->sede;?>
                        </td>

                        <td>
							<?php echo $fila->edificio;?>
                        </td>

                        <td>
							<?php echo $fila->piso;?>
                        </td>

                        <td>
							<?php echo $fila->sala;?>
                        </td>

                        <td>
							<?php if($fila->estado == 0){ ?>
                            Incompleta
                            <?php       }
                            else{
                            ?>
                             Completa
                            <?php }?>
                        </td>
                        <td>
                            <?php if($fila->estado == 0){ ?>
                            <a href="<?=base_url()?>index.php/auditoria/crear/">Editar</a> 
                            <?php       }
                            else{
                            ?>
                             <a href="<?=base_url()?>index.php/auditoria/auditorias/<?php echo $fila->id;?>">Ver</a> 
                            <?php }?>
                        </td>
                    </tr>
                         
                    <?php 
                    } 
                    ?>
                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
</div>
</div>
</body>
</html>