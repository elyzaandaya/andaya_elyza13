<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="<?=base_url();?>public/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-indigo-800 via-purple-900 to-black h-screen font-serif text-white">

  <!-- Navbar -->
  <nav class="bg-gradient-to-r from-indigo-800 to-purple-800 shadow-lg z-10 relative">
    <div class="max-w-7xl mx-auto px-6 py-4">
      <h1 class="text-3xl text-white">User Directory</h1>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-6xl mx-auto mt-10 px-4 z-10 relative">
    
    <!-- Add New User Button -->
    <div class="flex justify-end mb-6">
      <a href="<?=site_url('users/create')?>"
          class="inline-flex items-center gap-2 bg-transparent border-2 border-teal-500 text-teal-500 font-semibold px-5 py-3 rounded-lg hover:bg-teal-500 hover:text-white shadow-lg transition-all duration-300">
          <i class="fa-solid fa-user-plus"></i> Add New User
      </a>

    </div>

    <!-- User Table -->
    <div class="overflow-x-auto bg-black/50 backdrop-blur-lg rounded-lg shadow-lg p-6">
      <table class="w-full text-center text-sm text-gray-200 border-collapse">
        <thead class="bg-gradient-to-r from-indigo-700 to-purple-700">
          <tr>
            <th class="py-3 px-4 font-semibold text-white">ID</th>
            <th class="py-3 px-4 font-semibold text-white">First Name</th>
            <th class="py-3 px-4 font-semibold text-white">Last Name</th>
            <th class="py-3 px-4 font-semibold text-white">Email</th>
            <th class="py-3 px-4 font-semibold text-white">Actions</th>
          </tr>
        </thead>
        <tbody class="bg-black/30">
          <?php foreach(html_escape($users) as $user): ?>
            <tr class="hover:bg-indigo-600 transition duration-200">
              <td class="py-3 px-4"><?=($user['id']);?></td>
              <td class="py-3 px-4"><?=($user['first_name']);?></td>
              <td class="py-3 px-4"><?=($user['last_name']);?></td>
              <td class="py-3 px-4"><?=($user['email']);?></td>
              <td class="py-3 px-4 flex justify-center gap-4">
                <!-- Update Button (Transparent) -->
                <a href="<?=site_url('users/update/'.$user['id']);?>" 
                   class="inline-flex items-center gap-1 bg-transparent border-2 border-yellow-500 text-yellow-500 font-medium px-4 py-2 rounded-lg hover:bg-yellow-500 hover:text-white transition duration-300">
                   <i class="fa-solid fa-pen-to-square text-lg"></i>
                   Update
                </a>
                
                <!-- Delete Button (Transparent) -->
                <a href="<?=site_url('users/delete/'.$user['id']);?>" 
                   class="inline-flex items-center gap-1 bg-transparent border-2 border-red-500 text-red-500 font-medium px-4 py-2 rounded-lg hover:bg-red-500 hover:text-white transition duration-300">
                   <i class="fa-solid fa-trash text-lg"></i>
                   Delete
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
