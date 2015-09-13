<?php
include '../DataAccess/Conexion.php';
session_start();
$aux=$_SESSION['usuario'];

$db = new Conexion();
$sql = $db->query("select id from usuarios where username='$aux'");
$dato = $db->recorrer($sql);
echo ($userid = $dato['id']);
?>
