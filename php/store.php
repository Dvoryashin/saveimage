<?php

$filename = $_FILES['uploadImage']['name'];

$dirpath = dirname(getcwd());
$location = $dirpath. '/files/' .$filename;

$result_text = '';
$time = time() + (60 * 60 * 24 * 1);
$path = "/";

if (move_uploaded_file($_FILES['uploadImage']['tmp_name'], $location)) { 

    $result_text = 'Image upload was a success!';

} else { 

    $result_text = 'Something went wrong. Please, try again';

}

setcookie("result_text", $result_text, $time, $path);

header('Location: http://www.saveimage.com');
?>