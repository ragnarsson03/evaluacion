<?php

session_start();
session_unset(); 
session_destroy(); // Para cerrar la sesión!
header("Location: inicio_sesion.php");

exit();
?>

