<?php

$connection = mysqli_connect('localhost', 'root', '', 'chiron_company');

if(!$connection) {
    echo 'Connection error' . mysqli_connect_error();
}

?>