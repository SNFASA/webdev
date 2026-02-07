<?php
include 'backend.php'; // This should contain your logic to fetch $row based on edit_id
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <button onclick="history.back()">Go Back</button>
    <h1>Edit User Data</h1>

    <form action="edit.php?edit_id=<?php echo $edit_id; ?>" method="POST">
        
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?php echo $row['username'] ?? ''; ?>" required />

        <label for="firstname">First Name</label>
        <input type="text" id="firstname" name="firstname" value="<?php echo $row['firstname'] ?? ''; ?>" required />

        <label for="lastname">Last Name</label>
        <input type="text" id="lastname" name="lastname" value="<?php echo $row['lastname'] ?? ''; ?>" required />

        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" value="<?php echo $row['phone'] ?? ''; ?>" required />

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email'] ?? ''; ?>" required />

        <label for="password">New Password (leave blank to keep current)</label>
        <input type="password" id="password" name="password" placeholder="Enter new password" />

        <input type="submit" value="Update Record" />
    </form>
</body>
</html>