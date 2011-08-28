#!/usr/bin/php
<?php

date_default_timezone_set('America/Chicago');
require('LiturgicalCalendar.php');

$arguments = getopt('d:');
$date = array_key_exists('d', $arguments) ? new \DateTime($arguments['d']) : null;

$lc = new LiturgicalCalendar();
// echo $lc->easter(2045)->format('Y m d');
echo $lc->getSeason($date) . "\n";

?>