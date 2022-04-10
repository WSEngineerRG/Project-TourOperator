<?php
    require __DIR__ . '/../../config/autoloader.php';
    require __DIR__ . '/../../config/DB_Connect.php';
    $manager = new Manager($db);
    $destination = $manager->getDestinationById($_GET['id_destination']);
    $getOperators = $manager->getAllOperator();
?>
<!--// TODO: Debug Operator_id in Process_edit_Destination.php-->
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
                <h3 class="text-black">Admin Panel &dash; Edition Destination N°<?= $_GET['id_destination'] ?></h3>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-wrap justify-between">
            <div class="w-full md:w-1/2">
                <div class="bg-gray-800 rounded shadow p-4">
                    <h3 class="flex justify-center text-lg font-semibold text-white">Edition Destination N°<?= $_GET['id_destination'] ?></h3>
                    <form action="../Process/Process_edit_Destination.php" method="post" enctype="multipart/form-data">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-destination-name">
                                    Localisation de la destination
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-900 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-destination-name" type="text" name="destination_location" value="<?= $destination['location'] ?>" required>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-destination-name">
                                    prix de la destination
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-900 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-destination-name" type="number" name="destination_price" value="<?= $destination['price']?>" required>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label for="Destination_Operator_id" class="block mb-2 text-sm font-medium text-gray-400">choisis l'operateur</label>
                                <select id="Destination_Operator_id" name="New_Destination_Tid" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <?php foreach ($getOperators as $search){ ?>
                                        <option value="<?= $destination['tour_operator_id'] ?>"><?= $search->getName()?> [<?= $search->getId() ?>]</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-destination-name">
                                    image de la destination
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-destination-name" type="text" name="destination_image" value="<?= $destination['image'] ?>" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <input type="hidden" name="id" value="<?= $_GET['id_destination'] ?>">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Modifier
                            </button>
                        </div>
                    </form>
                    </div>
                </div>
        </div>
    </div>
    </body>
