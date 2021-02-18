<?php

$numKiosksFile = "settings/numKiosks";
$toggleDirFile = "settings/toggleDir";

$numKiosks = intval(file_get_contents($numKiosksFile));
$toggleDir = trim(file_get_contents($toggleDirFile));

?>

