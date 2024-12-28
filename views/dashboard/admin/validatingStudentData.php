<?php

use app\cores\View;

?>

<section>
    <?php View::renderComponent("dashboard/admSidebar", View::getData()) ?>

    <!-- Main content -->
    <div class="flex-1 ml-64 p-8">
        <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h1 class="text-[18px] font-semibold text-gray-800 mb-4">Validasi</h1>

            <div class="space-y-6">
                <!-- Data Mahasiswa Section -->
                <div>
                    <div class="text-[13px] bg-[#6F38C5] text-white text-center py-2 rounded-sm font-medium">
                        <h1>Data Mahasiswa</h1>
                    </div>

                    <div class="p-6 bg-gray-50">
                        <section class="flex gap-5">
                            <!-- Program Studi Jurusan -->
                            <div class="mb-6">
                                <label class="text-[14px] block font-semibold text-gray-700 mb-2">Program Studi</label>
                                <p
                                    class="text-[12px] w-120p border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    D-IV Sistem Informasi Bisnis</p>
                            </div>

                            <div class="mb-6">
                                <label class="text-[14px] block font-semibold text-gray-700 mb-2">Jurusan</label>
                                <p
                                    class="text-[12px] w-120p border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    Teknologi Informasi</p>
                            </div>
                        </section>
                        <!-- Tabel Data Mahasiswa -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white rounded-lg overflow-hidden">
                                <table class="w-full text-left">
                                    <thead>
                                        <tr class="bg-purple-200">
                                            <th class="text-[12px] font-semibold px-4 py-2 bg-gray-100 border">No</th>
                                            <th class="text-[12px] font-semibold px-4 py-2 bg-gray-100 border">Nama</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border text-[12px] px-4 py-2">1</td>
                                            <td class="border text-[12px] px-4 py-2">Yonanda Mayla Rusdiaty</td>
                                        </tr>
                                        <tr>
                                            <td class="border text-[12px] px-4 py-2">2</td>
                                            <td class="border text-[12px] px-4 py-2">Vita Eka Saraswati</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="bg-white rounded-lg overflow-hidden">
                                <table class="w-full text-left">
                                    <thead>
                                        <tr>
                                            <th class="text-[12px] font-semibold px-4 py-2 bg-gray-100 border">No</th>
                                            <th class="text-[12px] font-semibold px-4 py-2 bg-gray-100 border">Peran
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border text-[12px] px-4 py-2">1</td>
                                            <td class="border text-[12px] px-4 py-2">Ketua</td>
                                        </tr>
                                        <tr>
                                            <td class="border text-[12px] px-4 py-2">2</td>
                                            <td class="border text-[12px] px-4 py-2">Anggota</td>
                                        </tr>
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Simpan
                            </button>
                            <button
                                class="flex items-center px-4 py-1 text-[12px] text-gray-600 border border-gray-300 bg-gray-100 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14v2m0 0v2m0-2H9m3 0h3M5 12h14M5 12l6-6m6 6l-6 6" />
                                </svg>
                                Kembali
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Data Kompetisi  -->
                <div>
                    <div class="text-[13px] bg-[#6F38C5] text-white text-center py-2 rounded-sm font-medium mt-6 mb-6">
                        <h1>Data Kompetisi</h1>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[14px] font-semibold text-gray-700 mb-2">Judul</label>
                            <div
                                class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                Gemastik XV</div>
                        </div>

                        <div>
                            <label class="block text-[14px] font-semibold text-gray-700 mb-2">Tingkat</label>
                            <div
                                class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                Nasional</div>
                        </div>

                        <div>
                            <label class="block text-[14px] font-semibold text-gray-700 mb-2">Tempat</label>
                            <div
                                class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                Universitas Brawijaya</div>
                        </div>

                        <div>
                            <label class="block text-[14px] font-semibold text-gray-700 mb-2">Tanggal Mulai</label>
                            <div
                                class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                10 Desember 2024</div>
                        </div>

                        <div>
                            <label class="block text-[14px] font-semibold text-gray-700 mb-2">Link</label>
                            <div
                                class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                <a href="https://gemastik.com"
                                    class="text-blue-600 hover:underline">https://gemastik.com</a>
                            </div>
                        </div>

                        <div>
                            <label class="block text-[14px] font-semibold text-gray-700 mb-2">Tanggal Akhir</label>
                            <div
                                class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                20 Desember 2024</div>
                        </div>
                        <div class="flex gap-6">
                            <div>
                                <label class="block text-[14px] font-semibold text-gray-700 mb-2">Jumlah Perguruan
                                    Tinggi</label>
                                <div
                                    class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    50</div>
                            </div>

                            <div>
                                <label class="block text-[14px] font-semibold text-gray-700 mb-2">Jumlah Peserta</label>
                                <div
                                    class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    150</div>
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
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


                <!-- Data Pembimbing Section -->
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
                                        Muhammad Afif Hendrawan, S.Kom., M.T.</td>
                                </tr>
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

                <div class="mt-8"></div>

                <!-- Informasi Administrasi Section -->
                <div>
                    <div class="text-[13px] bg-[#6F38C5] text-white text-center py-2 rounded-sm font-medium mt-6 mb-6">
                        <h1>Informasi Administrasi</h1>
                    </div>

                    <div class="p-6 bg-gray-50">

                        <div class="grid grid-cols-2 gap-6">
                            <!-- Nomor dan Tanggal Surat -->
                            <div>
                                <label class="text-[14px] font-semibold block text-gray-700 mb-2">Nomor Surat
                                    Tugas</label>
                                <div
                                    class="w-full border border-gray-300 rounded-lg p-2 text-[13px] focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    123/SK/XII/2024</div>
                            </div>

                            <div>
                                <label class="text-[14px] font-semibold block text-gray-700 mb-2">Tanggal Surat
                                    Tugas</label>
                                <div
                                    class="w-full border border-gray-300 rounded-lg p-2 text-[13px] focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    5 Desember 2024</div>
                            </div>

                            <!-- File -->
                            <div>
                                <label class="text-[14px] font-semibold block text-gray-700 mb-2">Surat Tugas</label>
                                <div class="mt-1 bg-gray-200 rounded overflow-hidden">
                                    <img src="https://via.placeholder.com/511x302" alt="Foto Kegiatan"
                                        class="w-511 h-302">
                                </div>
                            </div>

                            <div>
                                <label class="text-[14px] font-semibold block text-gray-700 mb-2">File
                                    Sertifikat</label>
                                <div class="mt-1 bg-gray-200 rounded overflow-hidden">
                                    <img src="https://via.placeholder.com/511x302" alt="Foto Kegiatan"
                                        class="w-511 h-302">
                                </div>
                            </div>

                            <div>
                                <label class="text-[14px] font-semibold block text-gray-700 mb-2">Foto Kegiatan</label>
                                <div class="mt-1 bg-gray-200 rounded overflow-hidden">
                                    <img src="https://via.placeholder.com/511x302" alt="Foto Kegiatan"
                                        class="w-511 h-302">
                                </div>
                            </div>

                            <div>
                                <label class="text-[14px] font-semibold block text-gray-700 mb-2">File Poster</label>
                                <div class="mt-1 bg-gray-200 rounded overflow-hidden">
                                    <img src="https://via.placeholder.com/511x302" alt="File Poster"
                                        class="w-511 h-302">
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Simpan
                            </button>
                            <button
                                class="flex items-center px-4 py-1 text-[12px] text-gray-600 border border-gray-300 bg-gray-100 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14v2m0 0v2m0-2H9m3 0h3M5 12h14M5 12l6-6m6 6l-6 6" />
                                </svg>
                                Kembali
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-start items-center mt-8 space-x-4">
                    <!-- button save-->
                    <button
                        class="flex items-center text-[14px] font-semibold bg-[#49B195] text-white py-2 px-5 rounded-md hover:bg-[#6F38C5] transition shadow-lg">
                        <img src="/public/assets/icon/save_icon.png" alt="save icon" class="w-4 h-5 mr-2">
                        Simpan
                    </button>

                    <!-- button back -->
                    <button type="submit"
                        class="flex items-center text-[14px] font-semibold bg-gray-200 text-gray-700 py-2 px-5 rounded-md hover:bg-gray-300 transition shadow-lg">
                        <img src="/public/assets/icon/back_icon.png" alt="back Icon" class="w-5 h-5 mr-2">
                        Kembali
                    </button>
                </div>
</section>