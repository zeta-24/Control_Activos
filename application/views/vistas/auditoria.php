<html>

<?php $this->load->view("vistas/header");?>
<script>

       function finalizarAuditoria(id){

            var TableData = new Array();

            var table=document.getElementById("tbActivos");
            var cont = 0;
            for(var i=1; i<table.rows.length;i++){
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
                    
                    var comentario = table.rows[i].cells[4].children[0].children[0].children[0].va
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
            Comentario:
            <textarea id="txtComentario" class="form-control" rows="2"></textarea>
        </span>
    
    </div>
     
    <div class="form-group">
        <div align="left">
        <span>
            <button class="btn btn-success" onclick="finalizarAuditoria(<?php echo $this->session->userdata('idAuditoria')?>)">Finalizar</button> 
            <button class="btn btn-success" onclick="guardarAuditoria(<?php echo $this->session->userdata('idAuditoria')?>)">Guardar</button>
            <button  type="submit" class="btn btn-warning" onclick="borrarAuditoria(<?php echo $this->session->userdata('idAuditoria')?>)">Cancelar</button>          
        </span>
    </div>
    </div>
   
    
</div>
</div>
<!--Container-->
</body>
</html>