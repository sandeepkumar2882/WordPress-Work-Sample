<?php

    $missionHeading = get_field('rubico_mission_heading');
    $missionContent = get_field('rubico_mission_content');

?>     
<section class="rubico-mission container text-center text-gray-1">
    <h2 class="text-red"><?php echo $missionHeading ?></h2>
    <p><?php echo $missionContent ?></p>
</section>