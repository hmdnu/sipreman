<?php

use app\cores\View;

?>

<?php View::renderComponent("dashboard/admSidebar") ?>

  <!-- Main Content -->
  <div class="flex-1 p-8 ml-64">
        <!-- Header -->
        <h1 class="text-lg md:text-xl font-bold mb-4">Data Mahasiswa</h1>

        <div class="flex flex-wrap justify-between items-end">
            <div class="flex justify-end items-center w-full space-x-4">
                <!-- Search, Filter, Pagination -->
            <?php View::renderComponent("dashboard/search") ?>
            <?php View::renderComponent("dashboard/filter") ?>
            <?php View::renderComponent("dashboard/pagination") ?>



            <!-- Container Tabel -->
            <div class="rounded-lg overflow-x-auto w-full mt-8">
                <table class="table-auto w-full border-collapse border border-gray-300 rounded-sm">
                    <thead style="background-color: #6F38C5; color: white;">
                        <tr>
                            <th class="px-4 py-2 text-left text-[12px] font-normal">NIM</th>
                            <th class="px-4 py-2 text-left text-[12px] font-normal">Nama</th>
                            <th class="px-4 py-2 text-left text-[12px] font-normal">Jurusan</th>
                            <th class="px-4 py-2 text-left text-[12px] font-normal">Prodi</th>
                            <th class="px-4 py-2 text-left text-[12px] font-normal">Nama Kegiatan</th>
                            <th class="px-4 py-2 text-left text-[12px] font-normal">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="px-4 py-2 text-gray-700 text-[12px]">2341712341</td>
                            <td class="px-4 py-2 text-gray-700 text-[12px]">Yonanda Mayla Rusdiaty</td>
                            <td class="px-4 py-2 text-gray-700 text-[12px]">Teknologi Informasi</td>
                            <td class="px-4 py-2 text-gray-700 text-[12px]">D-IV Sistem Informasi Bisnis</td>
                            <td class="px-4 py-2 text-gray-700 text-[12px]">Kompetisi Cyber Jawara Nasional 2023</td>
                            <td class="px-4 py-2 text-center">
                                <!-- button done/selesai -->
                                <button
                                    class="border border-gray-300 rounded-md px-2 py-1 bg-[#49B195] text-white text-[10px] font-medium hover:bg-green-200 hover:text-white transition">
                                    Selesai
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>