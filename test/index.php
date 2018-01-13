<?php
require_once __DIR__ . '/vendor/autoload.php';

$parser = new Parsedown();

$md = file_get_contents('lib/markdown.md');

$test = $parser->text($md);
echo $test;
