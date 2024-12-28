<?php

use app\cores\View;

?>

<section>
    <?php View::renderComponent("home/hero") ?>
    <?php View::renderComponent("home/about") ?>
    <?php View::renderComponent("home/services") ?>
    <?php View::renderComponent("home/achievement") ?>
    <?php View::renderComponent("home/team") ?>
    <?php View::renderComponent("home/footer") ?>
</section>