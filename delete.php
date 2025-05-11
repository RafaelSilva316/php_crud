<?php

include('conn.php');

print_r($_GET);
$id = $_GET['q'];

$query = "DELETE FROM `contacts` WHERE id='$id';";

if (mysqli_query($conn, $query)){
    header("location: index.php");
} else {
    echo 'Cannot Delete';
}