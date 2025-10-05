<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <style>
        body { background-color: #ffe6f0; text-align: center; font-family: Arial; }
        form { display: inline-block; margin-top: 50px; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px pink; }
        input { margin: 10px; padding: 8px; border: 1px solid pink; border-radius: 5px; }
        button { background-color: #ff69b4; border: none; padding: 10px 15px; color: white; border-radius: 8px; }
    </style>
</head>
<body>
    <h2>Add New User</h2>
    <form method="POST">
        <input type="text" name="fname" placeholder="First Name" required><br>
        <input type="text" name="lname" placeholder="Last Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <button type="submit">Save</button>
        <a href="/">Back</a>
    </form>
</body>
</html>
