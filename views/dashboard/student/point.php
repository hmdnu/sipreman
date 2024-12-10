<?php

use app\cores\View;

?>

<?php View::renderComponent("dashboard/sidebar") ?>

    <!-- Main Content -->
    <div class="flex-1 p-4 md:p-8">
        <!-- Header -->
        <h1 class="text-lg md:text-xl font-bold mb-4">Cek Validasi</h1>

        <div class="flex flex-wrap justify-between items-start">
            <!-- Capaian Poin Card -->
            <div class="bg-secondary-800 p-4 rounded-lg w-[200px] md:w-[300px] shadow-lg mb-4">
                <div class="flex items-center mb-4">
                        <div class= bg-primary-0 rounded-full p-2">
                        <img src="/public/assets/icon/folder_icon.png" alt="Folder Icon" class="w-6 h-6">
                    </div>
                    <h2 class="text-primary-0 text-sm md:text-lg font-semibold ml-4">Capaian Poin</h2>
                </div>
                <div class="flex items-center justify-between text-neutral-0 text-xs md:text-sm mb-2">
                    <span>6.0</span>
                    <span>15.0</span>
                </div>
                <div class=" rounded-full h-2 md:h-3 relative">
                    <div class="bg-[#FFD700] h-full rounded-full" style="width: 40%;"></div>
                </div>
            </div>

            <!-- Search, Filter, Pagination -->
            <div
                class="w-full md:w-2/3 flex flex-col md:flex-row items-center justify-end space-y-2 md:space-y-0 md:space-x-4">
                <!-- Search Bar -->
                <div class="w-full md:w-auto flex items-center bg-neutral-100  rounded-sm px-3 py-2 shadow-sm">
                    <img src="/public/assets/icon/search_icon.png" alt="Search Icon" class="h-5 w-5 text-primary-500">
                    <input type="text" placeholder="Cari..."
                        class="bg-neutral-100 outline-none px-2 text-[14px] text-neutral-900">
                </div>

                <!-- Filter Button -->
                <button class="flex items-center px-4 py-2 bg-neutral-100 rounded-sm shadow-sm text-primary-500">
                    <img src="/public/assets/icon/filtering_icon.png" alt="Filter Icon" class="h-5 w-5">
                    <span class="ml-2 text-[14px] ">Filter</span>
                </button>

                <!-- Pagination -->
                <div 
                    class="flex items-center justify-center bg-[var(--Primary-pr00,#F9F6FD)] w-[225px] h-[51px] rounded-[5px] shrink-0">
                    <div class="flex items-center justify-center w-full">
                        <nav class="isolate inline-flex -space-x-px" aria-label="Pagination">

                                <!-- Previous Button -->
                                <a href="#" 
                                    class="relative inline-flex items-center rounded-l-md px-3 py-2 text-neutral-600 hover:bg-primary-500 focus:z-20">
                                    <span class="sr-only">Previous</span>
                                    &lt;
                                </a>

                                <!-- Page Numbers -->
                                <a href="#" aria-current="page" 
                                    class="relative z-10 inline-flex items-center bg-primary-500 px-3 py-2 text-sm font-semibold text-primary-0 focus:z-20">1</a>
                                <a href="#" 
                                    class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-neutral-900 hover:bg-primary-500 focus:z-20">2</a>
                                <span 
                                    class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-700">...</span>
                                <a href="#" 
                                    class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-neutral-900 hover:bg-primary-500 focus:z-20">12</a>

                                <!-- Next Button -->
                                <a href="#" 
                                    class="relative inline-flex items-center rounded-r-md px-3 py-2 text-neutral-600 hover:bg-primary-500 focus:z-20">
                                    <span class="sr-only">Next</span>
                                    &gt;
                                </a>
                        </nav>
                    </div>
                </div>
            </div>

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
                
                    <!-- button aksi -->
                    <button
                        class="border border-neutral-300 rounded-md px-3 py-2 bg-neutral-100 text-green-500 hover:text-green-700">
                        <img src="/public/assets/icon/validate_icon.png" alt="Validate Icon" class="h-4 w-4">
                    </button>
                    <button
                        class="border border-neutral-300 rounded-md px-3 py-2 bg-neutral-100 text-blue-500 hover:text-blue-700">
                        <img src="/public/assets/icon/calendar_icon.png" alt="Calendar Icon" class="h-4 w-4">
                    </button>
                    </tbody>
                </table>
            </div>
        </div>
    </div>