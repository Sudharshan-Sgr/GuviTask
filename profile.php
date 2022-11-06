<html>
    <body>
        <?php
        try{
            $mongo = new MongoDB\Client('mongodb://my_server_does_not_exist_here:27017');
            $dbs = $mongo->listDatabases();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }

        // echo "$client";
        // $collection = $client->test;
         
        //  echo "Inserted %d document(s)\n", $insertOneResult->getInsertedCount();
         
        //  echo var_dump($insertOneResult->getInsertedId());


        // if(isset($_FILES["photo"])){
        //     $photo_name = $_FILES["photo"]["name"];
        //     $photo_tmp_name = $_FILES["photo"]["tmp_name"];
        //     $photo_size = $_FILES["photo"]["size"];    
        // }

        /*$servername = "localhost";
        $username = "root";
        $dbpassword = "Deva@1234";
        $dbname = "guvi";*/
        // $servername = "sql12.freesqldatabase.com";
        // $username = "sql12539150";
        // $dbpassword = "MNjYKH611h";
        // $dbname = "sql12539150";

        // Create connection
        // $conn = new mysqli($servername, $username, $dbpassword, $dbname);
        // // Check connection
        // if ($conn->connect_error) {
        //     die("Connection failed: " . $conn->connect_error);
        // }

        // $sql = "select * from users where emaild = $emailid";
        // $result = $conn->query($sql);
        // if(mysqli_num_rows($result) > 0){
        //     while($row = mysqli_fetch_assoc($result)){
        //         $fullname = $row["fullname"];
        //     }
        // }
        ?>
    </body>
</html>


            