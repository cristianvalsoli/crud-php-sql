<?php
include("db.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM  tareas WHERE  id = $id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed");
    }
}
$_SESSION['message'] = 'TAREA GUARDADA SATISFACTORIAMENTE';
$_SESSION['message_type'] = 'success';

header("Location:index.php");
