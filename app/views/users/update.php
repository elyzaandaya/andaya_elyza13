<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Student</title>
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
<body class="min-h-screen flex items-center justify-center px-4">

  <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-lg border border-gray-200">

    <!-- Header -->
    <div class="text-center mb-6">
      <div class="inline-block bg-blue-100 p-4 rounded-full shadow-sm">
        <i class="fa-solid fa-user-pen text-blue-600 text-3xl"></i>
      </div>
      <h2 class="text-2xl font-semibold text-blue-700 mt-3">Update Student Info</h2>
      <p class="text-sm text-gray-500">Make sure everything’s up to date 📘</p>
    </div>

    <!-- Form -->
    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST" class="space-y-5">
      <div>
        <label class="block text-sm font-medium text-gray-700">First Name</label>
        <input type="text" name="first_name" value="<?= html_escape($user['first_name'])?>" required
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-50">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Last Name</label>
        <input type="text" name="last_name" value="<?= html_escape($user['last_name'])?>" required
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-50">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" value="<?= html_escape($user['email'])?>" required
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-50">
      </div>

      <div class="flex justify-between items-center mt-6">
        <a href="<?=site_url('/')?>" class="text-sm text-gray-600 hover:text-blue-500 flex items-center gap-1">
          <i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <button type="submit"
                class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-2 rounded-md shadow transition">
          <i class="fa-solid fa-floppy-disk"></i> Save
        </button>
      </div>
    </form>
  </div>

</body>
</html>
