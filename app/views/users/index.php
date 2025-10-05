<!DOCTYPE html>
<html>
<head>
    <title>Users Management</title>
    <style>
        body {
            background-color: #ffe6f0;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px pink;
        }
        th, td {
            border: 1px solid pink;
            padding: 10px;
        }
        th {
            background-color: #ffb6c1;
        }
        a, button {
            background-color: #ff69b4;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 8px;
            text-decoration: none;
        }
        a:hover, button:hover {
            background-color: #ff1493;
        }
        input[type="text"] {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid pink;
        }
    </style>
</head>
<body>
    <h1>💖 User Management System 💖</h1>
    <form method="get">
        <input type="text" name="q" value="<?= htmlspecialchars($q) ?>" placeholder="Search name/email...">
        <button type="submit">Search</button>
        <a href="/users/add">Add New</a>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach($users as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= $u['fname'] ?></td>
            <td><?= $u['lname'] ?></td>
            <td><?= $u['email'] ?></td>
            <td>
                <a href="/users/edit/<?= $u['id'] ?>">Edit</a>
                <a href="/users/delete/<?= $u['id'] ?>" onclick="return confirm('Delete this user?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
