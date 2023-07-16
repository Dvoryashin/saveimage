<?php

$mysqli = new mysqli('localhost', 'admin', 'password', 'saveimage');

$result = $mysqli->query("SELECT username, filename FROM files;");

$owns_and_files = array();

while($row = $result->fetch_row()){
    array_push($owns_and_files, $row);
}
$i = 0;
foreach($owns_and_files as $row){
    setcookie($i, implode('+', $row));
    $i++;
}
?>