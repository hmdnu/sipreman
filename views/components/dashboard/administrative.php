<!-- Section Administrative Information -->
<div class="p2 bg-primary-500 text-neutral-0 text-center py-2 rounded-[4px] font-medium mt-10">
    Informasi Administrasi
</div>

<div class="grid grid-cols-2 gap-6 mt-5">
    <!-- add loa number -->
    <div>
        <label class="p1 font-medium block text-neutral-900 mb-2" for="loa-number">Nomor Surat
            Tugas</label>
        <input required type="text" id="loa-number" name="loa-number" placeholder="Masukkan Nomor Surat Tugas"
            class="w-full border border-gray-300 rounded-lg p-2 text-[13px] focus:outline-none focus:ring-1 placeholder:p1">
    </div>

    <!-- add loa date-->
    <div>
        <label for="loa-date" class="block p1 font-medium text-neutral-900 mb-2">Tanggal Surat Tugas</label>
        <input required type="date" id="loa-date" name="loa-date"
            class="text-[12px] border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-1">
    </div>


    <!-- upload loa -->
    <div>
    <label class="block p1 font-medium text-neutral-900 mb-2">Unggah File Surat Tugas</label>
    <div class="border-2 border-dashed border-gray-300 rounded-lg p-[90px] flex flex-col items-center justify-center text-center w-full">
        <img src="/public/assets/icon/drag_icon.png" alt="drag_icon" class="mb-3 w-12 h-12">
        <div class="text-[13px] text-gray-400">Pilih file atau seret & letakkan di sini.</div>
        <div class="text-[11px] text-gray-500">Ekstensi jpg, jpeg, png, pdf, docx</div>

        <input required type="file" name="loa-file" id="loa-file"
            class="mt-3 text-[14px] text-gray-600 py-2 px-8 rounded-lg hover:bg-gray-300 transition border-2" />
    </div>
</div>


    <!-- upload certificate -->
    <div>
        <label class="block p1 font-medium text-neutral-900 mb-2">Unggah File Sertifikat</label>
        <div
            class="border-2 border-dashed border-gray-300 rounded-lg p-[90px] flex flex-col items-center justify-center text-center">
            <img src="/public/assets/icon/drag_icon.png" alt="drag_icon" class="mb-3 w-12 h-12">
            <div class="text-[13px] text-gray-400">Pilih file atau seret & letakkan di sini.</div>
            <div class="text-[11px] text-gray-500">Ekstensi jpg, jpeg, png, pdf, docx</div>

            <input required type="file" name="certificate-file" id="certificate-file"
                class="mt-3 text-[14px] text-gray-600 py-2 px-8 rounded-lg hover:bg-gray-300 transition border-2" />
        </div>
    </div>

    <!-- upload photo -->
    <div>
        <label class="block p1 font-medium text-neutral-900 mb-2">Unggah Foto Kegiatan</label>
        <div
            class="border-2 border-dashed border-gray-300 rounded-lg p-[90px] flex flex-col items-center justify-center text-center">
            <img src="/public/assets/icon/drag_icon.png" alt="drag icon" class="mb-3 w-12 h-12">
            <div class="text-[13px] text-gray-400">Pilih file atau seret & letakkan di sini.</div>
            <div class="text-[11px] text-gray-500">Ekstensi jpg, jpeg, png, pdf, docx</div>

            <input required type="file" name="photo-file" id="photo-file"
                class="mt-3 text-[14px] text-gray-600 py-2 px-8 rounded-lg hover:bg-gray-300 transition border-2" />
        </div>
    </div>

    <!-- upload flyer -->
    <div>
        <label class="block p1 font-medium text-neutral-900 mb-2">Unggah File Poster</label>
        <div
            class="border-2 border-dashed border-gray-300 rounded-lg p-[90px] flex flex-col items-center justify-center text-center">

            <img src="/public/assets/icon/drag_icon.png" alt="drag icon" class="mb-3 w-12 h-12">
            <div class="text-[13px] text-gray-400">Pilih file atau seret & letakkan di sini.</div>
            <div class="text-[11px] text-gray-500">Ekstensi jpg, jpeg, png, pdf, docx</div>

            <input required type="file" name="flyer-file" id="flyer-file"
                class="mt-3 text-[14px] text-gray-600 py-2 px-8 rounded-lg hover:bg-gray-300 transition border-2" />
        </div>
    </div>
</div>