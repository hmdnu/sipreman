<h1 class="text-[18px] font-bold text-gray-800 mb-4">Unggah Prestasi</h1>

<!-- Section Student Data -->
<div class="text-[13px] bg-[#6F38C5] text-white text-center py-2 rounded-sm font-medium">Data Mahasiswa
</div>

<!-- add study program -->
<div class="mb-6 mt-6">
    <label for="study-program" class="text-[14px] block font-semibold text-gray-700 mb-2">Program
        Studi</label>
    <select id="program-studi" name="study-program"
        class="text-[12px] w-120p border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
        <option value="" disabled selected>Pilih Program Studi</option>
        <option value="ti">Teknik Informatika</option>
        <option value="sib">Sistem Informasi Bisnis</option>
        <option value="ppls">Pengembangan Piranti Lunak Situs</option>
    </select>
</div>

<section class="mb-6">
    <section id="container-student-input">
        <section class="flex gap-4 mb-2">
            <!-- table 1 input student -->
            <div class="w-1/2 border border-gray-300 rounded-lg overflow-hidden">
                <table id="student-table" class="text-[14px] w-full text-left border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="text-[12px] px-4 py-2 border">No</th>
                            <th class="text-[12px] px-4 py-2 border">Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-[12px] px-4 py-2 border">1</td>
                            <td class="text-[12px] px-4 py-2 border">
                                <input type="text"
                                    class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                                    placeholder="Masukkan Nama" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- table 2 role student-->
            <div class="w-1/2 border border-gray-300 rounded-lg overflow-hidden">
                <table id="role-table" class="text-[14px] w-full text-left border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="text-[12px] px-4 py-2 border">No</th>
                            <th class="text-[12px] px-4 py-2 border">Peran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-[12px] px-4 py-2 border">1</td>
                            <td class="text-[12px] px-4 py-2 border">
                                <select
                                    class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    <option value="" disabled selected>Pilih Peran</option>
                                    <option value="captain">Ketua</option>
                                    <option value="member">Anggota</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

    </section>
    <button id="add-student-btn"
        class="text-[11px] h-15 w-30 mt-2 bg-[#49B195] text-white py-2 px-4 rounded-sm hover:bg-[#6F38C5] hover:text-white active:bg-[#6F38C5] active:text-white transition duration-300">
        + Tambah Data Mahasiswa
    </button>
</section>