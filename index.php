<?php
    require_once 'config/DB_Connect.php';
    include 'config/autoloader.php';
    $manager = new Manager($db);
    $getOperators = $manager->getOperators();
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
            <a href="https://flowbite.com" class="flex items-center">
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
            <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
                <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                    <li>
                        <a href="#"
                           class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white"
                           aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                           class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                    </li>
                    <li>
                        <a href="#"
                           class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                    </li>
                    <li>
                        <a href="#"
                           class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Pricing</a>
                    </li>
                    <li>
                        <a href="#"
                           class="block py-2 pr-4 pl-3 text-gray-700 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Carousel-->
    <div id="default-carousel" data-carousel="slide" class="relative">

        <div class="overflow-hidden relative rounded h-screen sm:h-4/6 2xl:h-96">

            <div class="duration-1000  ease-in-out absolute inset-0 interval transition-all transform translate-x-0"
                 data-carousel-item="active">
                <img src="https://imgs.search.brave.com/phdxzAHbfQScwcVDb7YFj7J8NV-y4G76V_1traWiZRA/rs:fit:1200:1080:1/g:ce/aHR0cHM6Ly9nZXR3/YWxscGFwZXJzLmNv/bS93YWxscGFwZXIv/ZnVsbC85LzIvZi8x/MDkwNTY3LWRvd25s/b2FkLW9zYWthLXdh/bGxwYXBlci0xOTIw/eDEwODAtZm9yLW1h/Y2Jvb2suanBn"
                     class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div>

            <div class="duration-1000  ease-in-out absolute inset-0 transition-all transform translate-x-full"
                 data-carousel-item="">
                <img src="https://imgs.search.brave.com/pNui0SMRszdT1VfdYHaHqclXm3NySH6PZK7dx1FQ_js/rs:fit:1200:1080:1/g:ce/aHR0cHM6Ly93YWxs/cGFwZXJ0YWcuY29t/L3dhbGxwYXBlci9m/dWxsL2QvZi8xLzEw/Njc4NC10b2t5by13/YWxscGFwZXItMTky/MHgxMDgwLWltYWdl/LmpwZw"
                     class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div>

            <div class="hidden duration-1000  ease-in-out absolute inset-0 transition-all transform"
                 data-carousel-item="">
                <img src="https://imgs.search.brave.com/6QeeRBajMMHOKqSVFpXT4qYqDbJquRVDpmgld7UuUNA/rs:fit:1200:1080:1/g:ce/aHR0cHM6Ly9jZG4u/d2FsbHBhcGVyc2Fm/YXJpLmNvbS84My82/OS9lRmdSMm4uanBn"
                     class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div>

            <div class="hidden duration-1000  ease-in-out absolute inset-0 transition-all transform"
                 data-carousel-item="">
                <img src="https://imgs.search.brave.com/jQdSCXA-7mpg5T-OLEgDeKirNABMFKrIPwBbsx9Jou4/rs:fit:1200:1080:1/g:ce/aHR0cHM6Ly93YWxs/cGFwZXJhY2Nlc3Mu/Y29tL2Z1bGwvNTAz/MzUuanBn"
                     class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div>

            <div class="duration-1000  ease-in-out absolute inset-0 transition-all transform -translate-x-full"
                 data-carousel-item="">
                <img src="https://imgs.search.brave.com/sS7YuQVrxO8jmvDWavbzEIzRRO399Vre52Emvmrn02I/rs:fit:1200:1080:1/g:ce/aHR0cHM6Ly93d3cu/c2V0YXN3YWxsLmNv/bS93cC1jb250ZW50/L3VwbG9hZHMvMjAx/Ny8xMi9DaXR5LVNr/eWxpbmUtV2FsbHBh/cGVyLTAyLTE5MjB4/MTA4MC5qcGc"
                     class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div>
        </div>
    </div>
    <!--End Carousel-->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex justify-center p-4">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                              clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="table-search"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="Search Destinations">
            </div>
        </div>
        <div class="flex flex-row flex-wrap place-content-center items-stretch p-8 m-auto">
            <div class="shadow-md m-5 max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg"
                         src="<?= $getOperators[0]->getImage() ?>" alt=".<?= $getOperators[0]->getName() ?>.">
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $getOperators[0]->getName() ?></h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                        technology acquisitions of 2021 so far, in reverse chronological order.</p>
                    <form action="./src/Pages/Destinations.php?City_name=<?= $getOperators[0]->getName() ?>">
                       <input type="hidden" name="City_name" value="<?= $getOperators[0]->getName() ?>">
                        <button type="submit" href="#"
                           class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            <div class="shadow-md m-5 max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg"
                         src="<?= $getOperators[1]->getImage() ?>" alt="<?= $getOperators[1]->getName() ?>">
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $getOperators[1]->getName() ?></h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                        technology acquisitions of 2021 so far, in reverse chronological order.</p>
                    <a href="#"
                       class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="shadow-md m-5 max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg"
                         src="<?= $getOperators[2]->getImage() ?>" alt=".<?= $getOperators[2]->getName() ?>.">
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $getOperators[2]->getName() ?></h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                        technology acquisitions of 2021 so far, in reverse chronological order.</p>
                    <a href="#"
                       class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
<!--            <div class="shadow-md m-5 max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">-->
<!--                <a href="#">-->
<!--                    <img class="rounded-t-lg"-->
<!--                         src="https://cdn.pixabay.com/photo/2017/03/09/10/39/night-view-2129238_960_720.jpg" alt="">-->
<!--                </a>-->
<!--                <div class="p-5">-->
<!--                    <a href="#">-->
<!--                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Nagasaki</h5>-->
<!--                    </a>-->
<!--                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise-->
<!--                        technology acquisitions of 2021 so far, in reverse chronological order.</p>-->
<!--                    <a href="#"-->
<!--                       class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">-->
<!--                        Read more-->
<!--                        <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"-->
<!--                             xmlns="http://www.w3.org/2000/svg">-->
<!--                            <path fill-rule="evenodd"-->
<!--                                  d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"-->
<!--                                  clip-rule="evenodd"></path>-->
<!--                        </svg>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="shadow-md m-5 max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">-->
<!--                <a href="#">-->
<!--                    <img class="rounded-t-lg"-->
<!--                         src="https://cdn.pixabay.com/photo/2015/04/16/15/22/hiroshima-725801_960_720.jpg" alt="">-->
<!--                </a>-->
<!--                <div class="p-5">-->
<!--                    <a href="#">-->
<!--                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Hiroshima</h5>-->
<!--                    </a>-->
<!--                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise-->
<!--                        technology acquisitions of 2021 so far, in reverse chronological order.</p>-->
<!--                    <a href="#"-->
<!--                       class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">-->
<!--                        Read more-->
<!--                        <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"-->
<!--                             xmlns="http://www.w3.org/2000/svg">-->
<!--                            <path fill-rule="evenodd"-->
<!--                                  d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"-->
<!--                                  clip-rule="evenodd"></path>-->
<!--                        </svg>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="shadow-md m-5 max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">-->
<!--                <a href="#">-->
<!--                    <img class="rounded-t-lg"-->
<!--                         src="https://cdn.pixabay.com/photo/2019/02/02/18/38/japan-3971137_960_720.jpg" alt="">-->
<!--                </a>-->
<!--                <div class="p-5">-->
<!--                    <a href="#">-->
<!--                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sapporo</h5>-->
<!--                    </a>-->
<!--                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise-->
<!--                        technology acquisitions of 2021 so far, in reverse chronological order.</p>-->
<!--                    <a href="#"-->
<!--                       class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">-->
<!--                        Read more-->
<!--                        <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"-->
<!--                             xmlns="http://www.w3.org/2000/svg">-->
<!--                            <path fill-rule="evenodd"-->
<!--                                  d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"-->
<!--                                  clip-rule="evenodd"></path>-->
<!--                        </svg>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
</div>

    <!--Footer-->
    <footer class="p-4 bg-white rounded-lg shadow md:px-6 md:py-8 dark:bg-gray-800">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="https://flowbite.com" class="flex items-center mb-4 sm:mb-0">
                <img src="https://imgs.search.brave.com/Rtw-bp76moy0ybohQp2u9cPp5sIlh2cVyJ0D3GayYfc/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly9hdHBp/bnRlcm5hdGlvbmFs/LmNvLnphL3dwLWNv/bnRlbnQvdXBsb2Fk/cy8yMDE3LzEwL2Fp/cnBsYW5lX3Rha2Vv/ZmYxNjAwLnBuZw"
                     class="mr-3 h-8" alt="Flowbite Logo">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a
                href="https://flowbite.com" class="hover:underline">Tour-Operator™</a>. All Rights Reserved.
</span>
    </footer>
    <!--End Footer-->
    </body>
    </html>
