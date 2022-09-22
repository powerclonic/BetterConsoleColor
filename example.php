<?php

require __DIR__ . '/./vendor/autoload.php';

use Powerclonic\BetterConsoleColor\ConsoleColor;

$consoleColor = new ConsoleColor(true, true);

echo $consoleColor->blueBg('Oi');
echo $consoleColor->yellowText('amarelo');
echo $consoleColor->lightYellowText('Oi');
echo $consoleColor->redBg('Oi');
echo $consoleColor->lightRedBg('Oi');
echo $consoleColor->lightYellowBg('Oi');
echo $consoleColor->applyCustomColor(228, 'Oi', true);
