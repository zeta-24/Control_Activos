<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#provincia").change(function() {
                $("#provincia option:selected").each(function() {
                    provincia = $('#provincia').val();
                    $.post("http://localhost/Control_Activos/index.php/auditoria/obtenerEdificios", {
                        provincia : provincia
                    }, function(data) {
                        $("#localidad").html(data);
                    });
                });
            })
        });
    </script>
</head>
<body>
    <select name="provincia" id="provincia">
        <?php 
        foreach($provincias as $fila)
        {
        ?>
            <option value="<?=$fila->id?>"><?=$fila->nombre?></option>
        <?php
        }
        ?>        
    </select>
    
    <select name="localidad" id="localidad">
            <option value="">Selecciona tu provincía</option>
    </select>
</body>
</html>