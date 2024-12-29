<?php

use app\cores\View;

?>

<section>
    <?php View::renderComponent("dashboard/admSidebar", View::getData()) ?>

    <!-- Main content -->
    <div class="flex-1 ml-64 p-8">
        <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h1 class="text-[18px] font-semibold text-gray-800 mb-4">Validasi</h1>

            <div class="space-y-6">

                <?php echo View::renderComponent("/dashboard/admin/validatingStudentData/studentData"); ?>
                <?php echo View::renderComponent("/dashboard/admin/validatingStudentData/competitionData"); ?>
                <?php echo View::renderComponent("dashboard/admin/validatingStudentData/supervisorData"); ?>
                <?php echo View::renderComponent("dashboard/admin/validatingStudentData/administrationInfo"); ?>

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
</section>