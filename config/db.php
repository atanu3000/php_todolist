<?php 

    $host = 'localhost';
    $userName = 'root';
    $password = '';
    $database = 'todolist';

    $conn = mysqli_connect($host, $userName, $password, $database);

    if(!$conn) {
        echo "Error" . mysqli_error($conn);
    }

    // to validate user data 
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>