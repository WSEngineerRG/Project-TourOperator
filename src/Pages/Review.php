<?php
    require __DIR__ . '/../../config/autoloader.php';
    require __DIR__ . '/../../config/DB_Connect.php';
    $manager = new Manager($db);
    $getOperators = $manager->getAllOperator();
    $getDestinations = $manager->getOperatorByDestination();
    $getScore = $manager->getScore();
    $countReviews = $manager->countReviews();
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
        <link rel="stylesheet" href="../../Scripts/Main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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
                    <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Reviews</span>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500"><?= $_GET["City_name"] ?></span>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500"><?= $_GET["id"] ?></span>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <button data-tooltip-target="tooltip-bottom" data-tooltip-placement="bottom" type="button" id="godown" class="flex justify-center items-center text-center w-10 h-10 rounded-full bg-blue-500">
                       <div class="relative">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                            <span class="top-5 left-5 absolute  w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
                       </div>
                        <div id="tooltip-bottom" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Click to see Comment !
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </button>
                </div>
            </li>
        </ol>
    </nav>
    <main class="p-16 flex flex-row justify-center">
        <div class="block p-6 w-96 h-auto max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <h5 class="text-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Avis / Note</h5>
            <br>
            <div class="relative z-0 mb-6 w-full group">
                <form action="../Process/Process_add_Review.php" class="form" method="post"
                <div class="relative z-0 mb-6 w-full group">
                    <input name="name" value="" placeholder=' ' type="name"
                           class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                           required>
                    <label for="floating_name"
                           class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Pseudo
                    </label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Ton Avis</label>
                    <textarea id="message" name="Avis" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Lache Toi..."></textarea>
                </div>
                <div class="mb-6">
                    <div id="full-stars-example-two">
                        <div class="rating-group">
                            <input disabled checked class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio">
                            <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating3" id="rating3-1" value="1" type="radio">
                            <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating3" id="rating3-2" value="2" type="radio">
                            <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating3" id="rating3-3" value="3" type="radio">
                            <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating3" id="rating3-4" value="4" type="radio">
                            <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating3" id="rating3-5" value="5" type="radio">
                        </div>
                    </div>
                </div>
                <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
                <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Envoyer
                </button>
                </form>
            </div>
        </div>
    </main>
    <main class="p-16 flex flex-row flex-wrap gap-6 justify-end">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <p class="ml-2 text-sm font-bold text-white">4.95</p>
            <span class="w-1 h-1 mx-1.5  rounded-full bg-gray-400"></span>
            <a href="#" class="text-sm font-medium  hover:underline text-white"><?= $countReviews. ' Reviews' ?></a>
        </div>
    </main>
    <main class="p-16 flex flex-row flex-wrap gap-6 justify-start">
        <?php
        foreach ($manager->getReviews($_GET['id']) as $review) { ?>
            <div class="code-preview rounded-xl bg-gradient-to-r bg-gray-900 border border-gray-700 p-2 sm:p-6 bg-gray-800">
                <article>
                    <div class="flex items-center mb-4 space-x-4">
                        <div class="relative w-10 h-10 overflow-hidden rounded-full bg-gray-600">
                            <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                        </div>
                        <div class="space-y-1 font-medium text-white">
                            <p><?= $review->Author->getName() ?> <time datetime="2014-08-16 19:00" class="block text-sm text-gray-400">Joined on <?= $review->Author->getCreatedAt() ?></time></p>
                        </div>
                    </div>
                    <div class="flex items-center mb-1">
                        <!---//TODO: Add rating system--->
                    </div>
                    <footer class="mb-5 text-sm text-gray-400"><p>Envoyer depuis la France le  <time datetime="<?= $review->getSendAt() ?>"><?= $review->getSendAt() ?></time></p></footer>
                    <p class="mb-2 font-light text-gray-400"><?= $review->getMessage() ?>.</p>
                    <!--            <aside>-->
                    <!--                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">19 people found this helpful</p>-->
                    <!--                <div class="flex items-center mt-3 space-x-3 divide-x divide-gray-200 dark:divide-gray-600">-->
                    <!--                    <a href="#" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-xs px-2 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Helpful</a>-->
                    <!--                    <a href="#" class="pl-4 text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Report abuse</a>-->
                    <!--                </div>-->
                    <!--            </aside>-->
                </article>
            </div>
        <?php
        }
        ?>
    </main>
    <div class="flex justify-end mx-5 my-5">
        <button data-tooltip-target="tooltip-top" data-tooltip-placement="top" type="button" id="goup" class="flex justify-center items-center text-center w-10 h-10 rounded-full bg-blue-500">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path></svg>
        </button>
    </div>
    <?php //Paramètres ajout review
    if (isset($_POST['name']) && isset($_POST['Avis'])) {
        if ($manager->getAuthorByName($_POST['name']) == null) {
            $id = $db->lastinsertid();
            $name = $_POST['name'];

            $query = "INSERT INTO comparo_full.author (`id`, `name`) VALUES (?,?)";
            $manager->db_prepare($query)->execute([$id, $name]);
        }
        if (isset($name) && !empty($name) && !empty($_POST['Avis']) && $manager->getAuthorByName($name) != null) {
            $message = $_POST['Avis'];
            $id = $_GET['id'];
            $author_id = $manager->getAuthorByName($_POST['name']);
            $manager->addReview($message, $id, $author_id);
        }
    ?>
<?php } ?>


<!--    --><?php
//        foreach ($manager->getScoreById($_GET['id']) as $score){
//            $score_id = $score->getId();
//            $score_value = $score->getScore();
//            $score_author_id = $score->getAuthorId();
//            $score_author_name = $manager->Author->getName();
//            ?>
<!--            <div>-->
<!--                <p class="text-white">--><?//= $score_id, $score_value ?><!--</p>-->
<!--                <p class="text-white">--><?//= $score_author_id, $score_author_name ?><!--</p>-->
<!--            </div>-->
<!---->
<!--       --><?php //}
//    ?>

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

    <script src="../../Scripts/Main.js"></script>