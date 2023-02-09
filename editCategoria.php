<?php
include('db.php');
if (isset($_GET['categoria'])) {
    
}
/* edit productos */
if (isset($_GET['id'])) {

    /* captura de datos  */
    $id = $_GET['id'];
    $query = "SELECT * FROM `categorias` WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if ($result) {

        $row = mysqli_fetch_array($result);
       
        $categoria = $row['categoria'];
    }
}
/* insertando cambios a la tabla */
if (isset($_POST['actualizaCategoria'])) {
   
    $id = $_GET['id'];
   
    $categoria = $_POST['categoria']; 

    $query = "UPDATE `categorias` SET `categoria` = '$categoria' WHERE `id` = $id";
  
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Categoria editada';
    $_SESSION['message_type'] = 'primary';
    header('Location: categorias.php'); 

}
?>
<?php
include('includes/header.php'); ?>

<!-- formulario edit -->
<div class="container p-4">

    <div class="row">

        <div class="col-md-4 mx-auto">

            <div class="card card-body">

                <form action="editCategoria.php?id=<?php echo $_GET['id']; ?>" method="POST">
                
                    <!-- Actualizar Catt -->
                    <div class="form-group ">
                    <input type="text" name="categoria" value="<?php echo $categoria ?>" class="form-control" placeholder="<?php echo $categoria?>">
                    </div>
                   
                  
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-success  mt-2 " name="actualizaCategoria" value="Actualizar">
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
<?php 
include('includes/footer.php');
?>