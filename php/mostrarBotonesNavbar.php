<?php
    header('content-type: application/json');


if (0) {
    //cualquier usuario
    $botones = '<li><a href="#"><i class="material-icons left">input</i>Login</a></li>';
    $botones = $botones.'<li><a href="#"><i class="material-icons left">assignment</i>Registro</a></li>';
    
} else if (0) { 
    //usuario logeado
    $botones = '<li><a href="#"><i class="material-icons left">local_grocery_store</i>Comprar</a></li>';
    $botones = $botones.'<li><a href="#"><i class="material-icons left">account_box</i>Andrei</a></li>';
    $botones = $botones.'<li><a href="#"><i class="material-icons left">exit_to_app</i>Cerrar Sesion</a></li>';
    
} else {
    //admin logeado
    $botones = '<li><a href="#"><i class="material-icons left">view_list</i>Productos</a></li>';
    $botones = $botones.'<li><a href="#"><i class="material-icons left">local_grocery_store</i>Ventas</a></li>';
    $botones = $botones.'<li><a href="#"><i class="material-icons left rotate-90">format_align_right</i>Graficos</a></li>';
    $botones = $botones.'<li><a href="#"><i class="material-icons left">face</i>Admin</a></li>';
    $botones = $botones.'<li><a href="#"><i class="material-icons left">exit_to_app</i>Cerrar Sesión</a></li>';
}

echo json_encode(['error'=>false, 'message'=>$botones]);
return;

    

?>	

