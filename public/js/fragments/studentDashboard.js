function getStudentInputFragment(number, studyPrograms, majors) {
    const studyProgramOptions = studyPrograms.map((program) => `"<option value="${program}">${program}</option>"`).join("");
    const majorsOptions = majors.map((major) => `"<option value="${major}">${major}</option>"`);

    return `
    <section id="container-student-input">

        <section class="flex gap-5 mt-10">
            <div class="mb-6">
                <label for="study-program" class="p1 block font-medium text-neutral-900 mb-2">Program
                    Studi</label>
                <select id="program-studi" name="study-program[]"
                    class="p2 w-[230px] border-2 border-neutral-200 rounded-lg p-3 focus:outline-none focus:ring-1">
                    <option value="" disabled selected>Pilih Program Studi</option>
                    ${studyProgramOptions}                
                </select>
            </div>

            <!-- add major -->
            <div class="mb-6">
                <label for="major" class="p1 block font-medium text-neutral-900 mb-2">Jurusan</label>
                <select id="major" name="major[]"
                    class="p2 w-[230px] border-2 border-neutral-200 rounded-lg p-3 focus:outline-none focus:ring-1">
                    <option value="" disabled selected>Pilih Jurusan</option>
                    ${majorsOptions}
                </select>
            </div>
        </section>
                    
        <section class="flex gap-4 mb-2">
            <!-- table 1 input student -->
            <div class="w-1/2 border-neutral-200 rounded-lg overflow-hidden">
                <table id="student-table" class="p1 w-full text-left border-collapse">
                    <thead class="bg-primary-0">
                        <tr>
                            <th class="p2 font-medium px-4 py-2 border">No</th>
                            <th class="p2 font-medium px-4 py-2 border">NIM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <tr>
                            <td class="p2 font-medium px-4 py-1 border">${number}</td>
                            <td class="p3 px-4 py-2 border">
                                <input required type="number" name="student-nim[]" id="student-nim"
                                    class="p2 border border-gray-300 rounded-lg p-2 focus:outline-1 focus:ring-1 placeholder:p2"
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
                                    class="p2 border border-gray-300 rounded-lg p-2 focus:outline-1 focus:ring-1 placeholder:p2"
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
                            <th class="p2 font-medium px-4 py-2 border">Peran</th>
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
                                name="supervisor-name[]"
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
