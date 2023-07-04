<?php

$filename = $_FILES['uploadImage']['name'];

$dirpath = dirname(getcwd());
$location = $dirpath. '/files/' .$filename;

echo $location;
if (move_uploaded_file($_FILES['uploadImage']['tmp_name'], $location)) { 
    echo '<p>The HTML5 and php file upload was a success!</p>'; 
} else { 
    echo '<p>The php and HTML5 file upload failed.</p>'; 
}

?>