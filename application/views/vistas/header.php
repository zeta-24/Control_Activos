<html>
<head>
	<meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.1/animate.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>scripts/jquery.dataTables.min.css"/>
    <script src="<?php echo base_url(); ?>scripts/plugins/dataTables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>scripts/funciones.js"></script>
     <script src="<?php echo base_url(); ?>scripts/login.js"></script>


	<link href="<?php echo base_url(); ?>bootstrap/css/bootstrap-theme.css" type="text/css" rel="stylesheet" >
    <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet" >

<script>
      $(document).ready(function () {
            $('#tbActivos').dataTable( {
                "language": {
                    "url": "<?php echo base_url(); ?>/scripts/plugins/dataTables/Spanish.txt"
                }
            });
        })
</script>

<script>
   $(document).ready(function () {
    $('#menu').li('active');
  })

</script>

<script>
function ventana(){
    window.showModalDialog("<?php echo base_url();?>index.php/auditoria/crear/", "dialogWidth:200px; dialogHeight:200px; dialogLeft:300px;");
}
</script>

</head>

<body>
    <div class="container">

	<div class="container navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        
    </div>
    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav" id="menu">
            <li><a href="<?php echo base_url();?>index.php/auditoria/principal/">Auditorías</a></li>
            <li><a href="<?php echo base_url();?>index.php/auditoria/historial/">Historial</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url();?>index.php/ctrLogin/login/"><b>Salir</b></a></li>
        </ul>
    </div>
    </div>

    </div>
</body>
</html>