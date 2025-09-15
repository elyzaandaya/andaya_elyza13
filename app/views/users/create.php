<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-indigo-800 via-purple-900 to-black min-h-screen flex items-center justify-center font-serif text-white">

  <!-- Background Stars -->
  <div class="absolute inset-0 bg-cover bg-fixed bg-center z-0">
    <div class="bg-black opacity-50 w-full h-full"></div>
  </div>

  <!-- Main Card -->
  <div class="relative z-10 bg-black/40 backdrop-blur-xl p-10 rounded-3xl shadow-2xl w-full max-w-lg animate-fadeIn border border-gray-700">

    <!-- Header -->
    <div class="flex flex-col items-center mb-8">
      <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full p-6 shadow-xl">
        <i class="fa-solid fa-moon text-white text-4xl"></i>
      </div>
      <h2 class="text-3xl font-bold text-white mt-4">Add Account</h2>
    </div>

    <!-- Form -->
    <form action="<?=site_url('users/create')?>" method="POST" class="space-y-6">
      
      <!-- First Name -->
      <div>
        <label class="block text-gray-200 mb-2 font-medium">First Name</label>
        <input type="text" name="first_name" placeholder="Enter your first name" required
               class="w-full px-5 py-3 bg-black/30 text-gray-200 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none shadow-lg transition duration-300">
      </div>

      <!-- Last Name -->
      <div>
        <label class="block text-gray-200 mb-2 font-medium">Last Name</label>
        <input type="text" name="last_name" placeholder="Enter your last name" required
               class="w-full px-5 py-3 bg-black/30 text-gray-200 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none shadow-lg transition duration-300">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-gray-200 mb-2 font-medium">Email Address</label>
        <input type="email" name="email" placeholder="Enter your email" required
               class="w-full px-5 py-3 bg-black/30 text-gray-200 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none shadow-lg transition duration-300">
      </div>

      <!-- Submit Button -->
      <button type="submit"
              class="w-full bg-gradient-to-r from-teal-500 to-indigo-500 hover:from-indigo-600 hover:to-teal-600 text-white font-semibold py-4 rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105">
        <i class="fa-solid fa-user-plus mr-2"></i> Add
      </button>
    </form>
  </div>
</body>
</html>
