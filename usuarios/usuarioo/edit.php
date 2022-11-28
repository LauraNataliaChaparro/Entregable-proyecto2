<?php
    include_once('../config/config.php');
    include('Usuario.php');

    $p = new Usuario();
    $dp = mysqli_fetch_object($p->getOne($_GET['id']));

    if( isset($_POST) && !empty($_POST)){
        $_POST['foto']= $dp->foto;
        if($_FILES['foto']['name'] !=='' ){
            $_POST['foto']= saveImage($_FILES);
        }

        $update= $p->update($_POST);
        if($update){
            $mensaje = '<div class="alert alert-success" role="alert">Usuario Modificado con Exito!</div>';
        }else{
            $mensaje = '<div class="alert alert-danger" role="alert">Error al Modificar!</div>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Modificar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<?php include('../menu.php')?>
    <div class="container">
        <?php 
            if(isset($mensaje)){
                echo $mensaje;
            }
        ?>
        <h2 class="text-center mb-2">Modificar Usuario</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="row mb-2">
                <div class="col">
                    <input type="text" name="nombres" id="nombres" placeholder="Nombres del Usuario" class="form-control" value="<?= $dp->nombres ?>">
                    <input type="hidden" name="id" value="<?=$dp->id?>">
                </div>
                <div class="col">
                    <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos del Usuario" class="form-control"value="<?= $dp->apellidos?>">
                </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <input type="email" name="email" id="email" placeholder="Email del Usuario" class="form-control" value="<?= $dp->email?>">
                </div>
                <div class="col">
                    <input type="number" name="celular" id="celular" placeholder="Celular del Usuario" class="form-control" value="<?= $dp->celular?>">
                </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <input type="text" name="direccion" id="direccion" placeholder="Direccion de Residencia" class="form-control" value="<?= $dp->direccion?>">
                </div>
                <div class="col">
                    <input type="text" name="profesion" id="profesion" placeholder="Profesion del Usuario" class="form-control" value="<?= $dp->profesion?>">
                </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <input type="number" name="edad" id="edad" placeholder="Edad del Usuario" class="form-control" value="<?= $dp->edad?>">
                </div>
                <div class="col">
                    <input type="file" name="foto" id="foto" placeholder="Foto del Usuario" class="form-control">
                </div>
            </div>
            <button class="btn btn-success">Modificar Usuario</button>
        </form>
    </div>
</body>
</html>