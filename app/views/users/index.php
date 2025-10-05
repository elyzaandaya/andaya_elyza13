<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-50 flex flex-col min-h-screen">

    <div class="container mx-auto px-6 py-10 flex-1">
        <h1 class="text-4xl font-extrabold text-center text-pink-600 mb-8">User Management</h1>

        <!-- Search Bar and Add Button -->
        <div class="flex justify-between mb-6">
            <form method="get" action="<?= site_url(); ?>" class="flex gap-2">
                <input 
                    type="text" 
                    name="q" 
                    placeholder="Search user..." 
                    value="<?= isset($_GET['q']) ? html_escape($_GET['q']) : ''; ?>"
                    class="border border-pink-300 rounded-lg px-4 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-pink-400">
                <button 
                    type="submit" 
                    class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg shadow">
                    🔍 Search
                </button>
            </form>

            <a href="<?= site_url('users/create'); ?>" 
               class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg shadow">
                ➕ Add User
            </a>
        </div>

        <!-- User Table -->
        <div class="overflow-x-auto shadow-lg rounded-lg bg-white">
            <table class="min-w-full border-collapse">
                <thead class="bg-pink-200 text-pink-900">
                    <tr>
                        <th class="py-3 px-4 text-left font-semibold">ID</th>
                        <th class="py-3 px-4 text-left font-semibold">First Name</th>
                        <th class="py-3 px-4 text-left font-semibold">Last Name</th>
                        <th class="py-3 px-4 text-left font-semibold">Email</th>
                        <th class="py-3 px-4 text-center font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-base">
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <?php
                                // Handle both arrays & objects safely
                                $id = is_array($user) ? ($user['id'] ?? '') : ($user->id ?? '');
                                $fname = is_array($user) ? ($user['fname'] ?? '') : ($user->fname ?? '');
                                $lname = is_array($user) ? ($user['lname'] ?? '') : ($user->lname ?? '');
                                $email = is_array($user) ? ($user['email'] ?? '') : ($user->email ?? '');
                            ?>
                            <tr class="hover:bg-pink-50 transition duration-200 border-b">
                                <td class="py-3 px-4 font-medium"><?= html_escape($id); ?></td>
                                <td class="py-3 px-4"><?= html_escape($fname); ?></td>
                                <td class="py-3 px-4"><?= html_escape($lname); ?></td>
                                <td class="py-3 px-4"><?= html_escape($email); ?></td>
                                <td class="py-3 px-4 flex justify-center gap-3">
                                    <a href="<?= site_url('users/update/' . $id); ?>"
                                       class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded-xl shadow">
                                       ✏️ Edit
                                    </a>
                                    <a href="<?= site_url('users/delete/' . $id); ?>"
                                       onclick="return confirm('Are you sure you want to delete this user?');"
                                       class="bg-red-400 hover:bg-red-500 text-white px-3 py-1 rounded-xl shadow">
                                       🗑️ Delete
                                    </a>
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

        <!-- Pagination -->
        <div class="mt-6 text-center">
            <?php if (!empty($page)): ?>
                <div class="inline-block bg-white px-4 py-2 rounded-lg shadow">
                    <?= $page; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <footer class="bg-pink-200 py-4 text-center text-pink-800 text-sm shadow-inner">
        LavaLust Framework – 2025 | Styled with 💖 by Elyza
    </footer>

</body>
</html>
