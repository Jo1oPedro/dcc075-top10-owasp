<?php view("templates/headers") ?>
<body>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <?php if(isset($_SESSION["errors"])): ?>
        <?php foreach ($_SESSION["errors"] as $error): ?>
            <div class="flex justify-center text-red-600 mb-2"><?php echo $error ?></div>
        <?php endforeach ?>
        <?php unset($_SESSION["errors"]); ?>
    <?php endif; ?>
    <div></div>
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Register your account</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="/new-password" method="POST">
            <div>
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">New password</label>
                <div class="mt-2">
                    <input id="password" name="password" type="password" required class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Send</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>

