<html>
    <body>
        <?php
        $emailid = $_POST['emailid'];
        $password = $_POST['password'];


        $servername = "sql12.freesqldatabase.com";
        $username = "sql12539150";
        $dbpassword = "MNjYKH611h";
        $dbname = "sql12539150";

        // Create connection
        $conn = new mysqli($servername, $username, $dbpassword, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, emailid, password FROM users";
        $result = $conn->query($sql);
        $success = false;

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row['emailid'] == $emailid){
                    if($row['password'] == $password){
                        $success = true;
                    }
                }
            }
        }
        $conn->close();
        if($success == false){
            header('HTTP/1.1 500 Internal Server');
            header('Content-Type: application/json; charset=UTF-8');
            die(500);
        }
        ?>
    </body>
</html>