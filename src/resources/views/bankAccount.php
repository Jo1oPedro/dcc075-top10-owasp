<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100 font-sans">
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Account Details</h1>

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Total Account Balance</h2>
            <div class="flex items-center justify-between">
                <span class="text-4xl font-bold text-green-600"><?= $results["total_money"] ?></span>
                <i class="fas fa-arrow-up text-green-600 text-2xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Account Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-lg font-medium text-gray-600 mb-2">Account Creation Date</h3>
                    <div class="flex items-center">
                        <i class="far fa-calendar-alt text-blue-500 mr-2"></i>
                        <span class="text-gray-800">"><?= $results["created_at"] ?></span>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-medium text-gray-600 mb-2">Owner's Email</h3>
                    <div class="flex items-center">
                        <span class="text-gray-800 mr-2">"><?= $results["email"] ?></span>
                        <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition duration-300 ease-in-out" onclick="copyEmail()">Copy</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Import Invoices</h2>
            <div class="flex items-center space-x-4">
                <input type="text" placeholder="Paste invoice link here" class="flex-grow border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out flex items-center" id="importButton">
                    <span>Import Now</span>
                    <i class="fas fa-spinner fa-spin ml-2 hidden" id="loadingIcon"></i>
                </button>
            </div>
            <p class="text-green-600 mt-2 hidden" id="successMessage">Invoices imported successfully!</p>
        </div>
    </div>

    <script>
        function copyEmail() {
            navigator.clipboard.writeText('user@example.com').then(() => {
                alert('Email copied to clipboard!');
            });
        }

        document.getElementById('importButton').addEventListener('click', function() {
            const loadingIcon = document.getElementById('loadingIcon');
            const successMessage = document.getElementById('successMessage');
            loadingIcon.classList.remove('hidden');
            setTimeout(() => {
                loadingIcon.classList.add('hidden');
                successMessage.classList.remove('hidden');
                setTimeout(() => {
                    successMessage.classList.add('hidden');
                }, 3000);
            }, 2000);
        });
    </script>
</body>

</html>