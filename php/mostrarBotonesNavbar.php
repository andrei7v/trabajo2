<?php
    header('content-type: application/json');
    include 'conexion.php';
    session_start();

    if (!isset($_SESSION['id'])) { //sin logear
        $botones = '<li><a href="#" data-login><i class="material-icons left">input</i>Login</a></li>';
        $botones = $botones.'<li><a href="#" data-register><i class="material-icons left">assignment</i>Registro</a></li>';
    } else if ($_SESSION['role'] == 2) { //login admin
        $botones = '<li><a href="productos.php"><i class="material-icons left">view_list</i>Productos</a></li>';
        $botones = $botones.'<li><a href="#"><i class="material-icons left">local_grocery_store</i>Ventas</a></li>';
        $botones = $botones.'<li><a href="#"><i class="material-icons left rotate-90">format_align_right</i>Graficos</a></li>';
        $botones = $botones.'<li><a href="#"><i class="material-icons left">face</i>'.$_SESSION['usuario'].'</a></li>';
        $botones = $botones.'<li><a href="php/logout.php"><i class="material-icons left">exit_to_app</i>Cerrar Sesión</a></li>';
    } else {  //login usuario
        $botones = '<li><a href="compras.php"><i class="material-icons left">local_grocery_store</i>Comprar</a></li>';
        $botones = $botones.'<li><a href="#"><i class="material-icons left">account_box</i>'.$_SESSION['usuario'].'</a></li>';
        $botones = $botones.'<li><a href="php/logout.php"><i class="material-icons left">exit_to_app</i>Cerrar Sesion</a></li>';
    }

echo json_encode(['error'=>false, 'message'=>$botones]);
return;

?>	

