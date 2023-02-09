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
                    <!-- Nombre producto -->
                    <div class="form-group ">
                        <input type="text" name="producto" class="form-control" placeholder="Nombre del producto" autofocus>
                    </div>
                    <!--referencia -->
                    <div class="form-group mt-2">
                        <input type="text" name="referencia" class="form-control" placeholder="Codigo de referencia">
                    </div>
                    <!-- precio -->
                    <div class="form-group  mt-2">
                        <input type="number" name="precio" class="form-control" placeholder="Precio del producto">
                    </div>
                    <!-- peso -->
                    <div class="form-group  mt-2">
                        <input type="number" name="peso" class="form-control" placeholder="Peso del producto">
                    </div>
                    <!-- stock -->
                    <div class="form-group  mt-2">
                        <input type="number" name="stock" class="form-control" placeholder="Stock del producto">
                    </div>
                    <!--  categoria -->
                    <select class="form-select  mt-2 " aria-label=".form-select-sm example" name="categoria">

                        <option selected disabled>Categorias</option>
                        <?php $querySelectCategorias = "SELECT id, categoria FROM categorias";

                        $result_SelectCategorias = mysqli_query($conn, $querySelectCategorias);
                        while ($row = mysqli_fetch_array($result_SelectCategorias)) {
                        ?>

                            <option value="<?php echo $row['id'] ?>"><?php echo $row['categoria'] ?></option>

                        <?php }
                        ?>

                    </select>

                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-success  mt-2 " name="guardarProducto" value="Guardar">
                    </div>
                </form>

                <a href="categorias.php" class="btn btn-secondary  mt-2 " name="crearCategoria">Crear Categoria</a>

            </div>
        </div>

        <!-- Tabla productos -->
        <div class="col-md-8">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Referencia</th>
                        <th>Precio</th>
                        <th>Peso</th>
                        <th>Stock</th>
                        <th>Ventas</th>
                        <th>Categoria</th>
                        <th>fecha de creacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $query = "SELECT *, productos.id as idProductos FROM productos INNER JOIN categorias ON productos.categoriaId = categorias.id";
                    $result_productos = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result_productos)) { ?>

                        <tr>
                            <td><?php echo $row['nombre_producto'] ?></td>

                            <td><?php echo $row['referencia'] ?></td>

                            <td><?php echo $row['precio'] ?></td>

                            <td><?php echo $row['peso'] ?></td>

                            <td><?php echo $row['stock'] ?></td>

                            <td><?php echo $row['ventas'] ?></td>

                            <td><?php echo $row['categoria'] ?></td>

                            <td><?php echo $row['create_at'] ?></td>

                            <td>
                                <a href="edit.php?id=<?php echo $row['idProductos'] ?>" class=" btn btn-secondary"><i class="fa fa-pen"></i></a>
                                <a href="delete.php?id=<?php echo $row['idProductos'] ?>" class=" btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>


                        </tr>


                    <?php }  ?>





                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- footer -->
<?php include('includes/footer.php') ?>