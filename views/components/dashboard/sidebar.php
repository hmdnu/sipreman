<?php

use app\cores\View;

$currentUrl = $_SERVER['REQUEST_URI'];

?>

<aside class="w-64 bg-[#F9F6FD] shadow-2xl p-6 h-screen fixed flex flex-col justify-between">
    <section>
        <!-- Logo -->
        <div class="text-center mb-6">
            <div class="font-[Raleway] flex items-center gap-2 justify-center mb-4">
                <img src="/public/assets/img/logo.png" alt="Logo Sipreman" class="h-7 w-17">
            </div>
        </div>

        <!-- user profile -->
        <div class="text-center mb-6">
            <img src="/public/assets/img/user.png" alt="profile picture"
                class="w-20 h-20 rounded-full mx-auto mb-2" />
            <h2 class="h5 font-semibold mt-3"><?php echo View::getData()["studentData"]["name"] ?>
            </h2>
            <p class="p1 font-medium text-gray-500 mt-2"><?php echo View::getData()["studentData"]["nim"] ?></p>
        </div>

        <!-- side bar -->
        <div class="space-y-4 py-4">
            <!-- upload -->
            <a href="/dashboard/student/<?php echo View::getData()["studentData"]["nim"] ?>"
                class="sidebar-link text-[12px] font-medium w-full flex items-center gap-4 py-3 px-4 <?php echo strpos($currentUrl, '/dashboard/student/' . View::getData()["studentData"]["nim"]) !== false && strpos($currentUrl, '/validation') === false && strpos($currentUrl, '/point') === false ? 'bg-primary-500 text-white' : 'bg-white text-gray-700'; ?>  rounded-lg shadow transition duration-300">
                <img src="<?php echo strpos($currentUrl, '/dashboard/student/' . View::getData()["studentData"]["nim"]) !== false && strpos($currentUrl, '/validation') === false && strpos($currentUrl, '/point') === false ? '/public/assets/icon/unggah_white.png' : '/public/assets/icon/upload_icon.png'; ?>" alt="Icon Upload" class="h-4 w-4" />
                Unggah Prestasi
            </a>

            <!-- validation -->
            <a href="/dashboard/student/<?php echo View::getData()["studentData"]["nim"] ?>/validation"
                class="sidebar-link text-[12px] font-medium w-full flex items-center gap-4 py-3 px-4 <?php echo strpos($currentUrl, '/validation') !== false ? 'bg-primary-500 text-white' : 'bg-white text-gray-700'; ?>  rounded-lg shadow transition duration-300">
                <img src="<?php echo strpos($currentUrl, '/validation') !== false ? '/public/assets/icon/validation_white.png' : '/public/assets/icon/validation_icon.png'; ?>" alt="icon validation" class="h-4 w-4" />
                Cek Validasi
            </a>

            <!-- my points -->
            <a href="/dashboard/student/<?php echo View::getData()["studentData"]["nim"] ?>/point"
                class="sidebar-link text-[12px] font-medium w-full flex items-center gap-4 py-3 px-4 <?php echo strpos($currentUrl, '/point') !== false ? 'bg-primary-500 text-white' : 'bg-white text-gray-700'; ?> rounded-lg shadow transition duration-300">
                <img src="<?php echo strpos($currentUrl, '/point') !== false ? '/public/assets/icon/poinku_white.png' : '/public/assets/icon/point_icon.png'; ?>" alt="icon poin" class="h-4 w-4" />
                Poinku
            </a>
        </div>
    </section>


    <div class="sticky bottom-0 mt-4">
        <form action="/logout" method="post" id="logout-form">
            <button type="submit" class="p2 font-medium w-full flex items-center justify-center py-3 px-4 bg-gray-300
            text-gray-700 rounded-lg shadow hover:bg-gray-400 hover:text-white active:bg-gray-500 active:text-white
            transition duration-300">
                Keluar
            </button>
        </form>
    </div>
</aside>