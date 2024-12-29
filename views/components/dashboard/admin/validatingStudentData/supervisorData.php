<?php

use app\cores\View;

$supervisor = View::getData()["prestasiData"][0]["supervisor_name"];

?>

<div>
    <div class="text-[13px] bg-[#6F38C5] text-white text-center py-2 rounded-sm font-medium mt-6 mb-6">
        <h1>Data Pembimbing</h1>
    </div>

    <div class="p-6 border-x border-b rounded-b-lg">
        <table class="w-1/2 text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-[12px] font-semibold px-4 py-2 bg-gray-100 border">No</th>
                    <th class="text-[12px] font-semibold px-4 py-2 bg-gray-100 border">Nama Dosen</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-[12px] px-4 py-2 border">1</td>
                    <td
                        class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <?= $supervisor ?></td>
                </tr>
            </tbody>
        </table>
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