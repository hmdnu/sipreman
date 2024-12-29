<section class="w-full h-screen grid place-content-center" style="background-image: url('/public/assets/img/login.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="bg-neutral-0 rounded-[30px] px-20 py-10 w-[530px] h-[530px] flex flex-col items-center justify-center">

        <div>
            <div class="flex items-center justify-center mb-5">
                <img src="/public/assets/icon/graduation_ungu.png" alt="Graduation Logo" width="40" height="40" class="mr-2">
                <h1 class="font-[Raleway] font-bold h2 text-primary-700">sipreman</h1>
            </div>
            <div class="mt-7 flex text-center flex-col">
                <h1 class="h3 font-medium text-neutral-900">Silahkan Masuk</h1>
                <h1 class="h5 text-neutral-600 font-normal mt-2">Masukan nomor induk dan kata sandi</h1>
            </div>


            <form action="/post-login" method="post" class="flex flex-col gap-3">
                <!-- no induk -->
                <div>
                    <label for="noInduk" class="flex flex-col gap-3 mt-8">
                        <h5 class="h6 text-neutral-600 font-medium">No Induk</h5>
                        <input type="text" name="noInduk" id="noInduk"
                            class="px-5 py-2 h6 text-neutral-600 bg-neutral-100 border-2 border-neutral-200 rounded-md">
                    </label>
                </div>
                <!-- password -->
                <div>
                    <label for="password" class="flex flex-col gap-3">
                        <h5 class="h6 text-neutral-600 font-medium">Kata Sandi</h5>
                        <input type="password" name="password" id="password"
                            class="px-5 py-2 h6 text-neutral-600 bg-neutral-100 border-2 border-neutral-200 rounded-md">
                    </label>
                </div>
                <?php echo app\cores\View::getData()["error"] ?? "" ?>
                <!-- view checkbox -->
                <div>
                    <label for="viewPassword" class="flex gap-1 items-center rounded">
                        <input type="checkbox" name="viewPassword" id="viewPassword" class="size-4">
                        <p class="p1 text-neutral-600">Tampilkan Kata Sandi</p>
                    </label>
                </div>
                <div class="flex justify-center">
                    <button class="p1 bg-primary-600 text-white rounded-[7px] py-3 mt-10" style="width: 150px; height: 40px;">Masuk</button>
                </div>
            </form>
        </div>


    </div>
</section>



<script>
    $(() => {
        $("#viewPassword").on("change", function() {
            const passwordField = $("#password");
            const isChecked = $(this).is(":checked");

            // Toggle the type attribute of the password field
            passwordField.attr("type", isChecked ? "text" : "password");
        });
    });
</script>