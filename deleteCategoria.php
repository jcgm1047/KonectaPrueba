<?php  
include("db.php");
if (isset($_GET['id'])) {

$id = $_GET['id'];

$query = "DELETE FROM categorias WHERE `categorias`.`id` = $id";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Field");
}

$_SESSION['message']= 'Categoria Eliminada';
$_SESSION['message_type']='danger';



header("Location: categorias.php");

}?>