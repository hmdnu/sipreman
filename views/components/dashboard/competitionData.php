<!-- Section Data Competition -->
<div class="p2 bg-primary-500 text-neutral-0 text-center py-2 rounded-[4px] font-medium mt-10">
    Data Kompetisi
</div>

<div class="grid grid-cols-2 gap-6 mt-5">

    <!-- add name of competition  -->
    <div>
        <label for="competition-name" class="block p1 font-medium text-neutral-900 mb-2">Judul</label>
        <input required type="text" id="competition-name" name="competition-name"
            class="placeholder:p1 w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-1"
            placeholder="Masukkan Judul Kompetisi">
    </div>

    <!-- add competition level -->
    <div>
        <label for="competition-level" class="block p1 font-medium text-neutral-900 mb-2">Tingkat</label>
        <select required id="competition-level" name="competition-level"
            class="p2 w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2">
            <option value="" disabled selected>Pilih Tingkat Kompetisi</option>
            <option value="regency">Kabupaten/Kota</option>
            <option value="province">Provinsi</option>
            <option value="national">Nasional</option>
            <option value="international">Internasional</option>
        </select>
    </div>

    <!-- add competition location -->
    <div>
        <label for="competition-location" class="block p1 font-medium text-neutral-900 mb-2">Tempat</label>
        <input required type="text" id="competition-location" name="place"
            class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 placeholder:p1"
            placeholder="Masukkan Tempat Kompetisi">
    </div>

    <!-- date of start competition -->
    <div>
        <label for="date-start" class="block p1 font-medium text-neutral-900 mb-2">Tanggal
            Mulai</label>
        <input required type="date" id="date-start" name="date-start-competition"
            class="p1 border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2">
    </div>

    <!-- add source url competition -->
    <div>
        <label for="competition-source" class="block p1 font-medium text-neutral-900 mb-2">Link</label>
        <input required type="url" id="competition-source" name="competition-source"
            class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 placeholder:p1"
            placeholder="Masukkan Link Kompetisi">
    </div>

    <!-- date of end competition -->
    <div>
        <label for="date-end" class="block p1 font-medium text-neutral-900 mb-2">Tanggal
            Akhir</label>
        <input required type="date" id="date-end" name="date-end-competition"
            class="p1  border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2">
    </div>

    <!-- competition participants -->
    <div class="flex gap-6 space-x-5">
        <div>
            <label for="total-college" class="block p1 font-medium text-neutral-900 mb-2">Jumlah
                Perguruan Tinggi Berpartisipasi</label>
            <input required type="number" id="total-college" name="total-college-attended"
                class="p1 w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 placeholder:p1"
                placeholder="Masukkan Jumlah">
        </div>
        <div>
            <label for="total-participant" class="block p1 font-medium text-neutral-900 mb-2">Jumlah
                Total Peserta</label>
            <input required type="number" id="total-participant" name="total-participant"
                class="p1 w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 placeholder:p1"
                placeholder="Masukkan Jumlah">
        </div>
    </div>
</div>