<?php 

include('config/db.php');

$id = validate($_GET['id']);

$delete = "DELETE FROM `to_dos` WHERE `id`=$id";

$result = mysqli_query($conn, $delete);
    if ($result) {
        echo '<script type="text/javascript">alert("Task successfully deleted!");</script>';
        echo '<script type="text/javascript">window.location.replace("index.php");</script>';
    } else {
        echo '<script type="text/javascript">alert("Sorry, some error occured. Please try again!");</script>';
        echo '<script type="text/javascript">window.location.replace("index.php");</script>';
    }

?>