<?php
// MySQLi connection method
$host = "localhost";
$user = "root";
$password = "";
$dbname = "db";

$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn){
    die("Connection failed:".mysqli_connect_error());
}

/* PDO method DB connection
try{ 
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}catch(PDOException $e){
    echo "Connection failed:" . $e -> getMessage();
}
*/

if ( $_SERVER["REQUEST_METHOD"] == "POST"){ // check if form is submitted
    // cupture data from form
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    
    /*simple way
    $sql = "INSERT INTO user (username, firstname, lastname, phone, email, password)VALUES('$username', '$firstname', '$lastname', '$phone', '$email', '$password')";
    $result = mysqli_query($conn, $sql);
    */
    // safer untuk elak sql injection
    $sql = $conn->prepare("INSERT INTO user (username, firstname, lastname, phone, email, password) VALUES (?, ?, ?, ?, ?, ?)");
    $sql->bind_param("ssssss", $username, $firstname, $lastname, $phone, $email, $password);
    $result = $sql->execute();
    
    if($result){
        echo"<script>
                alert('New record created successfully!');
                window.location.href='index.php'; // Redirect back to form
            </script>";
    }else{
        echo "Error: ". $sql ."<br>". mysqli_error($conn);
    }
}


