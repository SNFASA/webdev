<?php
include 'backend.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Sample HTML Document</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="script.js"></script>
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
</body>
</html>