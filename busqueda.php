<?php
session_start();
//connection
include "conection.php";

//make query to check for search est
$sql = "SELECT * FROM peliculas ORDER BY titulo";
//run a query
$result = mysqli_query($link, $sql);
if (!$result){
    echo "<div class='alert alert-danger'>Error: " . mysqli_error($link) . "</div>";
}else{
    $count = mysqli_num_rows($result);
    $_SESSION["count"] = $count;
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo "<tr>
                    <td>" . $row['titulo'] . "</td>
                    <td>" . $row['director'] . "</td>
                    <td>" . $row['anio'] . "</td>
                    <td>" . $row['pais'] . "</td>
                </tr>";
    };
    }



?>