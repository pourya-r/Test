<?php
//connection
include "conection.php";
//get data via post from actividad_1

$titulo = $_POST["titulo"];
$director = $_POST["director"];
$anio = $_POST["anio"];
$paises = $_POST["paises"];
echo $titulo;

//Check input




//put data into table <peliculas>

//defind query
$sql = "INSERT INTO peliculas (titulo, director, anio, pais) VALUES ('$titulo', '$director', '$anio', '$paises')";
//run query
$result = mysqli_query($link, $sql);
if (!$result){
    echo "<div class='alert alert-danger'>Error: " . mysqli_error($link) . "</div>";
}else{
    echo "<div class='alert alert-success'> Datos almacenados con exito</div>";
}
