<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-pink-50 flex flex-col items-center py-10">

    <h1 class="text-3xl font-bold text-pink-600 mb-6">User Management</h1>

    <div class="flex justify-between items-center w-11/12 max-w-5xl mb-4">
        <form method="get" action="/" class="flex space-x-2">
            <input type="text" name="search" placeholder="Search user..."
                   class="border rounded-lg px-3 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-pink-400" />
            <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1116.65 16.65z" /></svg>
                Search
            </button>
        </form>

        <a href="/users/add" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                 d="M12 4v16m8-8H4" /></svg>
            Add User
        </a>
    </div>

    <div class="overflow-hidden rounded-2xl shadow-lg w-11/12 max-w-5xl bg-white">
        <table class="min-w-full text-center border-collapse">
            <thead class="bg-pink-200 text-pink-700">
                <tr>
                    <th class="py-3 px-4 border-b">ID</th>
                    <th class="py-3 px-4 border-b">First Name</th>
                    <th class="py-3 px-4 border-b">Last Name</th>
                    <th class="py-3 px-4 border-b">Email</th>
                    <th class="py-3 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <?php
                            // ✅ Compatible sa array or object
                            $id = is_array($user) ? ($user['id'] ?? '') : ($user->id ?? '');
                            // ❗ Palitan ang column name depende sa database mo
                            $fname = is_array($user) ? ($user['fname'] ?? $user['first_name'] ?? '') : ($user->fname ?? $user->first_name ?? '');
                            $lname = is_array($user) ? ($user['lname'] ?? $user['last_name'] ?? '') : ($user->lname ?? $user->last_name ?? '');
                            $email = is_array($user) ? ($user['email'] ?? '') : ($user->email ?? '');
                        ?>
                        <tr class="hover:bg-pink-50 transition duration-200 border-b">
                            <td class="py-3 px-4 font-medium"><?= html_escape($id); ?></td>
                            <td class="py-3 px-4"><?= html_escape($fname); ?></td>
                            <td class="py-3 px-4"><?= html_escape($lname); ?></td>
                            <td class="py-3 px-4"><?= html_escape($email); ?></td>
                            <td class="py-3 px-4">
                                <a href="/users/edit/<?= $id; ?>" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5h2m-1 0v14m-7-7h14" />
                                    </svg> Edit
                                </a>
                                <a href="/users/delete/<?= $id; ?>" onclick="return confirm('Are you sure you want to delete this user?')"
                                   class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg inline-flex items-center ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12" />
                                    </svg> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="py-4 text-gray-500">No users found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <?= $pager->links() ?? ''; ?>
    </div>

</body>
</html>
