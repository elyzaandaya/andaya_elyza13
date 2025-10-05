<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-pink-50 flex justify-center items-center min-h-screen">

    <div class="bg-white shadow-2xl rounded-2xl p-8 w-11/12 md:w-3/4 lg:w-2/3">
        <h1 class="text-3xl font-bold text-center text-pink-600 mb-8">👩‍💼 User Management</h1>

        <!-- Search Bar -->
        <form method="GET" action="<?= site_url(); ?>" class="flex justify-center mb-6">
            <input type="text" name="q" placeholder="Search user..." 
                   class="w-1/2 px-4 py-2 border border-pink-300 rounded-l-xl focus:outline-none focus:ring-2 focus:ring-pink-400"
                   value="<?= isset($_GET['q']) ? html_escape($_GET['q']) : ''; ?>">
            <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-r-xl shadow">
                🔍 Search
            </button>
        </form>

        <!-- Add Button -->
        <div class="flex justify-end mb-4">
            <a href="<?= site_url('users/create'); ?>" 
               class="bg-green-400 hover:bg-green-500 text-white px-4 py-2 rounded-xl shadow flex items-center gap-2">
               ➕ Add New User
            </a>
        </div>

        <!-- User Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-pink-200 rounded-xl shadow">
                <thead class="bg-pink-100 text-pink-700 uppercase text-sm font-semibold">
                    <tr>
                        <th class="py-3 px-4 text-left">ID</th>
                        <th class="py-3 px-4 text-left">First Name</th>
                        <th class="py-3 px-4 text-left">Last Name</th>
                        <th class="py-3 px-4 text-left">Email</th>
                        <th class="py-3 px-4 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700 text-base">
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr class="hover:bg-pink-50 transition duration-200">
                                <td class="py-3 px-4 font-medium"><?= $user->id; ?></td>
                                <td class="py-3 px-4"><?= $user->fname; ?></td>
                                <td class="py-3 px-4"><?= $user->lname; ?></td>
                                <td class="py-3 px-4"><?= $user->email; ?></td>
                                <td class="py-3 px-4 flex justify-center gap-3">
                                    <a href="<?= site_url('users/update/' . $user->id); ?>"
                                       class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded-xl shadow">
                                       ✏️ Edit
                                    </a>
                                    <a href="<?= site_url('users/delete/' . $user->id); ?>"
                                       class="bg-red-400 hover:bg-red-500 text-white px-3 py-1 rounded-xl shadow"
                                       onclick="return confirm('Are you sure you want to delete this user?');">
                                       🗑 Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">
                                No users found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6 text-center">
            <?= isset($page) ? $page : ''; ?>
        </div>
    </div>

</body>
</html>
