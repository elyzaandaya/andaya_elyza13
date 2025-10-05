<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-50 flex flex-col items-center py-10">

    <h1 class="text-3xl font-bold text-pink-700 mb-8">User Management System</h1>

    <!-- Search Form -->
    <form method="get" class="mb-6 flex gap-2">
        <input type="text" name="search" value="<?= html_escape($search ?? ''); ?>" placeholder="Search users..."
               class="px-4 py-2 border border-pink-300 rounded-xl focus:outline-none">
        <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded-xl hover:bg-pink-600">Search</button>
    </form>

    <!-- Add User Form -->
    <form method="post" action="<?= site_url('UsersController/store'); ?>" class="mb-8 flex gap-2">
        <input type="text" name="fname" placeholder="First Name" required class="px-3 py-2 border border-pink-300 rounded-xl">
        <input type="text" name="lname" placeholder="Last Name" required class="px-3 py-2 border border-pink-300 rounded-xl">
        <input type="email" name="email" placeholder="Email" required class="px-3 py-2 border border-pink-300 rounded-xl">
        <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded-xl hover:bg-pink-600">Add</button>
    </form>

    <!-- Table -->
    <div class="overflow-x-auto w-3/4 bg-white rounded-2xl shadow-md">
        <table class="min-w-full text-center border border-pink-200">
            <thead class="bg-pink-100 text-pink-700">
                <tr>
                    <th class="py-3 px-4">ID</th>
                    <th class="py-3 px-4">First Name</th>
                    <th class="py-3 px-4">Last Name</th>
                    <th class="py-3 px-4">Email</th>
                    <th class="py-3 px-4">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr class="hover:bg-pink-50 border-b">
                            <td class="py-3 px-4"><?= html_escape($user['id']); ?></td>
                            <td class="py-3 px-4"><?= html_escape($user['fname']); ?></td>
                            <td class="py-3 px-4"><?= html_escape($user['lname']); ?></td>
                            <td class="py-3 px-4"><?= html_escape($user['email']); ?></td>
                            <td class="py-3 px-4">
                                <a href="<?= site_url('UsersController/delete/'.$user['id']); ?>"
                                   onclick="return confirm('Are you sure?')"
                                   class="bg-pink-500 text-white px-3 py-1 rounded-xl hover:bg-pink-600">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5" class="py-3 text-gray-500">No users found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex justify-center gap-2">
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?= $i; ?>&search=<?= urlencode($search ?? ''); ?>"
               class="px-3 py-2 rounded-lg <?= $i == $page ? 'bg-pink-500 text-white' : 'bg-pink-200 hover:bg-pink-300'; ?>">
               <?= $i; ?>
            </a>
        <?php endfor; ?>
    </div>

</body>
</html>
