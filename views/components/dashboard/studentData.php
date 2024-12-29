<?php

use app\cores\View;

?>

<h1 class="h4 font-semibold text-neutral-900 mb-4">Unggah Prestasi</h1>

<!-- Section Student Data -->
<div class="p2 bg-primary-500 text-neutral-0 text-center py-2 rounded-[4px] font-medium mt-10">
    <h1>Data Mahasiswa</h1>
</div>

<section class="mb-6 mt-5">
    <!-- add study program -->
    <section id="container-student-input">
        <section class="flex gap-5">
            <div class="mb-6">
                <label for="study-program" class="p1 block font-medium text-neutral-900 mb-2">Program
                    Studi</label>
                <select id="program-studi" name="study-program[]"
                    class="p2 w-[230px] border-2 border-neutral-200 rounded-lg p-3 focus:outline-none focus:ring-1">
                    <option value="" disabled selected>Pilih Program Studi</option>

                    <?php
                    $program = View::getProps()["studentData"]["studyPrograms"];

                    for ($i = 0; $i < count($program); $i++) {
                        $programName = $program[$i]["study_program_name"];
                        echo "<option value='$programName'>$programName</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- add major -->
            <div class="mb-6">
                <label for="major" class="p1 block font-medium text-neutral-900 mb-2">Jurusan</label>
                <select id="major" name="major[]"
                    class="p2 w-[230px] border-2 border-neutral-200 rounded-lg p-3 focus:outline-none focus:ring-1">
                    <option value="" disabled selected>Pilih Jurusan</option>

                    <?php
                    $program = View::getProps()["studentData"]["majors"];

                    for ($i = 0; $i < count($program); $i++) {
                        $programName = $program[$i]["major_name"];
                        echo "<option value='$programName'>$programName</option>";
                    }
                    ?>
                </select>
            </div>
        </section>

        <section class="flex gap-4 mb-2">
            <!-- table 1 input student -->
            <div class="w-1/2 border-neutral-200 rounded-lg overflow-hidden">
                <table id="student-table" class="p2 w-full text-left border-collapse">
                    <thead class="bg-primary-0">
                        <tr>
                            <th class="p2 font-medium px-4 py-2 border">No</th>
                            <th class="p2 font-medium px-4 py-2 border">NIM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p2 font-medium px-4 py-1 border">1</td>
                            <td class="p3 px-4 py-2 border">
                                <input required type="number" name="student-nim[]" id="student-nim"
                                    class="text-sm p3 border border-gray-300 rounded-lg p-2 focus:outline-1 focus:ring-1 placeholder:p2"
                                    placeholder="Masukkan NIM" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- table 2 input student -->
            <div class="w-1/2 border-neutral-200 rounded-lg overflow-hidden">
                <table id="student-table" class="p1 w-full text-left border-collapse">
                    <thead class="bg-primary-0">
                        <tr>
                            <th class="p2 font-medium px-4 py-2 border">Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p3 px-4 py-2 border">
                                <input required type="text" name="student-name[]" id="student-name"
                                    class="text-sm p2 border border-gray-300 rounded-lg p-2 focus:outline-1 focus:ring-1 placeholder:p2"
                                    placeholder="Masukkan Nama" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- table 3 input student -->
            <div class="w-1/2 border border-neutral-200 rounded-lg overflow-hidden">
                <table id="role-table" class="p1 w-full text-left border-collapse">
                    <thead class="bg-primary-0">
                        <tr>
                            <th class="text-sm font-medium px-4 py-2 border">Peran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p3 px-4 py-2">
                                <select name="student-role[]"
                                    class="p2  border-gray-300 rounded-lg p-2 focus:outline-1 focus:ring-1 placeholder:p3">
                                    <option value="" disabled selected class="text-neutral-200">Pilih Peran</option>
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
        class="text-[11px] h-15 w-30 mt-4 bg-[#49B195] text-white py-2 px-5 rounded-[3px] hover:bg-secondary-800 hover:text-white active:bg-secondary-800 active:text-white transition duration-300 mr-">
        Tambah Data
    </button>

    <button type="button" id="delete-student-btn"
        class="text-[11px] h-15 w-30 mt-4 bg-[#49B195] text-white py-2 px-5 rounded-[3px] hover:bg-secondary-800 hover:text-white active:bg-secondary-800 active:text-white transition duration-300 mr-">
        Hapus
    </button>