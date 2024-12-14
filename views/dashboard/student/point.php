<?php

use app\cores\View;

?>

<?php View::renderComponent("dashboard/sidebar") ?>


<!-- Main Content -->
<div class="flex-1 p-8 ml-64">
    <!-- Header -->
    <h1 class="text-lg md:text-xl font-bold mb-4">Poinku</h1>

    <div class="flex flex-wrap justify-between items-start">
        <!-- Capaian Poin Card -->
        <?php View::renderComponent("dashboard/pointAchievement") ?>

        <!-- Search, Filter, Pagination -->
        <?php View::renderComponent("dashboard/search") ?>
        <?php View::renderComponent("dashboard/filter") ?>
        <?php View::renderComponent("dashboard/pagination") ?>

        <!-- Container Tabel -->
        <div class="rounded-lg overflow-x-auto w-full">
            <table class="table-auto w-full border-collapse border border-gray-300 rounded-sm">
                <thead style="background-color: #6F38C5; color: white;">
                    <tr>
                        <th class="px-4 py-2 text-left text-[12px] font-normal">No</th>
                        <th class="px-4 py-2 text-left text-[12px] font-normal">Nama Kegiatan</th>
                        <th class="px-4 py-2 text-left text-[12px] font-normal">No Surat Tugas</th>
                        <th class="px-4 py-2 text-left text-[12px] font-normal">Tingkat</th>
                        <th class="px-4 py-2 text-left text-[12px] font-normal">Peran</th>
                        <th class="px-4 py-2 text-left text-[12px] font-normal">Poin</th>
                        <th class="px-4 py-2 text-left text-[12px] font-normal">Aksi</th>
                    </tr>
                </thead>
                <tbody>
            </table>
        </div>
    </div>
</div>