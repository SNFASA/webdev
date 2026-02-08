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
// 2. Capture URL Parameters (GET)
$edit_id = $_GET['edit_id'] ?? '';
$delete_id = $_GET['delete_id'] ?? '';

// 3. HANDLE DELETE ACTION
if (!empty($delete_id)) {
    // Sanitize input to prevent SQL Injection
    $delete_id = mysqli_real_escape_string($conn, $delete_id);
    $sql = "DELETE FROM user WHERE id = '$delete_id'";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Record deleted successfully!');
                window.location.href='index.php';
              </script>";
        exit();
    } else {
        echo "Error deleting: " . mysqli_error($conn);
    }
}

// 4. HANDLE FORM SUBMISSIONS (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Capture and Sanitize form data
    $username  = mysqli_real_escape_string($conn, $_POST['username']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname  = mysqli_real_escape_string($conn, $_POST['lastname']);
    $phone     = mysqli_real_escape_string($conn, $_POST['phone']);
    $email     = mysqli_real_escape_string($conn, $_POST['email']);

    // --- CASE A: UPDATE (If edit_id is present) ---
    if (!empty($edit_id)) {
        
        // Check if password was changed
        if (!empty($_POST['password'])) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $query = "UPDATE user SET username='$username', firstname='$firstname', lastname='$lastname', phone='$phone', email='$email', password='$password' WHERE id='$edit_id'";
        } else {
            $query = "UPDATE user SET username='$username', firstname='$firstname', lastname='$lastname', phone='$phone', email='$email' WHERE id='$edit_id'";
        }

        if (mysqli_query($conn, $query)) {
            echo "<script>
                    alert('Record updated successfully!');
                    window.location.href='index.php';
                  </script>";
            exit();
        } else {
            echo "Update Error: " . mysqli_error($conn);
        }
    } 
    
    // --- CASE B: INSERT (If no edit_id is present) ---
    else {

        // simple way insert 
        /*$sql = "INSERT INTO user (username, firstname, lastname, phone, email, password) VALUES ('$username', '$firstname', '$lastname', '$phone', '$email', '".password_hash($_POST['password'], PASSWORD_DEFAULT)."')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('New record created successfully!');
                    window.location.href='index.php';
                  </script>";
            exit();
        } else {
            echo "Insert Error: " . mysqli_error($conn);
        }
        */
        // PDO way insert
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO user (username, firstname, lastname, phone, email, password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $username, $firstname, $lastname, $phone, $email, $password);
        
        if ($stmt->execute()) {
            echo "<script>
                    alert('New record created successfully!');
                    window.location.href='index.php';
                  </script>";
            exit();
        } else {
            echo "Insert Error: " . $stmt->error;
        }
    }
}

// 5. FETCH DATA FOR EDIT FORM (If edit_id is present)
// This part is used by edit.php to populate the input values
$row = null;
if (!empty($edit_id)) {
    $fetch_sql = "SELECT * FROM user WHERE id = '" . mysqli_real_escape_string($conn, $edit_id) . "'";
    $fetch_result = mysqli_query($conn, $fetch_sql);
    $row = mysqli_fetch_assoc($fetch_result);
}


/**
 * GET - Retrieve data from the server
 * POST - Send data to the server to create/update a resource
 * PUT - Update a resource on the server
 * DELETE - Delete a resource on the server
 * PATCH - Partially update a resource on the server
 * HEAD - Retrieve metadata from the server
 * OPTIONS - Describe the communication options for the target resource
 * CONNECT - Establish a tunnel to the server
 * TRACE - Perform a message loop-back test along the path to the target resource
 */


/**
 * Multidimensional Array - An array containing one or more arrays
 * 
 */
$cars = [
    ["Volvo", 22, 18],
    ["BMW", 15, 13],
    ["Saab", 5, 2],
    ["Land Rover", 17, 15],
];
// Accessing array using indexes
echo $cars[0][0]."In stock: ".$cars[0][1].", sold: ".$cars[0][2]."<br/>";
echo $cars[1][0]."In stock: ".$cars[1][1].", sold: ".$cars[1][2]."<br/>";
echo $cars[2][0]."In stock: ".$cars[2][1].", sold: ".$cars[2][2]."<br/>";
echo $cars[3][0]."In stock: ".$cars[3][1].", sold: ".$cars[3][2]."<br/>";


//accessing array using loops
for ($row = 0; $row < count($cars); $row++){
    echo "<p><b>row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < count($cars[$row]); $col++){
        echo "<li>".$cars[$row][$col]."</li>";
    }
    echo "</ul>";
}


?>

