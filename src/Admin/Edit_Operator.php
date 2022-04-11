<?php
    require __DIR__ . '/../../config/autoloader.php';
    require __DIR__ . '/../../config/DB_Connect.php';
    $manager = new Manager($db);
    $operator = $manager->getOperatorById($_GET['id_Operator']);
?>

<doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/png" href="../../img/Brand.png" />
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
        <script src="tailwind.config.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.1/dist/flowbite.min.css"/>
        <title>Admin&dash;Panel&dash;Edition</title>
    </head>
    <body class="dark:bg-zinc-900 text-white dark:text-black">
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="" class="flex items-center">
                <img src="https://imgs.search.brave.com/Rtw-bp76moy0ybohQp2u9cPp5sIlh2cVyJ0D3GayYfc/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly9hdHBp/bnRlcm5hdGlvbmFs/LmNvLnphL3dwLWNv/bnRlbnQvdXBsb2Fk/cy8yMDE3LzEwL2Fp/cnBsYW5lX3Rha2Vv/ZmYxNjAwLnBuZw" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo">
                <span class="text-black self-center text-xl font-semibold whitespace-nowrap">TourOperator</span>
            </a>
            <div class="flex items-center md:order-2">
                <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
                </button>

                <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1015px, 989px);" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top">
                    <div class="py-3 px-4">
                        <span class="block text-sm text-gray-900 dark:text-white"><?= gethostname() ?></span>
                        <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
                    </div>
                    <ul class="py-1" aria-labelledby="dropdown">
                        <li>
                            <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                        </li>
                        <li>
                            <a href="../../index.php" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
                <h3 class="text-black">Admin Panel &dash; Edition Operateur N°<?= $_GET['id_Operator'] ?></h3>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-wrap justify-between">
            <div class="w-full md:w-1/2">
                <div class="bg-white dark:bg-gray-800 rounded shadow p-4">
                    <h3 class="text-black font-bold text-xl mb-4">Edition</h3>
                    <form action="../Process/Process_edit_Operator.php" method="post">
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-white text-sm font-bold mb-2" for="name">
                                Nom
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name" value="<?= $operator['name'] ?>" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-white text-sm font-bold mb-2" for="text">
                                Lien
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="link" type="text" name="Link" value="<?= $operator['link'] ?>" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-white text-sm font-bold mb-2" for="text">
                                Image
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Image" type="text" name="Image" value="<?= $operator['image'] ?>" required>
                        </div>
                        <div class="mb-4">
                            <input type="hidden" name="id" value="<?= $_GET['id_Operator'] ?>">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Modifier
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
