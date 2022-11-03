<html>
    <body>
    <?php
        $fullname = $_POST['name'];
        $emailid = $_POST['emailid'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $phno = $_POST['phno'];

        
        $servername = "sql12.freesqldatabase.com";
        $username = "sql12539150";
        $dbpassword = "MNjYKH611h";
        $dbname = "sql12539150";
        // Create connection
        $conn = mysqli_connect($servername, $username, $dbpassword, $dbname);

        // Check connection
        if (!$conn) {
            echo "<script>alert('Connection failed');</script>";
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = $conn->prepare(
            "insert into users(firstname,emailid,gender,password,phno) values(?,?,?,?,?)"
        );

        $jsonName = array(array(
            'firstname' => $fullname,
            'gender' => $gender,
            'email' => $emailid,
            'phno' => $phno
        ));

        $stmt->bind_param("sssss",$fullname,$emailid,$gender,$password,$phno);
        $stmt->execute();
        $stmt->close();
        
        $select = "select * from users";
        $result = $conn->query($select);
        $data = $result->fetch_all(MYSQLI_ASSOC);
        file_put_contents("myfiles.json", json_encode($data));

        $conn->close();
        ?>
    </body>
</html>
