
<?php
    require '../vendor/autoload.php';   
    use MongoDB\Driver\ServerApi;
    $serverApi = new ServerApi(ServerApi::V1);
    $client = new MongoDB\Client(
    'mongodb+srv://sudharshan:sgr200110@cluster0.hmu0ajt.mongodb.net/?retryWrites=true&w=majority', [], ['serverApi' => $serverApi]);
    $collection = $client->test->users;
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
        
    ?>