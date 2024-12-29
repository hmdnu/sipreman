<?php

use app\cores\View;

?>

<!-- Section Data Lecture -->
<div class="p2 bg-primary-500 text-neutral-0 text-center py-2 rounded-[4px] font-medium mt-10">Data
    Pembimbing
</div>

<section class="mt-6">
    <section id="container-supervisor-input">
        <div class="w-1/2 border-neutral-200 rounded-lg overflow-hidden">
            <table id="data-dosen-table" class="p1 w-full text-left border-collapse">
                <thead class="bg-primary-0">
                    <tr>
                        <th class="text-[12px] px-4 py-2 border mr-5">No</th>
                        <th class="text-[12px] px-4 py-2 border">Nama Dosen</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-[12px] px-4 py-2 border">1</td>
                        <td class="text-[12px] px-4 py-2 border">
                            <select name="supervisor-nidn"
                                class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-1">
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