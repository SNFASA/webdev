<?php
//Q42
// 1. Initialize the array
$color = array('white', 'green', 'red');

// 2. First loop: Display colors in a single line separated by commas
foreach ($color as $c) {
    echo "$c, ";
}

// 3. Sort the array alphabetically
sort($color);

// 4. Start the unordered list
echo "<ul>";

// 5. Second loop: Display sorted colors as list items
foreach ($color as $y) {
    echo "<li>$y</li>";
}

// 6. Close the unordered list
echo "</ul>";


//Q43 create database 
/**
 * CREATE DATABASE IF NOT EXISTS Subject_Registration_System;
 * USE Subject_Registration_System;
 * 
 * CREATE TABLE IF NOT EXISTS Students(
 *     StudentID INT PRIMARY KEY AUTO_INCREMENT,
 *     StudentName VARCHAR(100) NOT NULL,
 *     CourseName VARCHAR(100) NOT NULL,
 *     Email VARCHAR(255) NOT NULL,
 *     Password VARCHAR(255) NOT NULL
 * );
 * 
 * DELETE FROM Students WHERE Id = A1001;
 * 
 */

$host = "localhost";
$username= "root";
$password ="p@55w0rd";
$dbname = "registration";

$conn = new mysqli($host, $username, $password, $dbname);
if($conn -> connect_error){
    echo "Connection failed:" .$conn -> connect_error;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $StudentID = $_POST['StudentID'];
    $name = $_POST['name'];
    $ic = $_POST['IdentiticationNumber'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    $sqlCheck = "SELECT * FROM Students WHERE StudentID = $StudentID";
    $stmt = $conn -> prepare($sqlCheck);
    $stmt ->bind_param("s", $StudentID);
    $stmt -> execute();
    $result = $stmt -> get_result();

    if($result -> num_rows > 0){
        echo "<script>
            alert('Student ID already exists. Please check and try again.');
            window.location.href='registration.php';
        </script>";
    }else{
        $sql = "INSERT INTO Students(StudentID, name, IdentiticationNumber, phone, address, email) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = $conn -> prepare($sql);
        $stmt -> bind_param("ssssss", $StudentID, $name, $ic, $phone, $address, $email);
        $stmt -> execute();
        if($stmt -> execute()){
            echo "<script>
                alert('Registration successful!');
                window.location.href='registration.php';
            </script>";
            exit();
        }else{
            echo "Registration Error: " . $stmt -> error;
        }
        $stmt -> close();
    }
}
$conn -> close();