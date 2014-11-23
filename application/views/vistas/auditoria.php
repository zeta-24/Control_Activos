<html>

<?php $this->load->view("vistas/header");?>
<script>

       function finalizarAuditoria(id){

            var TableData = new Array();

            var table=document.getElementById("tbActivos");
            var cont = 0;
            for(var i=1; i<table.rows.length;i++){
                    //var id = table.rows[i].cells[0].children[0].children[0].children[1];
                   if(table.rows[i].id != "disabled"){
                    console.log(table.rows[i].id);
                    var idActivo = table.rows[i].id;
                    var cuantitativo = table.rows[i].cells[2].children[0].value;
                    
                    var radio = table.rows[i].cells[3].children[0].children[0];
                    if(radio.children[0].children[0].children[0].checked){
                        var cualitativo = radio.children[0].children[0].children[0].value;
                    }else{
                        var cualitativo = radio.children[1].children[0].children[0].value;
                    }
                    
                    var comentario = table.rows[i].cells[4].children[0].children[0].children[0].value;
                    //var element = td.getElementById('inpComentario')
                    //console.log(id + " " + cuantitativo + " " + cualitativo + " " + comentario);
                    TableData[cont]={
                        "idAuditoria" : id
                        , "idActivo" : idActivo
                        , "calCualitativa" : cualitativo
                        , "calCuantitativa" : cuantitativo
                        , "estado" : 1
                        , "comentario" : comentario
                    }
                    cont++;
                }
            }
            var comentarioAuditoria = document.getElementById('txtComentario').value;
            console.log(comentarioAuditoria);
            $.post("<?php echo base_url();?>index.php/auditoria/realizarAuditoria/", {
                    TableData : TableData,
                    comentarioAuditoria : comentarioAuditoria
                    }, function(data) {
                        alert("Datos insertados");
                        window.open('<?=base_url()?>index.php/auditoria/principal','_self');
                 });


            console.log("Cantidad de elementos en el Array: "+TableData.length);
        }

        function borrarAuditoria(id){

              $.post("<?php echo base_url();?>index.php/auditoria/eliminarAuditoria/", {
                id : id
         }, function(data) {
            alert("Auditoria eliminada");
            window.open('<?=base_url()?>index.php/auditoria/principal','_self');
            });

        }

        function guardarAuditoria(id){


        var TableData = new Array();

            var table=document.getElementById("tbActivos");
            var cont = 0;
            for(var i=1; i<table.rows.length;i++){
                    //var id = table.rows[i].cells[0].children[0].children[0].children[1];
                   if(table.rows[i].id != "disabled"){
                    console.log(table.rows[i].id);
                    var idActivo = table.rows[i].id;
                    var cuantitativo = table.rows[i].cells[2].children[0].value;
                    
                    var radio = table.rows[i].cells[3].children[0].children[0];
                    if(radio.children[0].children[0].children[0].checked){
                        var cualitativo = radio.children[0].children[0].children[0].value;
                    }else{
                        var cualitativo = radio.children[1].children[0].children[0].value;
                    }
                    
                    var comentario = table.rows[i].cells[4].children[0].children[0].children[0].value;
                    //var element = td.getElementById('inpComentario')
                    //console.log(id + " " + cuantitativo + " " + cualitativo + " " + comentario);
                    TableData[cont]={
                        "idAuditoria" : id
                        , "idActivo" : idActivo
                        , "calCualitativa" : cualitativo
                        , "calCuantitativa" : cuantitativo
                        , "estado" : 1
                        , "comentario" : comentario
                    }
                    cont++;
                }
            }
            var comentarioAuditoria = document.getElementById('txtComentario').value;
            console.log(comentarioAuditoria);
            $.post("<?php echo base_url();?>index.php/auditoria/guardarAuditoria/", {
                    TableData : TableData,
                    comentarioAuditoria : comentarioAuditoria
                    }, function(data) {
                        alert("Datos insertados");
                        window.open('<?=base_url()?>index.php/auditoria/principal','_self');
                 });


            console.log("Cantidad de elementos en el Array: "+TableData.length);

        }
</script>

<body>
<div class="container">
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
						<th>En la sala</th>
						<th>Activos</th>
						<th>Valor cuantitativo</th>
						<th>Valor cualitativo</th>
						<th>Comentario</th>
					</tr>
                </thead>
                <tbody>
                <?php 
                    foreach($activos as $fila)
                    {
                        if($fila->estado==1){
                            $this->load->view('vistas/loops/activosIn',$fila);
                        }
                        else{
                            $this->load->view('vistas/loops/activosOut',$fila);
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
            Comentario de la auditoría:
            <textarea id="txtComentario" class="form-control" rows="3"></textarea>
        </span>
    
    </div>
     
    <div class="form-group">
        <div align="right">
        <span>
            <button class="btn btn-primary" onclick="finalizarAuditoria(<?php echo $this->session->userdata('idAuditoria')?>)">Finalizar</button> 
            <button class="btn btn-primary" onclick="guardarAuditoria(<?php echo $this->session->userdata('idAuditoria')?>)">Guardar</button>
            <button  type="submit" class="btn btn-primary" onclick="borrarAuditoria(<?php echo $this->session->userdata('idAuditoria')?>)">Cancelar</button>
          <!-- <button  type="submit" class="btn btn-primary" onclick="window.open('<?=base_url()?>index.php/auditoria/eliminarAuditoria/<?php echo $this->session->userdata('idAuditoria')?>','_self')">Cancelar</button> -->
        </span>
    </div>
    </div>
   
    
</div>
</div>
<!--Container-->
</body>
</html>