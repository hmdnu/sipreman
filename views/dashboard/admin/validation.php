<?php

use app\constant\ValidationState;
use app\cores\Session;
use app\cores\View;

?>

<section>
    <?php View::renderComponent("dashboard/admSidebar", View::getData()) ?>
    <!-- Main Content -->
    <div class="flex-1 ml-64 p-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-[30px] font-semibold text-neutral-900 mb-4">Validasi</h1>

            <div class="flex justify-end items-center mb-6 gap-4">
                <!-- Search Bar -->
                <div class="relative w-64">
                    <input type="text" placeholder="Cari"
                        class="w-full pl-10 pr-4 py-2 text-[12px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>

                <!-- Filter -->
                <button class="flex items-center px-4 py-2 bg-neutral-100 rounded-sm shadow-sm text-primary-500">
                    <img src="/public/assets/icon/filtering_icon.png" alt="Filter Icon" class="h-5 w-5">
                    <span class="ml-2 text-[14px]">Filter</span>
                </button>

                <!-- Pagination -->
                <div class="flex items-center bg-[var(--Primary-pr00,#F9F6FD)] h-[51px] rounded-[5px] px-4">
                    <nav class="isolate inline-flex -space-x-px" aria-label="Pagination">
                        <!-- Previous Button -->
                        <a href="#"
                            class="relative inline-flex items-center rounded-l-md px-3 py-2 text-gray-400 hover:bg-[#6F38C5] focus:z-20">
                            <span class="sr-only">Previous</span>
                            &lt;
                        </a>

                        <!-- Page Numbers -->
                        <a href="#" aria-current="page"
                            class="relative z-10 inline-flex items-center bg-[#6F38C5] px-3 py-2 text-sm font-semibold text-white focus:z-20">1</a>
                        <a href="#"
                            class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-900 hover:bg-[#6F38C5] focus:z-20">2</a>
                        <span
                            class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-700">...</span>
                        <a href="#"
                            class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-900 hover:bg-[#6F38C5] focus:z-20">12</a>

                        <!-- Next Button -->
                        <a href="#"
                            class="relative inline-flex items-center rounded-r-md px-3 py-2 text-gray-400 hover:bg-[#6F38C5] focus:z-20">
                            <span class="sr-only">Next</span>
                            &gt;
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="bg-[#6F38C5] text-white text-[12px]">
                            <th class="px-4 font-semibold py-2 text-center">NIM</th>
                            <th class="px-4 font-semibold py-2 text-left">Nama</th>
                            <th class="px-4 font-semibold py-2 text-left">Jurusan</th>
                            <th class="px-4 font-semibold py-2 text-center">Prodi</th>
                            <th class="px-4 font-semibold py-2 text-center">Nama Kegiatan</th>
                            <th class="px-4 font-semibold py-2 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-[12px]">
                        <?php

            $validatingPrestasiData = View::getData()["validatingPrestasiData"];

            $validationState = [
              "icon" => "",
              "color" => "",
            ];

            foreach ($validatingPrestasiData as $key => $data) {

              if ($data["validation_state"] === ValidationState::VALID) {
                $validationState["icon"] = "validate_icon";
                $validationState["color"] = "green";
              } else if ($data["validation_state"] === ValidationState::WAITING) {
                $validationState["icon"] = "waiting_validation";
                $validationState["color"] = "orange";
              } else {
                $validationState["icon"] = "not_validate_icon";
                $validationState["color"] = "red";
              }

              $nip = Session::get("user");

              $link = "/dashboard/admin/$nip/student-data/{$data['prestasi_id']}";

              echo "<tr class='border-b'>
                        <td class='px-4 py-2 text-center'>{$data["nim"]}</td>
                        <td class='px-4 py-2'>{$data["name"]}</td>
                        <td class='px-4 py-2'>{$data["major_name"]}</td>
                        <td class='px-4 py-2 text-center'>{$data["study_program_name"]}</td>
                        <td class='px-4 py-2 text-center'>{$data["competition_name"]}</td>
                        <td class='px-4 py-2'>
                            <div class='flex items-center justify-center gap-2'>
                                <button class='p-1.5 bg-{$validationState["color"]}-500 text-{$validationState["color"]}-500 rounded-lg hover:bg-{$validationState["color"]}-200'
                                    title='{$data["validation_state"]}'>
                                    <img src='/public/assets/icon/{$validationState["icon"]}.png' alt='state' class='h-5 w-5'>
                                </button>
                                <a href='$link' class='p-1.5 hover:bg-gray-300 text-gray-300 rounded-lg' title='Validasi'>
                                    <img src='/public/assets/icon/edit_icon.png' alt='Edit' class='h-5 w-5'>
                                </a>
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
</section>


<script>
$(document).ready(function() {
    $('tr[data-link]').on('click', function() {
        window.location.href = $(this).data('link');
    });
});
</script>