<?php
include('db.php');
/* edit productos */
if (isset($_GET['id'])) {

    /* captura de datos  */
    $id = $_GET['id'];
    $query = "SELECT * FROM productos INNER JOIN categorias ON productos.categoriaId = categorias.id WHERE productos.id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);
       
        $producto = $row['nombre_producto'];
        $referencia = $row['referencia'];
        $precio = $row['precio'];
        $peso = $row['peso'];
        $stock = $row['stock'];
        $categoria = $row['id'];
    }
}
/* insertando cambios a la tabla */
if (isset($_POST['actualizaProducto'])) {

    $id = $_GET['id'];
    $producto = $_POST['producto'];
    $referencia = $_POST['referencia'];
    $precio = $_POST['precio'];
    $peso = $_POST['peso'];
    $stock = $_POST['stock']; 
    $categoria = $_POST['categorias']; 

    $query = "UPDATE `productos` SET `nombre_producto` = '$producto', `referencia` = ' $referencia', `precio` = '$precio', `peso` = '$peso', `stock` = '$stock', `ventas` = '0', `categoriaId` = '$categoria' WHERE `productos`.`id` = $id";

    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Producto editado';
    $_SESSION['message_type'] = 'primary';
    header('Location: index.php'); 

}

?>

<?php
include('includes/header.php'); ?>

<!-- formulario edit -->
<div class="container p-4">

    <div class="row">

        <div class="col-md-4 mx-auto">

            <div class="card card-body">

                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <!-- Nombre producto -->
                    <div class="form-group ">
                        <input type="text" name="producto" value="<?php $producto ?>" class="form-control" placeholder="<?php echo $producto ?>">
                    </div>
                    <!--referencia -->
                    <div class="form-group mt-2">
                        <input type="text" name="referencia" value="<?php $referencia ?>" class="form-control" placeholder=<?php echo $referencia ?>>
                    </div>
                    <!-- precio -->
                    <div class="form-group  mt-2">
                        <input type="number" name="precio" value="<?php $precio ?>" class="form-control" placeholder=<?php echo $precio ?>>
                    </div>
                    <!-- peso -->
                    <div class="form-group  mt-2">
                        <input type="number" name="peso" value="<?php $peso ?>" class="form-control" placeholder=<?php echo $peso ?>>
                    </div>
                    <!-- stock -->
                    <div class="form-group  mt-2">
                        <input type="number" name="stock" value="<?php $stock ?>" class="form-control" placeholder=<?php echo $stock ?>>
                    </div>
                    <!--  categoria -->
                    <select class="form-select  mt-2 " aria-label=".form-select-sm example" value="<?php echo $categoria ?>" name="categorias">

                        <option selected disabled><?php $categoria ?></option>


                        <?php $querySelectCategorias = "SELECT id, categoria FROM categorias";

                        $result_SelectCategorias = mysqli_query($conn, $querySelectCategorias);
                        while ($row = mysqli_fetch_array($result_SelectCategorias)) {
                        ?>

                            <option value="<?php echo $row['id'] ?>"><?php echo $row['categoria'] ?></option>

                        <?php }
                        ?>


                    </select>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-success  mt-2 " name="actualizaProducto" value="Actualizar">
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
<?php include('includes/footer.php');

?>