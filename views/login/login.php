<section class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h1 class="text-2xl font-bold text-center mb-6">Login</h1>

        <form action="/post-login" method="post">
            <div class="mb-4">
                <label for="no-induk" class="block text-sm font-semibold text-gray-700 mb-2">No Induk</label>
                <input type="text" name="no-induk" id="no-induk" placeholder="No Induk"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                <input type="password" name="password" id="password" placeholder="Password"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <label class="flex gap-2 mb-4">
                <input type="checkbox" id="view-password"/>
                <p>show password</p>
            </label>

            <div class="mb-6">
                <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Submit
                </button>
            </div>
        </form>
    </div>
</section>

<script>
    $(() => {
        $("#view-password").on("change", function () {
            const passwordField = $("#password");
            const fieldType = passwordField.attr("type") === "password" ? "text" : "password";
            passwordField.attr("type", fieldType);
        });
    })
</script>