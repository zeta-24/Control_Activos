var btnAddCards_Search = function(){
$('#btnAddCards_Search').click(
	
	function(){

		var parameter = $('ddl_1').get('value');

		$.ajax({
			url:base+"/index.php/auditoria/obtenerSede",
			type:'POST',
			data:data2,
			success: function(msg){
				$('#ajaxAddCards_search').html(msg);
				var options = $("#options");
					$.each(result, function() {
					    options.append($("<option />").val(this.ImageFolderID).text(this.Name));
					});
				}
				});
		return false;
	}
	);
}


$('#step1').change(function () {

		var parameter = $('step1').val();

		$.ajax({
			url:base+"/index.php/auditoria/obtenerSede",
			type:'POST',
			data:data2,
			success: function(data2){
				var options = $("#options");
					$.each(data2, function() {
					    options.append($("<option />").val(this.ImageFolderID).text(this.Name));
					});
				}
				});
		return false;
	}
	);
