<?php
    $find = $db->prepare("SELECT * FROM icomoon order by name asc");
    $find->execute();
    $icons = $find->fetchAll();


?>



