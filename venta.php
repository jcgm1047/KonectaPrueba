<!-- DB -->
<?php include("db.php") ?>
<!-- header -->
<?php include('includes/header.php') ?>


<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php
            if (isset($_SESSION['message'])) {  ?>

                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php session_unset();
            } ?>


            <div class="card card-body">

                <form action="save.php" method="POST">

                    <!--  producto -->
                    <select class="form-select  mt-2 " aria-label=".form-select-sm example" name="productoVenta">

                        <option selected disabled>Producto</option>

                        <?php $queryproduto = "SELECT * FROM `productos`";

                        $result_producto = mysqli_query($conn, $queryproduto);
                        while ($row = mysqli_fetch_array($result_producto)) {
                        ?>

                            <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre_producto'] ?></option>

                        <?php }
                        ?>


                    </select>

                    <!-- cantidad -->
                    <div class="form-group  mt-2">
                        <input type="number" name="unidadVenta" class="form-control" placeholder="Unidades a vender">
                    </div>

                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-success  mt-2 " name="ventaProducto" value="Check Out">
                    </div>

                </form>
            </div>
        </div>
        <!-- tabla resumen -->

        <div class="col-md-8">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Fecha Venta</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $query = "SELECT productos.nombre_producto, ventas.fecha_venta FROM ventas INNER JOIN productos ON ventas.productoId = productos.id";
                    $result_ventas = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result_ventas)) { ?>
                        <tr>
                            <td><?php echo $row['nombre_producto'] ?></td>
                            <td><?php echo $row['fecha_venta'] ?></td>
                        </tr>
                    <?php }  ?>
                </tbody>
            </table>
        </div>
    </div>



    <!-- footer -->
    <?php include('includes/footer.php') ?>