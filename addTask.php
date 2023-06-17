<?php 

include('config/db.php');

if (isset($_POST['addTask'])) {
    $title = validate($_POST['title']);
    $subtitle = validate($_POST['subtitle']);
    $task = validate($_POST['task']);

    $to_do = "INSERT INTO `to_dos`(`title`, `subtitle`, `task`) VALUES ('$title', '$subtitle', '$task')";
    // $result = $conn->query($to_do);
    $result = mysqli_query($conn, $to_do);

    if ($result) {
        echo '<script type="text/javascript">alert("Task successfully added!")</script>';
        echo '<script type="text/javascript">window.location.replace("index.php")</script>';
    } else {
        echo '<script type="text/javascript">alert("Sorry, some error occured. Please try again!");</script>' ;
        echo '<script type="text/javascript">window.location.replace("index.php")</script>';
    }
    
}

?>