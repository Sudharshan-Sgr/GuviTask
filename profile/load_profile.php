<?php
    require '../vendor/autoload.php';   
    use MongoDB\Driver\ServerApi;
    $serverApi = new ServerApi(ServerApi::V1);
    $client = new MongoDB\Client(
    'mongodb+srv://sudharshan:sgr200110@cluster0.hmu0ajt.mongodb.net/?retryWrites=true&w=majority', [], ['serverApi' => $serverApi]);
    $collection = $client->test->users;
    $servername = "localhost";
    $username = "root";
    $dbpassword = "root";
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
    $found = false;
    $data = array();
    if($collection->count(["email" => $res_mail])){
        //TODO() load data from mongodb and update fields
        $found = true;
        $res = $collection->find(["email" => $res_mail],['limit'=>1]);
        foreach($res as $document){
            $data = array(
                "phno" => $document["phno"],
                "age" => $document["age"],
                "dob" => $document["dob"],
                "address" => $document["address"],
                "district" => $document["district"],
                "state" => $document["state"],
                "country" => $document["country"],
                "pin" => $document["pin"]
            );
        }
    }
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $response = array(
        "fullname" => $res_fullname,
        "mail" => $res_mail,
        "password" => $res_pass,
        "found" => $found,
        "data" => $data
    );
    echo json_encode($response);
    ?>