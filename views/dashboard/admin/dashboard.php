<?php

use app\cores\View;

?>

<?php View::renderComponent("dashboard/admSidebar") ?>

 <!-- Main Content -->
 <div class="flex-1 p-8 ml-64">
        <!-- Header -->
        <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

        <!-- Card Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Card Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-7">
                <!-- Card 1 -->
                <div class="p-6 bg-[#083DED] text-white rounded-lg shadow-md w-[250px] h-[200px]">

                    <h2 class="text-lg font-semibold">Jumlah Juara Internasional</h2>
                    <p class="text-4xl font-bold">120</p>
                </div>

                <!-- Card 2 -->
                <div class="p-6 bg-[#49B195] text-white rounded-lg shadow-md w-[250px] h-[200px]">
                    <h2 class="text-lg font-semibold">Jumlah Juara Nasional</h2>
                    <p class="text-4xl font-bold">574</p>
                </div>

                <!-- Card 3 -->
                <div class="p-6 bg-[#F65C5C] text-white rounded-lg shadow-md w-[250px] h-[200px]">
                    <h2 class="text-lg font-semibold">Jumlah Juara Provinsi</h2>
                    <p class="text-4xl font-bold">745</p>
                </div>

                <!-- Card 4 -->
                <div class="p-6 bg-[#626262] text-white rounded-lg shadow-md w-[250px] h-[200px]">
                    <h2 class="text-lg font-semibold">Jumlah Juara Kabupaten/Kota</h2>
                    <p class="text-4xl font-bold">571</p>
                </div>

                <!-- Card 5 -->
                <div class="p-6 bg-[#ADDDD0] text-white rounded-lg shadow-md w-[250px] h-[200px]">
                    <h2 class="text-lg font-semibold">Jumlah Juara Kecamatan</h2>
                    <p class="text-4xl font-bold">650</p>
                </div>

                <!-- Card 6 -->
                <div class="p-6 bg-[#8454CE] text-white rounded-lg shadow-md w-[250px] h-[200px]">
                    <h2 class="text-lg font-semibold">Jumlah Juara Internal Kampus</h2>
                    <p class="text-4xl font-bold">1,042</p>
                </div>
            </div>

            <!-- Statistik Charts -->
            <div class="grid grid-cols-1 gap-7">
                <!-- Chart 1 -->
                <div class="p-4 bg-white rounded-lg shadow-md">
                    <h2 class="text-lg font-semibold mb-2">Statistik Juara Seluruh Jurusan</h2>
                    <img src="img/chart_placeholder.png" alt="Chart 1" class="w-full">
                </div>

                <!-- Chart 2 -->
                <div class="p-4 bg-white rounded-lg shadow-md">
                    <h2 class="text-lg font-semibold mb-2">Statistik Juara Seluruh Jurusan</h2>
                    <img src="img/chart_placeholder.png" alt="Chart 2" class="w-full">
                </div>
            </div>
        </div>
    </div>
</div>
