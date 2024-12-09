function getStudentInputFragment(number, studyPrograms, majors) {
  const studyProgramOptions = studyPrograms.map((program) => `"<option value="${program}">${program}</option>"`).join("");
  const majorsOptions = majors.map((major) => `"<option value="${major}">${major}</option>"`);

  return `
      <section id="container-student-input">
        <section class="flex gap-5">
            <div class="mb-6">
            <label for="study-program" class="text-[14px] block font-semibold text-gray-700 mb-2">Program
                Studi</label>
            <select id="program-studi" name="study-program-${number}"
                class="text-[12px] w-120p border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                <option value="" disabled selected>Pilih Program Studi</option>
                
                ${studyProgramOptions}
            </select>
        </div>
            <!-- add major -->
        <div class="mb-6">
            <label for="major" class="text-[14px] block font-semibold text-gray-700 mb-2">Program
                Studi</label>
            <select id="major" name="major-${number}"
                class="text-[12px] w-120p border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                <option value="" disabled selected>Pilih Jurusan</option>
                ${majorsOptions}
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
                            <th class="text-[12px] px-4 py-2 border">Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-[12px] px-4 py-2 border">${number}</td>
                            <td class="text-[12px] px-4 py-2 border">
                                <input required type="text" name="student-name-${number}" id="student-name"
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
                                    name="student-role-${number}"
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

function getSupervisorInputFragment(number, supervisors) {
  const options = supervisors.map((supervisor) => `"<option value="${supervisor.name}">${supervisor.name}</option>"`).join("");

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
                                name="supervisor-name-${number}"
                                class="text-[12px] w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                <option value="" disabled selected>Pilih Dosen</option>
                                ${options}
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
