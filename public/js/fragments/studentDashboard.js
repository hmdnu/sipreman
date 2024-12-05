function getStudentInputFragment(number) {
  return `<section class="flex gap-4 mb-2">
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
                            <td class="text-[12px] px-4 py-2 border">${number}</td>
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
                            <td class="text-[12px] px-4 py-2 border">${number}</td>
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
        </section>`;
}

function getSupervisorInputFragment(number) {
  return `<div class="border border-gray-300 rounded-b-lg overflow-hidden mb-2">
            <table id="data-dosen-table" class="text-[14px] w-1/2 text-left border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-[12px] px-4 py-2 border">No</th>
                        <th class="text-[12px] px-4 py-2 border">Nama Dosen</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-[12px] px-4 py-2 border">${number}</td>
                        <td class="text-[12px] px-4 py-2 border">
                            <select
                                class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                <option value="" disabled selected>Pilih Dosen</option>
                                <option value="dosen1">Dosen 1</option>
                                <option value="dosen2">Dosen 2</option>
                                <option value="dosen3">Dosen 3</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>`;
}

export default {
  getStudentInputFragment,
  getSupervisorInputFragment,
};
