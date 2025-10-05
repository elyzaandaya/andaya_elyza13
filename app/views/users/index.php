<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-pink-50 font-sans">
    <div class="container mx-auto mt-10 px-4">
        <h1 class="text-3xl font-bold text-center text-pink-600 mb-6">User Management</h1>

        <div class="flex justify-between items-center mb-4">
            <form method="GET" action="<?= site_url(); ?>" class="flex space-x-2">
                <input type="text" name="q" placeholder="Search user..." value="<?= isset($_GET['q']) ? html_escape($_GET['q']) : ''; ?>" class="px-3 py-2 border rounded-lg w-64 focus:ring-pink-300 focus:border-pink-400">
                <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg shadow">🔍 Search</button>
            </form>

            <a href="<?= site_url('users/create'); ?>" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg shadow flex items-center">
                ➕ Add User
            </a>
        </div>

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="min-w-full text-left border-collapse">
                <thead class="bg-pink-200">
                    <tr>
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">First Name</th>
                        <th class="py-3 px-4">Last Name</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-base">
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <?php
                                $id = $user['id'] ?? '';
                                $fname = $user['fname'] ?? '';
                                $lname = $user['lname'] ?? '';
                                $email = $user['email'] ?? '';
                            ?>
                            <tr class="hover:bg-pink-50 transition duration-200 border-b">
                                <td class="py-3 px-4 font-medium"><?= html_escape($id); ?></td>
                                <td class="py-3 px-4"><?= html_escape($fname); ?></td>
                                <td class="py-3 px-4"><?= html_escape($lname); ?></td>
                                <td class="py-3 px-4"><?= html_escape($email); ?></td>
                                <td class="py-3 px-4 flex justify-center gap-3">
                                    <a href="<?= site_url('users/update/' . $id); ?>" class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded-xl shadow">✏️ Edit</a>
                                    <a href="<?= site_url('users/delete/' . $id); ?>" class="bg-red-400 hover:bg-red-500 text-white px-3 py-1 rounded-xl shadow" onclick="return confirm('Delete this user?');">🗑 Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">No users found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if (!empty($pager)): ?>
            <div class="mt-6 flex justify-center">
                <?= $pager; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
