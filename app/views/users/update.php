<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Info</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-indigo-800 via-purple-900 to-black min-h-screen flex items-center justify-center font-serif text-white">

  <!-- Background Stars -->
  <div class="absolute inset-0 bg-cover bg-fixed bg-center z-0">
    <div class="bg-black opacity-60 w-full h-full"></div>
  </div>

  <!-- Main Card -->
  <div class="relative z-10 bg-black/40 backdrop-blur-xl p-10 rounded-3xl shadow-2xl w-full max-w-md animate-fadeIn border border-gray-700">

    <h2 class="text-3xl font-semibold text-center text-white mb-8">Update Info</h2>

    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST" class="space-y-6">
      <div>
        <label class="block text-gray-200 mb-2">First Name</label>
        <input type="text" name="first_name" value="<?= html_escape($user['first_name'])?>" required
               class="w-full px-5 py-3 bg-black/30 text-gray-200 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none shadow-md transition duration-300">
      </div>

      <div>
        <label class="block text-gray-200 mb-2">Last Name</label>
        <input type="text" name="last_name" value="<?= html_escape($user['last_name'])?>" required
               class="w-full px-5 py-3 bg-black/30 text-gray-200 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none shadow-md transition duration-300">
      </div>

      <div>
        <label class="block text-gray-200 mb-2">Email Address</label>
        <input type="email" name="email" value="<?= html_escape($user['email'])?>" required
               class="w-full px-5 py-3 bg-black/30 text-gray-200 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none shadow-md transition duration-300">
      </div>

      <button type="submit"
              class="w-full bg-gradient-to-r from-teal-500 to-indigo-500 hover:from-indigo-600 hover:to-teal-600 text-white font-semibold py-4 rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105">
        Update  
      </button>
    </form>
  </div>
</body>
</html>
