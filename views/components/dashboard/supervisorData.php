<?php

use app\cores\View;

?>

<!-- Section Data Lecture -->
<div class="text-[13px] bg-[#6F38C5] text-white text-center py-2 rounded-sm font-medium mt-6">Data
    Pembimbing
</div>

<section class="mt-6">
    <section id="container-supervisor-input">
        <div class="border border-gray-300 rounded-b-lg overflow-hidden mb-2">
            <table id="data-dosen-table" class="text-[14px] w-1/2 text-left border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-[12px] px-4 py-2 border">No</th>
                        <th class="text-[12px] px-4 py-2 border">Nama Dosen</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-[12px] px-4 py-2 border">1</td>
                        <td class="text-[12px] px-4 py-2 border">
                            <select name="supervisor-nidn"
                                class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                <option value="" disabled selected>Pilih Dosen</option>
                                <?php
                                foreach (View::getProps()["studentData"]["supervisors"] as $supervisor) {
                                    echo "<option value='{$supervisor["nidn"]}'>{$supervisor["name"]}</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</section>