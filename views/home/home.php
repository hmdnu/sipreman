<?php

use app\cores\View;

?>

<section>
    <?php View::renderComponent("home/hero") ?>
    <?php View::renderComponent("home/about") ?>
    <?php View::renderComponent("home/feature") ?>
    <?php View::renderComponent("home/service") ?>
    <?php View::renderComponent("home/achievement") ?>
    <?php View::renderComponent("home/team") ?>
</section>