<?php

@$conn = mysqli_connect('localhost','root','','contacts', 6446);

if(!$conn) {
    die('Connection failed');
}