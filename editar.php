<?php
include("db.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tareas WHERE id =$id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['titulo'];
        $description = $row['descripcion'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['titulo'];
    $description = $_POST['descripcion'];
    $query = "UPDATE tareas SET  titulo='$title', descripcion='$description' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo $result;

        die("Query Failed");
    } else {

        header("Location:index.php");
    }
}
?>
<?php include("includes/header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class=" card card-body">
                <form action="editar.php?id=<?php echo $_GET['id'] ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="titulo" value="<?php echo $title; ?>" class="form-control" placeholder="actualizar titulo">
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="actualizar descripcion"><?php echo $description; ?> </textarea>
                    </div>
                    <button class="btn btn-success" name="update">actualizar</button>

                </form>
            </div>
        </div>
    </div>


</div>