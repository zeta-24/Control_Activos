<html>

<?php $this->load->view("vistas/header");?>

  <script type="text/javascript">
	function obtEdificio(){
  		sede = $('#slSedes').val();
  		if(sede==0){
  			$("#slEdificios").empty().append('<option value="0">Edificio</option>');
  			document.getElementById("slEdificios").disabled=true; 
  			$("#slPisos").empty().append('<option value="0">Piso</option>');
  			document.getElementById("slPisos").disabled=true; 
  			$("#slSalas").empty().append('<option value="0">Sala</option>');
  			document.getElementById("slSalas").disabled=true; 
  			document.getElementById("btnAudtoria").disabled=true; 
  			return;
  		}
        $.post("http://localhost/controlactivos/index.php/auditoria/obtenerEdificios/", {
             sede : sede
         }, function(data) {
               $("#slEdificios").html(data);
               document.getElementById("slEdificios").disabled=false; 
               $("#slPisos").empty().append('<option value="0">Piso</option>');
               document.getElementById("slPisos").disabled=true; 
               $("#slSalas").empty().append('<option value="0">Sala</option>');
               document.getElementById("slSalas").disabled=true; 

               document.getElementById("btnAudtoria").disabled=true; 
            });
	}

	function obtPiso(){
  		edificio = $('#slEdificios').val();
  		if(edificio==0){
  			$("#slPisos").empty().append('<option value="0">Piso</option>');
  			document.getElementById("slPisos").disabled=true; 
  			$("#slSalas").empty().append('<option value="0">Sala</option>');
  			document.getElementById("slSalas").disabled=true; 

  			document.getElementById("btnAudtoria").disabled=true; 
  			return;
  		}
        $.post("http://localhost/controlactivos/index.php/auditoria/obtenerPisos/", {
             edificio : edificio
         }, function(data) {
               $("#slPisos").html(data);
                document.getElementById("slPisos").disabled=false; 
                $("#slSalas").empty().append('<option value="0">Sala</option>');
               document.getElementById("slSalas").disabled=true; 

               document.getElementById("btnAudtoria").disabled=true; 
            });
	}

	function obtSala(){
  		piso = $('#slPisos').val();
  		if(piso==0){
  			$("#slSalas").empty().append('<option value="0">Sala</option>');
  			document.getElementById("slSalas").disabled=true; 

  			document.getElementById("btnAudtoria").disabled=true; 
  			return;
  		}
        $.post("http://localhost/controlactivos/index.php/auditoria/obtenerSalas/", {
             piso : piso
         }, function(data) {
               $("#slSalas").html(data);  
               document.getElementById("slSalas").disabled=false; 

               document.getElementById("btnAudtoria").disabled=true; 
            });

	}

	function enable(){
		sala = $('#slSalas').val();
		if(sala==0){
			document.getElementById("btnAudtoria").disabled=true; 
		}else{
		document.getElementById("btnAudtoria").disabled=false; 
		}
	}

    </script>
<body>
<div class="container">
		<center>
            <br><br>
			<h1>Agregar Auditorías</h1>
		</center>
</div>
	<div class="row">
		<div class="container">
			<!-- Search box Start -->
			<form action="<?php echo base_url();?>index.php/auditoria/crear/" method="POST">
			    <div class="well carousel-search hidden-sm">
			    	<center>
			    		<div id="example2" class="bs-docs-example">							
							<div class="form-group">
								<div class="btn-group">
									<select class="form-control" id="slSedes" name="slSedes" onchange="obtEdificio()">	
										<option value="">Sede</option>
										 <?php 
									        foreach($sede as $fila)
									        {
									        ?>
									            <option value="<?=$fila->id?>"><?=$fila->nombre?></option>
									        <?php
									        }
								        ?>     
									</select>	
									
									
								</div>
							</div>
							<div class="form-group">
								<div class="btn-group">								
									<select class="form-control" id="slEdificios" name="slEdificios" onchange="obtPiso()" disabled="true">
										<option value="">Edificio</option>
									</select>

								</div>
							</div>
							<div class="form-group">
								<div class="btn-group">
									
									<select class="form-control" id="slPisos" name="slPisos" onchange="obtSala()" disabled="true"><!-- disabled="" -->
										<option value="">Piso</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="btn-group">
									
									<select class="form-control" id="slSalas" name="slSalas" onchange="enable()" disabled="true">
										<option value="">Sala</option>
									</select>
								</div>
							</div>

							<div class="btn-group">
					        	
					            <button type="submit" id="btnAudtoria" class="btn btn-success" disabled="true">Agregar</button>

					        </div>
						</div>

			    	</center>
			    	
			    </div>
			</form>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	 <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
	 
</body>
</html>