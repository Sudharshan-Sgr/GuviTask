<?php
    $servername = "localhost";
    $username = "root";
    $dbpassword = "Deva@01234";
    $dbname = "guvi";
    $id = $_POST["id"]; //temporary
    // $servername = "sql12.freesqldatabase.com";
    // $username = "sql12539150";
    // $dbpassword = "MNjYKH611h";
    // $dbname = "sql12539150";

    // Create connection
    $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "select * from users where id = '$id'";
    $result = $conn->query($sql);
    if($result){
        if($result->num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $res_fullname = $row["fullname"];
                $res_mail = $row["emailid"];
                $res_pass = $row["password"];
            }
        }
    }
    if($collection->count(["email" => $mail])){
        //TODO() load data from mongodb and update fields
    }
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $response = array(
        "fullname" => $res_fullname,
        "mail" => $res_mail,
        "password" => $res_pass
    );
    echo json_encode($response);
    ?>