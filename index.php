<?php
include 'backend.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Sample HTML Document</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <h1>Welcome to the Sample HTML Document</h1>
    <p>This is a simple HTML document structure with linked CSS and JavaScript files.</p>

    <form action = "backend.php" method = "POST">
        <label for = "username">Username</label>
        <input type="text" id= "username" name = "username" required /><br/>

        <label for="fristname"> First Name</label>
        <input type="text" id="firstname" name="firstname" required /><br/>

        <label for="lastname"> last Name</label>
        <input type = "text" id="lastname" name="lastname" required/><br/>

        <label for="phone">Number Phone</label>
        <input type ="tel" id ="phone" name="phone" required/><br/>

        <label for="email"> Email</label>
        <input type="email" id = "email" name = "email" required/><br/>

        <label for="password">Password</label>
        <input type="password" id= "password" name="password" required/><br/>

        <input type="submit" value="Submit"/>
    </form>

    <h2> Data User</h2>
    <table>
        <tr>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = "SELECT * FROM user";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                        <td>".$row['username']."</td>
                        <td>".$row['firstname']."</td>
                        <td>".$row['lastname']."</td>
                        <td>".$row['phone']."</td>
                        <td>".$row['email']."</td>
                        <td>
                            <a href='edit.php?edit_id=".$row['id']."' class='btn-edit'>Edit</a> |
                            <a href='backend.php?delete_id=".$row['id']."' class='btn-delete' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>
                            </td>
                    </tr>";
            }
        }else{
            echo "<tr><td colspan='6'>No records found</td></tr>";
        }
        ?>
    </table>
    <button id="clickMeBtn">Click Me</button> <!-- using Event Listener (id) -->
    <button onclick="ConfirmBtn()">Confirmation button</button> <!-- Event Handling -->
    <button id="promtsBtn">Prompts Button</button>
    <script>
        // Click me button
        const button = document.getElementById("clickMeBtn");
        button.addEventListener("click", function() {
            alert("Button was clicked!");
        });

        // Confirmation button
        function ConfirmBtn(){
            const userResponse = confirm("Do you want to proceed?");
            if (userResponse){
                alert("You chose to proceed.");
            } else {
                alert("You canceled the action.");
            }
        }

        const button2 = document.getElementById("promtsBtn");
        button2.addEventListener("click", function(){
            const userInput = prompt("Please enter your name:");
            alert("Hello, " + userInput + "!");
        })
    </script>

</body>
</html>