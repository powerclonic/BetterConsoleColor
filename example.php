<?php

require __DIR__ . '/vendor/autoload.php';

use Powerclonic\BetterConsoleColor\ConsoleColor;

// You can pass 2 params
// Enable 256 colors, true by default
// Enable PHP_EOL, true by default
$consoleColor = new ConsoleColor();

// To color a text:
$consoleColor->redText('Hello World!');

// To color the text background
$consoleColor->redBg('Hello World!');

// If you want to use a custom color (256)
// It will color the text by default, you can color the background
// defining the last parameter as true
$consoleColor->applyCustomColor('198', 'Hello World!', false);

// To get a list of the default colors (that come with the package)
$consoleColor->showAllDefaultColors();

// To get all the 512 colors (Fg/Bg)
$consoleColor->showAll256Colors();

// You can format the text too
$consoleColor->bold('Hello World!');