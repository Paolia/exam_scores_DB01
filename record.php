<?php

$string = "";
foreach ($_POST as $key => $value) {
    $string .= $key.":".$value.",";
}
$string .= "\n";

$file = fopen('data/examrecords.txt', 'a');
flock($file, LOCK_EX);
fwrite($file, $string);
flock($file, LOCK_UN);
fclose($file);

header("Location:index.php");
?>
