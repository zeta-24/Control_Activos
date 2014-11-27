<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Control de Activos</title>
	   
    <link href="http://localhost/controlactivos/bootstrap/css/bootstrap-theme.css" type="text/css" rel="stylesheet" >
    <link href="http://localhost/controlactivos/bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet" >
  
<script language="javascript">

function pasuser(form) {
if (form.inputUsuario.value=="" || form.inputPass.value=="") { 
          alert("No deje espacios en blanco");
} 
} 

</script>

  </div>
  
</head>
<body>

   <center>
    <br><br><br><br>
    <h1> <b> Bienvenido al Sistema de Control de Activos TEC <b> </h1>
    <br><br><br><br>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary">
                  
        <form class="form-signin" action="<?php echo base_url();?>index.php/auditoria/principal/" method="POST">
          <h3 class="form-signin-heading">Ingrese sus datos </h3>
          <div class="form-group">
            <input type="text" value="" id="inputUsuario" name="inputUsuario" class="form-group input-lg" placeholder="Usuario">
          </div>
          <div class="form-group">
              <input type="password" value="" id="inputPass" name="inputPass" class="form-group input-lg" placeholder="Contraseña">
          </div>
          <div class="form-group">
              <input type="submit" class="btn btn-success btn-lg btn-block" value="Ingresar"></input>
          </div>
       </form>
     </div>
     </div>
        </div> <!--row-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    </div> <!-- /container -->

  </center>
  
  
</body>
</html>