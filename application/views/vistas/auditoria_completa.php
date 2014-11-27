<html>

<?php $this->load->view("vistas/header");?>

<body>
<div class="container">
    <br><br><br>
<div class="panel panel-default">
    <div class="panel-heading">
        Auditoría
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">
            <table id="tbActivos" class="">
                <thead>
				<tr>
						<th>En Sala</th>
						<th>Activo</th>
						<th>Calificación</th>
						<th>Estado</th>
						<th>Comentario</th>
					</tr>
                </thead>
                <tbody>
                <?php 
                    foreach($activos as $fila)
                    {   $comentario = $fila->comentario;
                        if($fila->estado==1){
                            $this->load->view('vistas/loops/activosInCompleto',$fila);
                        }
                        else{
                            $this->load->view('vistas/loops/activosOutCompleto',$fila);
                        }
                    }
                ?> 
                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.panel-body -->
    <div class="form-group">
        <span>
            Comentario:
            <textarea id="txtComentario" class="form-control" rows="2" disabled="true"><?php echo $comentario ?></textarea>

        </span>
    
    </div>
   
</div>
</div>
<!--Container-->
</body>
</html>