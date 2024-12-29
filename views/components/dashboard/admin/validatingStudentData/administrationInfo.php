<?php

use app\cores\View;

$prestasiData = View::getData()["prestasiData"][0];



?>

<div>
    <div class="text-[13px] bg-[#6F38C5] text-white text-center py-2 rounded-sm font-medium mt-6 mb-6">
        <h1>Informasi Administrasi</h1>
    </div>

    <div class="p-6 bg-gray-50">

        <div class="flex flex-col">
            <!-- Nomor dan Tanggal Surat -->
            <div>
                <label class="text-[14px] font-semibold block text-gray-700 mb-2">Nomor Surat
                    Tugas</label>
                <div
                    class="w-full border border-gray-300 rounded-lg p-2 text-[13px] focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <?= $prestasiData["loa_number"] ?></div>
            </div>


            <div>
                <label class="text-[14px] font-semibold block text-gray-700 mb-2">Tanggal Surat
                    Tugas</label>
                <div
                    class="w-full border border-gray-300 rounded-lg p-2 text-[13px] focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <?= $prestasiData["loa_date"] ?></div>
            </div>


            <!-- File -->
            <div class="mt-5 flex gap-5">
                <div>
                    <a target="_blank"
                        class="bg-slate-200 hover:bg-slate-300 py-2 px-4 rounded-md text-[14px] font-semibold text-gray-700"
                        href="<?php echo substr($prestasiData["loa_pdf_path"], 1, strlen($prestasiData["loa_pdf_path"])); ?>">Surat
                        Tugas</a>
                </div>

                <div>
                    <a target="_blank"
                        class="bg-slate-200 hover:bg-slate-300 py-2 px-4 rounded-md text-[14px] font-semibold text-gray-700"
                        href="<?php echo substr($prestasiData["certificate_path"], 1, strlen($prestasiData["certificate_path"])); ?>">Sertifikat</a>
                </div>

                <div>
                    <a target="_blank"
                        class="bg-slate-200 hover:bg-slate-300 py-2 px-4 rounded-md text-[14px] font-semibold text-gray-700"
                        href="<?php echo substr($prestasiData["documentation_photo_path"], 1, strlen($prestasiData["documentation_photo_path"])); ?>">Foto
                        Kegiatan</a>
                </div>

                <div>
                    <a target="_blank"
                        class="bg-slate-200 hover:bg-slate-300 py-2 px-4 rounded-md text-[14px] font-semibold text-gray-700"
                        href="<?php echo substr($prestasiData["poster_path"], 1, strlen($prestasiData["poster_path"])) ?>">Poster</a>
                </div>
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