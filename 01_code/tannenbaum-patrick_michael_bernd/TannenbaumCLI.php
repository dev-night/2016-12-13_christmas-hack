#!/usr/bin/php
<?php

require_once __DIR__ . '/vendor/autoload.php';


$tannenbaum = new Tannenbaum(new ConsoleOutputService(), new TreeBuilder());

$lines = array_key_exists(1, $argv) ? (int)$argv[1] : 3;
$with_star = (array_key_exists(2, $argv) && $argv[2] === 'true') ? true : false;

$tannenbaum->zeichnen($lines, $with_star);
echo "\n";
