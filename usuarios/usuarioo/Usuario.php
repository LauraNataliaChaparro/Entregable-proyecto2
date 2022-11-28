<?php
    include_once('../config/config.php');
    include('../config/Database.php');

    class Usuario{
        public $conexion;
        function __construct()
        {
            $db = new Database();
            $this->conexion = $db->connectToDatabase();
        }

        function save($params){
            $nombres = $params['nombres'];
            $apellidos = $params['apellidos'];
            $email = $params['email'];
            $celular = $params['celular'];
            $direccion = $params['direccion'];
            $profesion = $params['profesion'];
            $edad = $params['edad'];
            $foto = $params['foto'];

            $insert = "INSERT INTO usuario VALUES(NULL,'$nombres', '$apellidos', '$email', '$celular', '$direccion', '$profesion', '$edad', '$foto')";
            return mysqli_query($this->conexion, $insert);
        }

        function getAll(){
            $sql = "SELECT * FROM usuario";
            return mysqli_query($this->conexion, $sql);
        }

        function getOne($id){
            $sql = "SELECT * FROM usuario WHERE id = $id";
            return mysqli_query($this->conexion, $sql);
        }

        function update($params){
            $nombres = $params['nombres'];
            $apellidos = $params['apellidos'];
            $email = $params['email'];
            $celular = $params['celular'];
            $direccion = $params['direccion'];
            $profesion = $params['profesion'];
            $edad = $params['edad'];
            $foto = $params['foto'];
            $id = $params['id'];

            $update = "UPDATE usuario SET nombres='$nombres', apellidos='$apellidos', email='$email', celular=$celular, direccion='$direccion', profesion='$profesion', edad=$edad, foto='$foto' WHERE id = $id";
            return mysqli_query($this->conexion, $update);
        }

        function delete($id){
            $delete = "DELETE FROM usuario WHERE id = $id";
            return mysqli_query($this->conexion, $delete);
        }
    }
?>