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
            <h2 class="text-[20px] font-semibold"><?php echo View::getData()["adminData"]["name"] ?>
            </h2>
            <p class="text-[12px] font-medium text-gray-500"><?php echo View::getData()["nip"] ?></p>
        </div>

        <!-- side bar -->
        <div class="space-y-4">
            <!-- dashboard admin -->
            <a href="/dashboard/admin/<?php echo View::getData()["nip"] ?>"
                class="text-[12px] font-m w-full flex items-center gap-2 py-2 px-4 bg-white text-gray-500 border border-gray-300 rounded-lg shadow hover:bg-[#6F38C5] hover:text-white active:bg-[#6F38C5] active:text-white transition duration-300">
                <img src="/public/assets/icon/adm_dashboard.png" alt="Icon Dashboard Admin" class="h-4 w-4" />
                Dashboard
            </a>

            <!-- student data -->
            <a href="/dashboard/admin/<?php echo View::getData()["nip"] ?>/dataStudent"
                class="text-[12px] font-medium w-full flex items-center gap-2 py-2 px-4 bg-white text-gray-700 border border-gray-300 rounded-lg shadow hover:bg-[#6F38C5] hover:text-white active:bg-[#6F38C5] active:text-white transition duration-300">
                <img src="/public/assets/icon/adm_dataStudent.png" alt="Icon Data Student" class="h-4 w-4" />
                Data Mahasiswa
            </a>
            <!-- validation -->
            <a href="/dashboard/admin/<?php echo View::getData()["nip"] ?>/validation"
                class="text-[12px] font-medium w-full flex items-center gap-2 py-2 px-4 bg-white text-gray-700 border border-gray-300 rounded-lg shadow hover:bg-[#6F38C5] hover:text-white active:bg-[#6F38C5] active:text-white transition duration-300">
                <img src="/public/assets/icon/adm_validasi.png" alt="Icon Validation Admin" class="h-4 w-4" />
                Validasi
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