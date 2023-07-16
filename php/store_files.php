<?php

$filename = $_FILES['uploadImage']['name'];
$username = $_POST['username'];
//dirname returns the path of the parent directory
//getcwd returns the path of current working directory
$dirpath = dirname(getcwd());
$location = $dirpath. '/files/'. $username . "+" . $filename;

$mysqli = new mysqli('localhost', 'admin', 'password', 'saveimage');
$mysqli->query("INSERT INTO files (username, filename) VALUES ('$username', '$filename'); ");

$upload_result = '';
$time = time() + (60 * 60 * 24 * 1);
$path = "/";

if (move_uploaded_file($_FILES['uploadImage']['tmp_name'], $location)) { 

    $upload_result = 'true';

} else { 

    $upload_result = 'false';

}

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

setcookie('upload_result', $upload_result, $time, $path);

header('Location: http://www.saveimage.com');

?>