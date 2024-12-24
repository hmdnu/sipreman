<?php

use app\cores\View;

const TOTAL_SKKM = 15;

$currentPoint = View::getData()["totalPoint"];

$percent = round(($currentPoint / TOTAL_SKKM) * 100);

?>

<div class="flex flex-wrap justify-between items-start">
    <!-- Capaian Poin Card -->
    <div class="bg-secondary-800 p-4 rounded-lg w-[200px] md:w-[300px] shadow-lg mb-4">
        <div class="flex items-center mb-4">
            <div class="bg-primary-0 rounded-full p-2" ">
            <img src=" /public/assets/icon/folder_icon.png" alt="Folder Icon" class="w-6 h-6">
            </div>
            <h2 class="text-primary-0 text-sm md:text-lg font-semibold ml-4">Capaian Poin</h2>
        </div>
        <div class="flex items-center justify-between text-neutral-0 text-xs md:text-sm mb-2">
            <span><?= $currentPoint ?>.0</span>
            <span>15.0</span>
        </div>
        <div class="rounded-full h-2 md:h-3 relative">
            <div class="bg-[#FFD700] h-full rounded-full" style="width: <?= $percent ?>%;"></div>
        </div>
    </div>