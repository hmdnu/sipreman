<?php

use app\cores\View;

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
            <img src="https://via.placeholder.com/100" alt="profile picture"
                class="w-20 h-20 rounded-full mx-auto mb-2" />
            <h2 class="text-[20px] font-semibold"><?php echo View::getData()["name"] ?>
            </h2>
            <p class="text-[12px] font-medium text-gray-500"><?php echo View::getData()["nim"] ?></p>
        </div>

        <!-- side bar -->
        <div class="space-y-4">
            <!-- upload -->
            <a href="/dashboard/student/<?php echo View::getData()["nim"] ?>"
                class="text-[12px] font-m w-full flex items-center gap-2 py-2 px-4 bg-white text-gray-500 border border-gray-300 rounded-lg shadow hover:bg-[#6F38C5] hover:text-white active:bg-[#6F38C5] active:text-white transition duration-300">
                <img src="/public/assets/icon/upload_icon.png" alt="Icon Upload" class="h-4 w-4" />
                Unggah Prestasi
            </a>

            <!-- validation -->
            <a href="/dashboard/student/<?php echo View::getData()["nim"] ?>/validation"
                class="text-[12px] font-medium w-full flex items-center gap-2 py-2 px-4 bg-white text-gray-700 border border-gray-300 rounded-lg shadow hover:bg-[#6F38C5] hover:text-white active:bg-[#6F38C5] active:text-white transition duration-300">
                <img src="/public/assets/icon/validation_icon.png" alt="icon validation" class="h-4 w-4" />
                Cek Validasi
            </a>
            <!-- my points -->
            <a href="/dashboard/student/<?php echo View::getData()["nim"] ?>/point"
                class="text-[12px] font-medium w-full flex items-center gap-2 py-2 px-4 bg-white text-gray-700 border border-gray-300 rounded-lg shadow hover:bg-[#6F38C5] hover:text-white active:bg-[#6F38C5] active:text-white transition duration-300">
                <img src="/public/assets/icon/point_icon.png" alt="icon poin" class="h-4 w-4" />
                Poinku
            </a>
        </div>
    </section>


    <div class="sticky bottom-0 mt-4">
        <form action="/logout" method="post" id="logout-form">
            <button type="submit" class="text-[12px] font-medium w-full flex items-center justify-center py-2 px-4 bg-gray-300
            text-gray-700 rounded-lg shadow hover:bg-gray-400 hover:text-white active:bg-gray-500 active:text-white
            transition duration-300">
                Keluar
            </button>
        </form>
    </div>
</aside>