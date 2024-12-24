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
                <tbody class="text-[12px]">

                    <?php
                $validatedPrestasi = View::getData()["validatedPrestasi"];

                for ($i = 0; $i < count($validatedPrestasi); $i++) {
                    echo "<tr class='border-b'>
                            <td class='px-4 py-2 text-center'>" . ($i + 1) . "</td>
                            <td class='px-4 py-2'> {$validatedPrestasi[$i]["competition_name"]}</td>
                            <td class='px-4 py-2'>{$validatedPrestasi[$i]["loa_number"]}</td>
                            <td class='px-4 py-2 text-center'>{$validatedPrestasi[$i]["competition_level"]}</td>
                            <td class='px-4 py-2 text-center'>{$validatedPrestasi[$i]["role"]}</td>
                            <td class='px-4 py-2 text-center'>{$validatedPrestasi[$i]["point"]}</td>
                            <td class='px-4 py-2'>";

                    echo "<div class='flex items-center justify-center gap-2'>                                 
                                <button class='p-1.5 bg-green-100 text-green-800 rounded-lg hover:bg-green-200' title='Tervalidasi'>
                                    <img src='/public/assets/icon/validate_icon.png' alt='Valid' class='h-5 w-5'>
                                </button>
                                <button class='p-1.5 bg-gray-100 text-gray-300 rounded-lg cursor-not-allowed' title='Tidak dapat diedit' disabled>
                                    <img src='/public/assets/icon/edit_icon.png' alt='Edit' class='h-5 w-5'>
                                </button>
                            </div>
                            </td>
                        </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>