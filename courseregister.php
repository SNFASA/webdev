<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "course_registration_db";

$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn){
    die("Connection failed:".mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentname = $_POST['student_name'];
    $coursename = $_POST['course_name'];

    $sql = "INSERT INTO course_registrations (student_name, course_name) VALUES ('$studentname', '$coursename')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Course registration successful!');
                window.location.href='courseregister.php';
              </script>";
        exit();
    } else {
        echo "Registration Error: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>