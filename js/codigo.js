$(document).ready(function() {
    // sidenav
    $(".button-collapse").sideNav();
    //barra
    mostrarBotonesNavbar();

});


function mostrarBotonesNavbar() {
    $(".hide-on-med-and-down").html('');
    $.getJSON("php/mostrarBotonesNavbar.php", function(response) {
        if (response.error) {
            Materialize.toast(response.message, 3000, 'rounded');
        } else {
            $(".hide-on-med-and-down").html(response.message);
            $(".side-nav").html(response.message);
        };
    });
}