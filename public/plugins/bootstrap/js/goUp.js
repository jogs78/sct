/*$(document).ready(function(){
  $('#goups').click(function(){
    $('body, html').animate({
      scrollTop: '0px'
    }, 300);
  });

    $(window).scroll(function() {
      if ( $(this).scrollTop() > 0){
        $('#goups').slideDown(300);
      } else {
        $('#goups').slideUp(300);
    }

  });

});  */

$(window).scroll(function(){
  if($(this).scrollTop() > 300){ //condición a cumplirse cuando el usuario aya bajado 301px a más.
    $("#goups").slideDown(300); //se muestra el botón en 300 mili segundos
  }else{ // si no
    $("#goups").slideUp(300); //se oculta el botón en 300 mili segundos
  }
});

//creamos una función accediendo a la etiqueta i en su evento click
$("#goups i").on('click', function (e) { 
  e.preventDefault(); //evita que se ejecute el tag ancla (<a href="#">valor</a>).
  $("body,html").animate({ // aplicamos la función animate a los tags body y html
    scrollTop: 0 //al colocar el valor 0 a scrollTop me volverá a la parte inicial de la página
  },700); //el valor 700 indica que lo ara en 700 mili segundos
  return false; //rompe el bucle
});