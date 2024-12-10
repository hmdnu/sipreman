<?php

use app\cores\View;

?>

<section>

    <?php View::renderComponent("dashboard/sidebar", View::getData()) ?>
    <!-- Main Content -->
    <form action="/post-prestasi" method="post" class="flex-1 ml-64 p-8">

        <?php View::renderComponent("dashboard/studentData", View::getData()) ?>
        <?php View::renderComponent("dashboard/competitionData") ?>
        <?php View::renderComponent("dashboard/supervisorData", View::getData()) ?>
        <?php View::renderComponent("dashboard/administrative") ?>

        <div class="bg-white rounded-lg p-6">
            <div class="flex justify-start items-center mt-8 space-x-4">
                <!-- button save-->
                <button
                    class="flex items-center text-[14px] font-semibold bg-[#49B195] text-white py-2 px-5 rounded-md hover:bg-[#6F38C5] transition shadow-lg">
                    <img src="/public/assets/icon/save_icon.png" alt="save icon" class="w-4 h-5 mr-2">
                    Simpan
                </button>

                <!-- button back -->
                <button type="submit"
                    class="flex items-center text-[14px] font-semibold bg-gray-200 text-gray-700 py-2 px-5 rounded-md hover:bg-gray-300 transition shadow-lg">
                    <img src="/public/assets/icon/back_icon.png" alt="back Icon" class="w-5 h-5 mr-2">
                    Kembali
                </button>
            </div>
        </div>
    </form>
</section>

<script type="module">
import fragments from "/public/js/fragments/studentDashboard.js"

const supervisors = <?php echo json_encode(View::getData()["supervisors"]) ?>;
const studyPrograms = <?php echo json_encode(View::getData()["studyPrograms"]) ?>;
const majors = <?php echo json_encode(View::getData()["majors"]) ?>

$(() => {

    const states = {
        student: 1,
        supervisor: 1
    }

    $("#add-student-btn").on("click", () => {
        states.student++;
        $("#container-student-input").append(fragments.getStudentInputFragment(states.student,
            studyPrograms, majors));
    })

    $("#add-supervisor-btn").on("click", () => {
        states.supervisor++;
        $("#container-supervisor-input").append(fragments.getSupervisorInputFragment(states
            .supervisor, supervisors));
    })

    $("#logout-form").on("submit", (e) => {
        const confirmation = confirm("Logout?");

        if (!confirmation) {
            e.preventDefault();
        }
    })

})
</script>