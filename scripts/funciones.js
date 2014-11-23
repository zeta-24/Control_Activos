var cont = 1;

$(document).ready(
  function () {
        $(".dropdown-menu li a").click(function(){
          var selText = $(this).text();
          $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
          if(cont == 1){
            var a = document.getElementById('ddl_2');
            a.className = "btn btn-default dropdown-toggle btn-select2";
          }
          
          if(cont == 2){
            var a = document.getElementById('ddl_3');
            a.className = "btn btn-default dropdown-toggle btn-select2";
          }
          if(cont == 3){
            var a = document.getElementById('ddl_4');
            a.className = "btn btn-default dropdown-toggle btn-select2";
          }
          cont++;
        });
          
}
)




  $(document).ready(function () {
        /*$(".nav navbar-nav li a").click(function(){
          alert("asda");
          var selText = $(this).className;
          

        });*/
  var selector = '.nav navbar-nav';

$(selector).on('click', function(){
    $(selector).removeClass('active');
    $(this).addClass('active');
});
      })
  
