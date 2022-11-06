
        <?php
        require 'vendor/autoload.php';   
        use MongoDB\Driver\ServerApi;
        $serverApi = new ServerApi(ServerApi::V1);
        $client = new MongoDB\Client(
        'mongodb+srv://sudharshan:sgr200110@cluster0.hmu0ajt.mongodb.net/?retryWrites=true&w=majority', [], ['serverApi' => $serverApi]);
        $collection = $client->test->users;
        // if(isset($_FILES["photo"])){
        //     $photo_name = $_FILES["photo"]["name"];
        //     $photo_tmp_name = $_FILES["photo"]["tmp_name"];
        //     $photo_size = $_FILES["photo"]["size"];    
        // }

        if($_SERVER['REQUEST_METHOD']==='POST'){
            //store data in Mongo
           
            
            $phno = $_POST['phno'];
            $age = $_POST['age'];
            $dob = $_POST['dob'];
            $address = $_POST['address'];
            $district = $_POST['district'];
            $state = $_POST['state'];
            $country = $_POST['country'];
            $pin = $_POST['pin'];
            $mail = $_POST['email'];

            if($collection->count(["email" => $mail])){
                //update existing document
                $collection->updateOne(
                    ["email" => $mail],
                    ['$set' =>
                        [
                            "phno" => $phno,
                            "age" => $age,
                            "dob" => $dob,
                            "address" => $address,
                            "district" => $district,
                            "state" => $state,
                            "country" => $country,
                            "pin" => $pin
                        ]
                    ]
                );
            }else{
                //inser new document
                $collection->insertOne([
                    "email" => $mail,
                    "phno" => $phno,
                    "age" => $age,
                    "dob" => $dob,
                    "address" => $address,
                    "district" => $district,
                    "state" => $state,
                    "country" => $country,
                    "pin" => $pin
                ]);
            }
            
        }
        if($_SERVER['REQUEST_METHOD']==='GET'){
            //page got loaded return response
            $servername = "localhost";
            $username = "root";
            $dbpassword = "root";
            $dbname = "guvi";
            $emailid = "gokulrajan01234@gmail.com"; //temporary
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
            $sql = "select * from users where emailid = '$emailid'";
            $result = $conn->query($sql);
            if($result){
                if($result->num_rows > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $res_fullname = $row["firstname"];
                        $res_mail = $row["emailid"];
                        $res_pass = $row["password"];
                    }
                }
            }
            if($collection->count(["email" => $mail])){
                //TODO() load data from mongodb and update fields
            }
            header('Content-Type: application/json');
            $response = array(
                "fullname" => $res_fullname,
                "mail" => $res_mail,
                "password" => $res_pass
            );
            echo json_encode($response);
        }
        ?>