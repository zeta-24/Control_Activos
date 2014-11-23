<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Control de Activos</title>
	   
    <link href="http://localhost/Control_Activos/bootstrap/css/bootstrap-theme.css" type="text/css" rel="stylesheet" >
    <link href="http://localhost/Control_Activos/bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet" >
  
<script language="javascript">
<!--//
/*This Script allows people to enter by using a form that asks for a
UserID and Password*/
function pasuser(form) {
if (form.inputUsuario.value=="" || form.inputPass.value=="") { 
          alert("No deje espacios en blanco");
} 
} 
//-->
</script>
  <!--  
  <div class="page-header">
     <img src="<?php echo base_url();?>resources/images/header.jpg" class="img-responsive">
   -->     
     
  </div>
  
</head>
<body>
 <!-- <div class="container">
  <div class="row">
        <div class="com-md-12">
          <div class="notification login-alert">
            Please Enter Your Username And Password!
          </div>
        </div>
  </div>
  </div>-->
   <center>
    <br><br><br><br><br><br><br><br>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                  <br>
          <p class="text-center"><b> Bienvenido al Sistema de Control de Activos TEC </b> </p>
        <!-- <img src="<?php echo base_url();?>resources/images/tec.jpg">
      -->
        <!--<form class="form-signin col-md-12" action="<?php echo base_url();?>index.php/ctrLogin/principal/" method="POST">-->
       
       <!-- <div class="well login-box" >-->
        <form class="form-signin col-*-*" action="<?php echo base_url();?>index.php/auditoria/principal/" method="POST">
          <div class="form-group">
            <input type="text" value="" id="inputUsuario" name="inputUsuario" class="form-group input-lg" placeholder="Usuario">
          </div>
          <div class="form-group">
              <input type="password" value="" id="inputPass" name="inputPass" class="form-group input-lg" placeholder="Contraseña">
          </div>
          <div class="form-group">
              <input type="submit" class="btn btn-primary btn-sm " value="Ingresar"></input>
              <!--<span class="pull-right"><a href="#">Registrarse</a></span>-->
          </div>
       </form>
     <!--</div> well login-box-->
     </div>
     </div>
        </div> <!--row-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <!--  <script src="../../dist/js/bootstrap.min.js"></script>-->

    </div> <!-- /container -->

  </center>
  
  
</body>
</html>