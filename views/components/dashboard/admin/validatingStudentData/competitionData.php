<?php

use app\cores\View;

$prestasiData = View::getData()["prestasiData"][0];

?>

<div>
    <div class="text-[13px] bg-[#6F38C5] text-white text-center py-2 rounded-sm font-medium mt-6 mb-6">
        <h1>Data Kompetisi</h1>
    </div>

    <?php
    echo "<div class='grid grid-cols-2 gap-6'>
        <div>
            <label class='block text-[14px] font-semibold text-gray-700 mb-2'>Judul</label>
            <div
                class='text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500'>
                {$prestasiData["competition_name"]}</div>
        </div>

        <div>
            <label class='block text-[14px] font-semibold text-gray-700 mb-2'>Tingkat</label>
            <div
                class='text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500'>
                {$prestasiData["competition_level"]}</div>
        </div>

        <div>
            <label class='block text-[14px] font-semibold text-gray-700 mb-2'>Tempat</label>
            <div
                class='text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500'>
                {$prestasiData["place"]}</div>
        </div>
        <div>
            <label class='block text-[14px] font-semibold text-gray-700 mb-2'>Tanggal Mulai</label>
            <div
                class='text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500'>
                {$prestasiData["date_start_competition"]}</div>
        </div>
        <div>
            <label class='block text-[14px] font-semibold text-gray-700 mb-2'>Link</label>
            <div
                class='text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500'>
                <a target='_blank' href='{$prestasiData["competition_source"]}' class='text-blue-600 hover:underline'>{$prestasiData["competition_source"]}</a>
            </div>
        </div>

        <div>
            <label class='block text-[14px] font-semibold text-gray-700 mb-2'>Tanggal Akhir</label>
            <div
                class='text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500'>
                {$prestasiData["date_end_competition"]}</div>
        </div>
        <div class='flex gap-6'>
            <div>
                <label class='block text-[14px] font-semibold text-gray-700 mb-2'>Jumlah Perguruan
                    Tinggi</label>
                <div
                    class='text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500'>
                    {$prestasiData["total_college_attended"]}</div>
            </div>

            <div>
                <label class='block text-[14px] font-semibold text-gray-700 mb-2'>Jumlah Peserta</label>
                <div
                    class='text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500'>
                    {$prestasiData["total_participant"]}</div>
            </div>
        </div>
    </div>";
    ?>

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