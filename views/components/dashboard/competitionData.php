<!-- Section Data Competition -->
<div class="text-[13px] bg-[#6F38C5] text-white text-center py-2 rounded-sm font-medium mt-6 mb-6 competition data">
    Data Kompetisi
</div>

<div class="grid grid-cols-2 gap-6">
    <!-- add type competition -->
    <div>
        <label for="type-competition-type" class="block text-[14px] font-semibold text-gray-700 mb-2">Jenis</label>
        <select id="jenis-kompetisi" name="competition-type"
            class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
            <option value="" disabled selected>Pilih Jenis Kompetisi</option>
            <option value="acad">Akademik</option>
            <option value="non-acad">Non-Akademik</option>
        </select>
    </div>

    <!-- add name of competition  -->
    <div>
        <label for="competition-name" class="block text-[14px] font-semibold text-gray-700 mb-2">Judul</label>
        <input required type="text" id="competition-name" name="competition-name"
            class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
            placeholder="Masukkan Judul Kompetisi">
    </div>

    <!-- add competition level -->
    <div>
        <label for="competition-level" class="block text-[14px] font-semibold text-gray-700 mb-2">Tingkat</label>
        <select required id="competition-level" name="competition-level"
            class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
            <option value="" disabled selected>Pilih Tingkat Kompetisi</option>
            <option value="regency">Kabupaten/Kota</option>
            <option value="province">Provinsi</option>
            <option value="national">Nasional</option>
            <option value="international">Internasional</option>
        </select>
    </div>

    <!-- add competition location -->
    <div>
        <label for="competition-location" class="block text-[14px] font-semibold text-gray-700 mb-2">Tempat</label>
        <input required type="text" id="competition-location" name="competition-location"
            class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
            placeholder="Masukkan Tempat Kompetisi">
    </div>

    <!-- date of start competition -->
    <div>
        <label for="date-start" class="block text-[14px] font-semibold text-gray-700 mb-2">Tanggal
            Mulai</label>
        <input required type="date" id="date-start" name="date-start"
            class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
    </div>

    <!-- add source url competition -->
    <div>
        <label for="competition-url" class="block text-[14px] font-semibold text-gray-700 mb-2">Link</label>
        <input required type="url" id="competition-url" name="competition-url"
            class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
            placeholder="Masukkan Link Kompetisi">
    </div>

    <!-- date of end competition -->
    <div>
        <label for="date-end" class="block text-[14px] font-semibold text-gray-700 mb-2">Tanggal
            Akhir</label>
        <input required type="date" id="date-end" name="date-end"
            class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
    </div>

    <!-- competition participants -->
    <div class="grid grid-cols-2 gap-6">
        <div>
            <label for="total-college" class="block text-[14px] font-semibold text-gray-700 mb-2">Jumlah
                Perguruan Tinggi Berpartisipasi</label>
            <input required type="number" id="total-college" name="total-college"
                class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                placeholder="Masukkan Jumlah">
        </div>
        <div>
            <label for="total-participant" class="block text-[14px] font-semibold text-gray-700 mb-2">Jumlah
                Total Peserta</label>
            <input required type="number" id="total-participant" name="total-participant"
                class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                placeholder="Masukkan Jumlah">
        </div>
    </div>
</div>