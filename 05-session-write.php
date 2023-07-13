<?php
session_start();

$_SESSION['toto'] = 'tata';


$key = filter_input(INPUT_GET, 'key');
$value = filter_input(INPUT_GET, 'value');

if ($key && $value)
{
    $_SESSION[$key] = $value;
}