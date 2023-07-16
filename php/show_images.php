<?php

$mysqli = new mysqli('localhost', 'admin', 'password', 'saveimage');

$result = $mysqli->query("SELECT username, filename FROM files;");

$owns_and_files = array();

while($row = $result->fetch_row()){

    array_push($owns_and_files, $row);

}

$i = 0;
$time = time() + (60 * 60 * 24 * 1);

foreach($owns_and_files as $row){

    echo implode('+', $row);
    setcookie($i, implode('.', $row), $time, '/');
    $i++;

}
?>