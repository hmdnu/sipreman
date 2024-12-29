<?php

use app\cores\View;

$prestasiData = View::getData()["prestasiData"];
?>

<div>
    <div class="text-[13px] bg-[#6F38C5] text-white text-center py-2 rounded-sm font-medium">
        <h1>Data Mahasiswa</h1>
    </div>
    <div class="p-6 bg-gray-50">
        <!-- Tabel Data Mahasiswa -->
        <div>
            <div class="bg-white rounded-lg overflow-hidden">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-purple-200">
                            <th class="text-[12px] font-semibold px-4 py-2 bg-gray-100 border">No</th>
                            <th class="text-[12px] font-semibold px-4 py-2 bg-gray-100 border">Nama</th>
                            <th class="text-[12px] font-semibold px-4 py-2 bg-gray-100 border">Peran
                            </th>
                            <th class="text-[12px] font-semibold px-4 py-2 bg-gray-100 border">Jurusan
                            </th>
                            <th class="text-[12px] font-semibold px-4 py-2 bg-gray-100 border">Prodi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        foreach ($prestasiData as $key => $data) {
                            $count++;

                            echo "
                            <tr>
                                <td class='border text-[12px] px-4 py-2'>$count</td>
                                <td class='border text-[12px] px-4 py-2'>{$data["student_name"]}</td>
                                <td class='border text-[12px] px-4 py-2'>{$data["student_role"]}</td>
                                <td class='border text-[12px] px-4 py-2'>{$data["major_name"]}</td>
                                <td class='border text-[12px] px-4 py-2'>{$data["study_program_name"]}</td>
                            </tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Catatan Section -->
        <div class="mt-6">
            <p class="text-[14px] text-red-500 mb-2">Catatan:</p>
            <textarea class="w-full p-2 text-[12px] border border-gray-300 rounded-md bg-gray-50"
                placeholder="Masukkan catatan kesalahan data disini" rows="2"></textarea>
        </div>
        <div class="flex gap-2 mt-2">
            <button class="flex items-center px-4 py-2 text-[12px] text-white bg-[#49B195] rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Simpan
            </button>
            <button
                class="flex items-center px-4 py-1 text-[12px] text-gray-600 border border-gray-300 bg-gray-100 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 14v2m0 0v2m0-2H9m3 0h3M5 12h14M5 12l6-6m6 6l-6 6" />
                </svg>
                Kembali
            </button>
        </div>
    </div>
</div>