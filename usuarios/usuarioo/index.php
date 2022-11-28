<?php
    include_once('../config/config.php');
    include('Usuario.php');

    $p = new Usuario();
    $data = $p->getAll();

    if( isset($_GET['id']) && !empty($_GET['id'])){
        $remove = $p->delete($_GET['id']);
        if($remove){
            header('Location:'.ROOT.'/usuarioo/index.php');
        }else{
            $mensaje = '<div class="alert alert-danger" role="alert">Error al Eliminar</div>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<?php include('../menu.php')?>
    <div class="container">
        <h2 class="text-center mb-2">Usuarios</h2>
        <div class="row">
            <?php
                while( $pt = mysqli_fetch_object($data) ){
                    echo "<div class='col'>";
                    echo"<h4> <img src='".ROOT."/images/$pt->foto' width='70' height='70'/> $pt->nombres $pt->apellidos</h4>";
                    echo "<h5>$pt->profesion</h5>";
                    echo "<p><b>E-mail: </b>$pt->email</p>";
                    echo "<div class='text-center'>";
                            echo "<a class='btn btn-success' href='".ROOT."/usuarioo/edit.php?id=$pt->id'>Modificar</a> - <a class='btn btn-danger' href='".ROOT."/usuarioo/index.php?id=$pt->id'>Eliminar</a> ";
                        echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</body>

</html>