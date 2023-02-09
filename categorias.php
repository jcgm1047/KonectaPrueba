<?php
include('db.php');

?>

<?php
include('includes/header.php'); ?>

<!-- formulario crear categoria -->
<div class="container p-4">

    <div class="row">

        <div class="col-md-4 ">
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
                    <!-- Nombre Categoria -->
                    <div class="form-group ">
                        <input type="text" name="categoria"  class="form-control" placeholder="Nombre de la categoria">
                    </div>
               
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-success  mt-2 " name="crearCategoria" value="Crear">
                    </div>
                    
                </form>
            </div>

        </div>
        <div class="col-md-8">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Categorias</th>
                       
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $query = "SELECT * FROM `categorias`";
                    $result_productos = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result_productos)) { ?>

                        <tr>
                            

                            <td><?php echo $row['categoria'] ?></td>


                            <td>
                                <a href="editCategoria.php?id=<?php echo $row['id'] ?>" class="d-grid gap-2 btn btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="deleteCategoria.php?id=<?php echo $row['id'] ?>" class="d-grid gap-2 btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>


                        </tr>
                    <?php }  ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php include('includes/footer.php');

?>