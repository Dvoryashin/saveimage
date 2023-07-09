<?php

$filename = $_FILES['uploadImage']['name'];
$username = $_POST['username'];
//dirname returns the path of the parent directory
//getcwd returns the path of current working directory
$dirpath = dirname(getcwd());
$location = $dirpath. '/files/' .$filename;

$upload_result = '';
$time = time() + (60 * 60 * 24 * 1);
$path = "/";

if (move_uploaded_file($_FILES['uploadImage']['tmp_name'], $location)) { 

    $upload_result = 'true';

} else { 

    $upload_result = 'false';

}

setcookie('upload_result', $upload_result, $time, $path);

header('Location: http://www.saveimage.com');
?>