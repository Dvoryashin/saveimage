<?php
$mysqli = new mysqli('localhost', 'admin', 'password', 'saveimage');
$time = time() + (60 * 60 * 24 * 1);

if(isset($_POST['send_image'])){
    $filename = $_FILES['upload_image']['name'];
    $username = $_POST['username'];
    //dirname returns the path of the parent directory
    //getcwd returns the path of current working directory
    $dirpath = dirname(getcwd());
    $location = $dirpath. '/files/'. $username . "." . $filename;

    if ($username != '' and $filename != ''){
        $mysqli->query("INSERT INTO files (username, filename) VALUES ('$username', '$filename'); ");

        $upload_result = '';
        $path = "/";
        move_uploaded_file($_FILES['upload_image']['tmp_name'], $location);
        if (move_uploaded_file($_FILES['upload_image']['tmp_name'], $location)) { 

            $upload_result = 'true';
            move_uploaded_file($_FILES['upload_image']['tmp_name'], $location);

        } else { 

            $upload_result = 'false';

        }
        setcookie('upload_result', $upload_result, $time, $path);

    }

    header('Location: http://www.saveimage.com');

}

$result = $mysqli->query("SELECT username, filename FROM files;");
$owns_and_files = array();

while($row = $result->fetch_row()){

    array_push($owns_and_files, $row);

}

$i = 0;

foreach($owns_and_files as $row){

    setcookie($i, implode('.', $row), $time, '/');
    $i++;

}

header('Location: http://www.saveimage.com');

?>