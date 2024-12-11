<?php

use app\cores\View;

echo "<pre>";
var_dump(View::getData());
echo "</pre>";
exit;


?>

<?php View::renderComponent("dashboard/sidebar"); ?>