<?php
require_once '../../config/database.php';

?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <?php include '../includes/style.php'; ?>
  
</head>
<body>

<div class="min-h-screen flex items-center justify-center bg-[#1e1e1e]">
    <div class="w-full max-w-md bg-[#2b2b2b] border border-gray-700 rounded-lg p-6">
        
        <h2 class="text-xl font-semibold text-gray-200 mb-6 text-center">
            Clinic Login
        </h2>

        <form method="POST" action="login_secure.php" class="space-y-4">

            <div>
                <label class="block text-sm text-gray-400 mb-1">Username</label>
                <input
                    type="text"
                    name="username"
                    required
                    class="w-full rounded-md bg-[#333] border border-gray-600 px-3 py-2 text-sm text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-1">Password</label>
                <input
                    type="password"
                    name="password"
                    required
                    class="w-full rounded-md bg-[#333] border border-gray-600 px-3 py-2 text-sm text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-md font-medium transition"
            >
                Login
            </button>

        </form>

    </div>
</div>

</body>
</html>
