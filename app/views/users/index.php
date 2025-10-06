<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Directory</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #f9fafb, #e0f2fe);
    }
  </style>
</head>
<body class="min-h-screen">

  <!-- Header -->
  <nav class="bg-white shadow-md border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
        <i class="fa-solid fa-graduation-cap text-blue-500"></i> Student Directory
      </h1>
    </div>
  </nav>

  <!-- Content -->
  <div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-200">

      <!-- Top Actions -->
      <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <!-- Search Bar -->
        <form method="get" action="<?=site_url()?>" class="flex w-full md:w-auto">
          <input 
            type="text" 
            name="q" 
            value="<?=html_escape($_GET['q'] ?? '')?>" 
            placeholder="Search by name or email..." 
            class="px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-400 w-full md:w-64 bg-gray-100">
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r-md transition">
            <i class="fa fa-search"></i>
          </button>
        </form>

        <!-- Add Button -->
        <a href="<?=site_url('users/create')?>" class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-semibold px-5 py-2 rounded-md shadow transition">
          <i class="fa-solid fa-user-plus"></i> Add Student
        </a>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto rounded-xl border border-gray-200 shadow">
        <table class="w-full text-left border-collapse">
          <thead class="bg-blue-500 text-white">
            <tr>
              <th class="py-3 px-4">#</th>
              <th class="py-3 px-4">Full Name</th>
              <th class="py-3 px-4">Email</th>
              <th class="py-3 px-4 text-center">Actions</th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
            <?php if(!empty($users)): ?>
              <?php foreach(html_escape($users) as $user): ?>
                <tr class="border-b hover:bg-blue-50 transition">
                  <td class="py-3 px-4"><?=($user['id']);?></td>
                  <td class="py-3 px-4"><?=($user['first_name'] . ' ' . $user['last_name']);?></td>
                  <td class="py-3 px-4"><?=($user['email']);?></td>
                  <td class="py-3 px-4 flex justify-center gap-2">
                    <a href="<?=site_url('users/update/'.$user['id']);?>" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-full transition">
                      <i class="fa-solid fa-pen"></i>
                    </a>
                    <a href="<?=site_url('users/delete/'.$user['id']);?>" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full transition">
                      <i class="fa-solid fa-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="4" class="py-4 text-center text-gray-500">No students found.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-6 flex justify-center">
        <div class="flex gap-2">
          <?php
            if (!empty($page)) {
              echo str_replace(
                ['<a ', '<strong>', '</strong>'],
                [
                  '<a class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition"',
                  '<span class="px-4 py-2 bg-gray-800 text-white rounded-full">',
                  '</span>'
                ],
                $page
              );
            }
          ?>
        </div>
      </div>

    </div>
  </div>

</body>
</html>
