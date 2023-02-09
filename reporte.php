<!-- DB -->
<?php include("db.php") ?>
<!-- header -->
<?php include('includes/header.php') ?>


<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php
            $query = "SELECT nombre_producto FROM `productos` ORDER BY  stock DESC limit 1";
            $result_ventas = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result_ventas)) {
            ?>
                <div class="card card-body">
                    <h4>Producto con mayor stock</h4>
                    <h5><?php echo $row['nombre_producto'] ?></h5>
                </div>
            <?php
            }

            ?>

        </div>
        <div class="col-md-4">
            <?php
            $query = "SELECT nombre_producto FROM `productos` ORDER BY  ventas DESC limit 1";
            $result_ventas = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result_ventas)) {
            ?>
                <div class="card card-body">
                    <h4>Producto con mayor stock</h4>
                    <h5><?php echo $row['nombre_producto'] ?></h5>
                </div>
            <?php
            }

            ?>

        </div>
        <!-- tabla resumen -->

        <div class="col-md-8">

        </div>
    </div>


    <!-- footer -->
    <?php include('includes/footer.php') ?>