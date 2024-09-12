<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Administrator Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4 flex justify-between items-center">
        <h1 class="text-white text-2xl font-bold">Bank Admin Panel</h1>
        <form method="post" action="/logout">
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300" aria-label="Logout">Logout</button>
        </form>
    </nav>

    <main class="container mx-auto mt-8 px-4">
        <div class="mb-6">
            <input type="text" placeholder="Search accounts..." class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300" aria-label="Search accounts">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($results as $bankAccount): ?>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300" tabindex="0">
                    <h2 class="text-xl font-semibold mb-2">Conta bancaria <?php echo $bankAccount["id"]; ?></h2>
                    <a href="/bankAccount?id=<?php echo $bankAccount["id"]; ?>"><button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300" aria-label="Access Savings Account">Access</button></a>
                </div>
            <? endforeach; ?>
        </div>
    </main>
</body>

</html>