<?php include("db.php");

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "DELETE FROM productos WHERE `productos`.`id` = $id";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query Field");
    }

    $_SESSION['message']= 'Producto eliminado';
    $_SESSION['message_type']='danger';



    header("Location: index.php");

}
