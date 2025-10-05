<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
    <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body style="background-color: #ffe6f2; font-family: Arial;">
    <div style="max-width: 900px; margin: 50px auto; background: #fff0f6; padding: 20px; border-radius: 12px; box-shadow: 0 0 10px #f8cde0;">
        <h2 style="text-align:center; color:#e75480;">User Management</h2>

        <form method="GET" style="text-align:center; margin-bottom: 15px;">
            <input type="text" name="search" value="<?= $search ?>" placeholder="Search name..." style="padding:5px;">
            <button type="submit" style="background:#e75480; color:white; border:none; padding:6px 10px; border-radius:5px;">Search</button>
            <button type="button" onclick="openModal()" style="background:#ff99c8; color:white; border:none; padding:6px 10px; border-radius:5px;">+ Add User</button>
        </form>

        <table border="1" width="100%" style="border-collapse:collapse; text-align:center;">
            <thead style="background-color:#ffcce0;">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $u): ?>
                <tr>
                    <td><?= $u['id'] ?></td>
                    <td><?= htmlspecialchars($u['fname']) ?></td>
                    <td><?= htmlspecialchars($u['lname']) ?></td>
                    <td><?= htmlspecialchars($u['email']) ?></td>
                    <td>
                        <button onclick="editUser(<?= $u['id'] ?>, '<?= $u['fname'] ?>', '<?= $u['lname'] ?>', '<?= $u['email'] ?>')" style="background:#ff99c8; color:white; border:none; padding:5px 10px;">Edit</button>
                        <a href="/UsersController/delete/<?= $u['id'] ?>" style="background:#ff4d6d; color:white; border:none; padding:5px 10px; border-radius:5px; text-decoration:none;">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- MODAL FORM -->
    <div id="userModal" style="display:none; position:fixed; top:0; left:0; right:0; bottom:0; background:rgba(0,0,0,0.4); justify-content:center; align-items:center;">
        <form method="POST" action="/UsersController/save" style="background:#fff; padding:20px; border-radius:10px; width:300px;">
            <h3 style="color:#e75480; text-align:center;">Add/Edit User</h3>
            <input type="hidden" name="id" id="userId">
            <input type="text" name="fname" id="fname" placeholder="First Name" required style="width:100%; margin:5px 0; padding:5px;"><br>
            <input type="text" name="lname" id="lname" placeholder="Last Name" required style="width:100%; margin:5px 0; padding:5px;"><br>
            <input type="email" name="email" id="email" placeholder="Email" required style="width:100%; margin:5px 0; padding:5px;"><br>
            <div style="text-align:center;">
                <button type="submit" style="background:#e75480; color:white; border:none; padding:5px 10px; border-radius:5px;">Save</button>
                <button type="button" onclick="closeModal()" style="background:#999; color:white; border:none; padding:5px 10px; border-radius:5px;">Cancel</button>
            </div>
        </form>
    </div>

    <script>
        const modal = document.getElementById('userModal');
        function openModal() {
            document.getElementById('userId').value = '';
            document.getElementById('fname').value = '';
            document.getElementById('lname').value = '';
            document.getElementById('email').value = '';
            modal.style.display = 'flex';
        }
        function closeModal() {
            modal.style.display = 'none';
        }
        function editUser(id, fname, lname, email) {
            document.getElementById('userId').value = id;
            document.getElementById('fname').value = fname;
            document.getElementById('lname').value = lname;
            document.getElementById('email').value = email;
            modal.style.display = 'flex';
        }
    </script>
</body>
</html>
