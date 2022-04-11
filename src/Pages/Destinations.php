<?php
    require __DIR__ . '/../../config/autoloader.php';
    require __DIR__ . '/../../config/DB_Connect.php';
    $manager = new Manager($db);
    $getOperators = $manager->getAllOperator();
    $getDestinations = $manager->getOperatorByDestination();
?>
<doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
        <script src="tailwind.config.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.1/dist/flowbite.min.css"/>
        <title>Tour&dash;Operator</title>
    </head>
    <body class="dark:bg-zinc-900 text-white dark:text-black">
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="" class="flex items-center">
                <img src="https://imgs.search.brave.com/Rtw-bp76moy0ybohQp2u9cPp5sIlh2cVyJ0D3GayYfc/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly9hdHBp/bnRlcm5hdGlvbmFs/LmNvLnphL3dwLWNv/bnRlbnQvdXBsb2Fk/cy8yMDE3LzEwL2Fp/cnBsYW5lX3Rha2Vv/ZmYxNjAwLnBuZw"
                     class="mr-3 h-6 sm:h-9" alt="TourOperator Logo">
                <span class="text-black self-center text-xl font-semibold whitespace-nowrap">TourOperator</span>
            </a>
            <button data-collapse-toggle="mobile-menu" type="button"
                    class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mobile-menu" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                </svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </nav>
    <nav class="flex justify-center p-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="../../index.php" class="inline-flex items-center text-sm font-medium text-gray-400 hover:text-white dark:text-gray-400 dark:hover:text-white">
                    <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="#" class="ml-1 text-sm font-medium text-gray-400 hover:text-white md:ml-2 dark:text-gray-400 dark:hover:text-white">Destinations</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500"><?= $_GET["City_name"] ?></span>
                </div>
            </li>
        </ol>
    </nav>
    <main class="p-8 flex flex-row justify-center">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="items-center w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Operator
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Destinations
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Options
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
            </table>
            <?php foreach ($getDestinations as $Showdestinations) {?>
                <table class="items-center w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                    <tbody>
                        <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-600">
                            <th scope="row" class="px-8 py-4 text-left font-medium text-white whitespace-nowrap">
                                <?php
                                echo $Showdestinations->tour_operator->getName();
                                foreach ($manager->getCertificate($Showdestinations->getId()) as $isPremium) {
                                    if ($isPremium->getCertificate()) {
                                        $Link = $Showdestinations->tour_operator->getLink();?>
                                        <a data-tooltip-target="tooltip-default" href='<?= $Link ?>'>
                                            ⭐
                                            <div id="tooltip-default" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                                <?= $Showdestinations->tour_operator->getName() ?> est certifié !
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                        </a>
                                    <?php
                                    }else{
                                        echo $Showdestinations->tour_operator->getName(); // TODO: bug here
                                    }
                                }
                                ?>
                            </th>
                            <td class="px-12 py-4 font-medium text-right whitespace-nowrap">
                                <?= $Showdestinations->getLocation()  .' '. $Showdestinations->getOperatorId()?>
                            </td>
                            <td class="px-4 py-4 font-medium  whitespace-nowrap">
                                <?= $Showdestinations->getPrice() . '<strong class="text-green-500"> $</strong>' ?>
                            </td>
                            <form action="./Review.php?City_name=<?= $Showdestinations->getLocation()?>" method="get">
                                <input type="hidden" name="City_name" value="<?= $Showdestinations->getLocation()?>">
                                <input type="hidden" name="id" value="<?= $Showdestinations->getOperatorId()?>">
                                <td class="px-12 py-4 text-right">
                                    <button type="submit" class="font-medium text-blue-500 hover:underline">Avis</button>
                                </td>
                            </form>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </main>

<!--//        if ($isPremium->getCertificate()) {-->
<!--//            echo '<div class="bg-gray-800 text-white text-center p-4">-->
<!--//            <div class="text-xl">-->
<!--//                <span class="font-bold">Premium</span>-->
<!--//                <span class="text-gray-500">-->
<!--//                    <svg class="h-6 w-6 inline" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"/></svg>-->
<!--//                </span>-->
<!--//            </div>-->
<!--//            <p class="text-sm">-->
<!--//                This is a premium account.-->
<!--//            </p>-->
<!--//        </div>';-->
<!--//        }-->










