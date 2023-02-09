<?php

include('db.php');

if (isset($_POST['guardarProducto'])) {

    $producto = $_POST['producto'];
    $referencia = $_POST['referencia'];
    $precio = $_POST['precio'];
    $peso = $_POST['peso'];
    $stock = $_POST['stock'];
    $categoria =$_POST['categoria'];

   /*  $query =  "INSERT INTO `productos` (`nombre_producto`, `referencia`, `precio`, `peso`, `stock`) VALUES ('$producto', '$referencia', '$precio', '$peso', '$stock')";
 */

    $query= "INSERT INTO `productos` (`id`, `nombre_producto`, `referencia`, `precio`, `peso`, `stock`, `ventas`, `categoriaId`, `create_at`) VALUES (NULL, ' $producto', '$referencia', '$precio', ' $peso', ' $stock', '65', '$categoria', current_timestamp())";

    $result = mysqli_query($conn, $query);

    if (!$result) {
    die ("query fail");
    }

    $_SESSION['message']= 'Producto guardado';
    $_SESSION['message_type']='success';



    header("Location: index.php");
}
