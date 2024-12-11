<?php

use app\cores\View;

?>

<h1 class="text-[18px] font-bold text-gray-800 mb-4">Unggah Prestasi</h1>

<!-- Section Student Data -->
<div class="text-[13px] bg-[#6F38C5] text-white text-center py-2 rounded-sm font-medium">
    <h1>Data Mahasiswa</h1>
</div>

<section class="mb-6 mt-6">
    <!-- add study program -->
    <section id="container-student-input">

        <section class="flex gap-5">
            <div class="mb-6">
                <label for="study-program" class="text-[14px] block font-semibold text-gray-700 mb-2">Program
                    Studi</label>
                <select id="program-studi" name="study-program[]"
                    class="text-[12px] w-120p border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <option value="" disabled selected>Pilih Program Studi</option>

                    <?php
                    foreach (View::getProps()["studentData"]["studyPrograms"] as $program) {
                        echo "<option value='$program'>$program</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- add major -->
            <div class="mb-6">
                <label for="major" class="text-[14px] block font-semibold text-gray-700 mb-2">Jurusan</label>
                <select id="major" name="major[]"
                    class="text-[12px] w-120p border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <option value="" disabled selected>Pilih Jurusan</option>

                    <?php
                    foreach (View::getProps()["studentData"]["majors"] as $program) {
                        echo "<option value='$program'>$program</option>";
                    }
                    ?>
                </select>
            </div>
        </section>

        <section class="flex gap-4 mb-2">
            <!-- table 1 input student -->
            <div class="w-1/2 border border-gray-300 rounded-lg overflow-hidden">
                <table id="student-table" class="text-[14px] w-full text-left border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="text-[12px] px-4 py-2 border">No</th>
                            <th class="text-[12px] px-4 py-2 border">Nim</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-[12px] px-4 py-2 border">1</td>
                            <td class="text-[12px] px-4 py-2 border">
                                <input required type="number" name="student-nim[]" id="student-nim"
                                    class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                                    placeholder="Masukkan Nim" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- table 2 input student -->
            <div class="w-1/2 border border-gray-300 rounded-lg overflow-hidden">
                <table id="student-table" class="text-[14px] w-full text-left border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="text-[12px] px-4 py-2 border">Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-[12px] px-4 py-2 border">
                                <input required type="text" name="student-name[]" id="student-name"
                                    class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                                    placeholder="Masukkan Nama" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- table 3 role student-->
            <div class="w-1/2 border border-gray-300 rounded-lg overflow-hidden">
                <table id="role-table" class="text-[14px] w-full text-left border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="text-[12px] px-4 py-2 border">Peran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-[12px] px-4 py-2 border">
                                <select name="student-role[]"
                                    class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    <option value="" disabled selected>Pilih Peran</option>
                                    <option value="leader">Ketua</option>
                                    <option value="member">Anggota</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

    </section>
    <button type="button" id="add-student-btn"
        class="text-[11px] h-15 w-30 mt-2 bg-[#49B195] text-white py-2 px-4 rounded-sm hover:bg-[#6F38C5] hover:text-white active:bg-[#6F38C5] active:text-white transition duration-300">
        + Tambah Data Mahasiswa
    </button>
</section>