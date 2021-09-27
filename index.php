<?php
session_start();
require_once(__DIR__.'/src/autoload.php');
$gameLauncher = new Application\TicTacToe();
$gameLauncher->run();