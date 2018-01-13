#!/usr/bin/env php
<?php

$string='{"name":"John Adams"}';
// create object from string
$json_o=json_decode($string);
// create array from string
$json_a=json_decode($string,true);

echo $json_o->name;
echo $json_a['name'];
