<?php 

include('config/db.php');

if (isset($_POST['editTask'])) {
    $id = validate($_POST['id_to_edit']);
    $title = validate($_POST['title']);
    $subtitle = validate($_POST['subtitle']);
    $task = validate($_POST['task']);

    $edit = "UPDATE `to_dos` SET `title`='$title', `subtitle`='$subtitle', `task`='$task' WHERE `id`=$id";
    $result = mysqli_query($conn, $edit);

    if ($result) {
        echo '<script type="text/javascript">alert("Contact successfully updated!");</script>';
        echo '<script type="text/javascript">window.location.replace("index.php");</script>';
    } else {
        echo '<script type="text/javascript">alert("Sorry, some error occured. Please try again!");</script>';
        echo '<script type="text/javascript">window.location.replace("index.php");</script>';
    }
}

?>