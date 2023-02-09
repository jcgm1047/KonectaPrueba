<?php

include('db.php');
/* save productos */
if (isset($_POST['guardarProducto'])) {

    $producto = $_POST['producto'];
    $referencia = $_POST['referencia'];
    $precio = $_POST['precio'];
    $peso = $_POST['peso'];
    $stock = $_POST['stock'];
    $categoria =$_POST['categoria'];


    $query= "INSERT INTO `productos` (`id`, `nombre_producto`, `referencia`, `precio`, `peso`, `stock`, `ventas`, `categoriaId`, `create_at`) VALUES (NULL, ' $producto', '$referencia', '$precio', ' $peso', ' $stock', '65', '$categoria', current_timestamp())";

    $result = mysqli_query($conn, $query);

    if (!$result) {
    die ("query fail");
    }

    $_SESSION['message']= 'Producto guardado';
    $_SESSION['message_type']='success';



    header("Location: index.php");
}

/* save categorias */

if (isset($_POST['crearCategoria'])) {

  $categoria = $_POST['categoria'];
 

  $query= "INSERT INTO `categorias` (`id`, `categoria`) VALUES (NULL, '$categoria')";

  $result = mysqli_query($conn, $query);

  if (!$result) {
  die ("query fail");
  }

  $_SESSION['message']= 'Producto guardado';
  $_SESSION['message_type']='success';



  header("Location: categorias.php");
}

/**
 * funcion vender
 */
if (isset($_POST['ventaProducto'])) {
  $productoVenta = $_POST['productoVenta'];
  $unidadVenta = $_POST['unidadVenta'];



  $selectCanVenta = "SELECT * FROM productos WHERE id = $productoVenta";
  $resultCanVenta = mysqli_query($conn, $selectCanVenta);
  


  while ($row = mysqli_fetch_array($resultCanVenta)) {
    $sumarVenta = $row['ventas'] + $unidadVenta;
    $restarStock = $row['stock'] - $unidadVenta;
  }
  if($restarStock > 0){
  $queryVenta = "INSERT INTO `ventas` (`id`, `total_vendido`, `productoId`, `fecha_venta`) VALUES (NULL, '$unidadVenta','$productoVenta',  current_timestamp())";
  $resultVenta = mysqli_query($conn, $queryVenta);

  $queryUpdateVentas = "UPDATE `productos` SET `ventas` = '$sumarVenta', `stock` = '$restarStock' WHERE `productos`.`id` = '$productoVenta'";
  $resultUpdateVentas = mysqli_query($conn, $queryUpdateVentas);



  if (!$resultVenta) {
    die($queryVenta);
  }
  

  $_SESSION['message'] = 'Venta guardada';
  $_SESSION['message_type'] = 'success';
} else {

  $_SESSION['message'] = 'No hay suficiente ';
  $_SESSION['message_type'] = 'danger';
}




  header("Location: venta.php");
}