<?php

namespace Powerclonic\BetterConsoleColor;

class ConsoleColor
{
    private array $colors8 = [
        // Foreground 
        'black' => '30',
        'red' => '31',
        'green' => '32',
        'yellow' => '33',
        'blue' => '34',
        'magenta' => '35',
        'cyan' => '36',
        'lightGray' => '37',

        'darkGray' => '90',
        'lightRed' => '91',
        'lightGreen' => '92',
        'lightYellow' => '93',
        'lightBlue' => '94',
        'lightMagenta' => '95',
        'lightCyan' => '96',
        'white' => '97',

        // Background
        'bg_black' => '40',
        'bg_red' => '41',
        'bg_green' => '42',
        'bg_yellow' => '43',
        'bg_blue' => '44',
        'bg_magenta' => '45',
        'bg_cyan' => '46',
        'bg_lightGray' => '47',

        'bg_darkGray' => '100',
        'bg_lightRed' => '101',
        'bg_lightGreen' => '102',
        'bg_lightYellow' => '103',
        'bg_lightBlue' => '104',
        'bg_lightMagenta' => '105',
        'bg_lightCyan' => '106',
        'bg_white' => '107',
    ];

    private array $colors256 = [
        // Foreground 
        'black' => '0',
        'red' => '1',
        'green' => '2',
        'yellow' => '3',
        'blue' => '4',
        'magenta' => '5',
        'cyan' => '6',
        'lightGray' => '7',
        'darkGray' => '8',

        'lightRed' => '9',
        'lightGreen' => '10',
        'lightYellow' => '11',
        'lightBlue' => '12',
        'lightMagenta' => '13',
        'lightCyan' => '14',
        'white' => '15',

        // Background
        'bg_black' => '0',
        'bg_red' => '1',
        'bg_green' => '2',
        'bg_yellow' => '3',
        'bg_blue' => '4',
        'bg_magenta' => '5',
        'bg_cyan' => '6',
        'bg_lightGray' => '7',
        'bg_darkGray' => '8',

        'bg_lightRed' => '9',
        'bg_lightGreen' => '10',
        'bg_lightYellow' => '11',
        'bg_lightBlue' => '12',
        'bg_lightMagenta' => '13',
        'bg_lightCyan' => '14',
        'bg_white' => '15',
    ];


    //? Config
    private $colors;

    /**
     * @param bool $use256Colors Will use the 256 colors format instead of the 8 if supported
     * @param bool $useEndOfLine Will add or not PHP_EOL at the end of the texts.
     */
    public function __construct(
        private bool $use256Colors = true,
        private bool $useEndOfLine = true
    ) {
        if ($use256Colors && $this->systemSupport256Colors()) {
            $this->colors = $this->colors256;
        } else if ($use256Colors && !$this->systemSupport256Colors()) {
            echo "\e[33mYour terminal may not support 256 colors";
            $this->colors = $this->colors8;
        } else {
            $this->colors = $this->colors8;
        };
    }

    //? Apply color to text
    public function blackText(string $text): string
    {
        return $this->apply('black', $text);
    }

    public function redText(string $text): string
    {
        return $this->apply('red', $text);
    }

    public function greenText(string $text): string
    {
        return $this->apply('green', $text);
    }

    public function blueText(string $text): string
    {
        return $this->apply('blue', $text);
    }

    public function yellowText(string $text): string
    {
        return $this->apply('yellow', $text);
    }

    public function magentaText(string $text): string
    {
        return $this->apply('magenta', $text);
    }

    public function cyanText(string $text): string
    {
        return $this->apply('cyan', $text);
    }

    public function whiteText(string $text): string
    {
        return $this->apply('white', $text);
    }

    public function lightGrayText(string $text): string
    {
        return $this->apply('lightGray', $text);
    }

    public function darkGrayText(string $text): string
    {
        return $this->apply('darkGray', $text);
    }

    public function lightRedText(string $text): string
    {
        return $this->apply('lightRed', $text);
    }

    public function lightGreenText(string $text): string
    {
        return $this->apply('lightGreen', $text);
    }

    public function lightBlueText(string $text): string
    {
        return $this->apply('lightBlue', $text);
    }

    public function lightYellowText(string $text): string
    {
        return $this->apply('lightYellow', $text);
    }

    public function lightMagentaText(string $text): string
    {
        return $this->apply('lightMagenta', $text);
    }

    public function lightCyanText(string $text): string
    {
        return $this->apply('lightCyan', $text);
    }

    //? Apply color to brackground
    public function blackBg(string $text): string
    {
        return $this->apply('bg_black', $text);
    }

    public function redBg(string $text): string
    {
        return $this->apply('bg_red', $text);
    }

    public function greenBg(string $text): string
    {
        return $this->apply('bg_green', $text);
    }

    public function blueBg(string $text): string
    {
        return $this->apply('bg_blue', $text);
    }

    public function yellowBg(string $text): string
    {
        return $this->apply('bg_yellow', $text);
    }

    public function magentaBg(string $text): string
    {
        return $this->apply('bg_magenta', $text);
    }

    public function cyanBg(string $text): string
    {
        return $this->apply('bg_cyan', $text);
    }

    public function whiteBg(string $text): string
    {
        return $this->apply('bg_white', $text);
    }

    public function lightGrayBg(string $text): string
    {
        return $this->apply('bg_lightGray', $text);
    }

    public function darkGrayBg(string $text): string
    {
        return $this->apply('bg_darkGray', $text);
    }

    public function lightRedBg(string $text): string
    {
        return $this->apply('bg_lightRed', $text);
    }

    public function lightGreenBg(string $text): string
    {
        return $this->apply('bg_lightGreen', $text);
    }

    public function lightBlueBg(string $text): string
    {
        return $this->apply('bg_lightBlue', $text);
    }

    public function lightYellowBg(string $text): string
    {
        return $this->apply('bg_lightYellow', $text);
    }

    public function lightMagentaBg(string $text): string
    {
        return $this->apply('bg_lightMagenta', $text);
    }

    public function lightCyanBg(string $text): string
    {
        return $this->apply('bg_lightCyan', $text);
    }

    //? Apply formatting
    public function bold(string $text): string
    {
        return "\e[1m" . $text . PHP_EOL;
    }

    public function dim(string $text): string
    {
        return "\e[2m" . $text . PHP_EOL;
    }

    public function underline(string $text): string
    {
        return "\e[4m" . $text . PHP_EOL;
    }

    public function blink(string $text): string
    {
        return "\e[5m" . $text . PHP_EOL;
    }

    public function reverse(string $text): string
    {
        return "\e[7m" . $text . PHP_EOL;
    }

    public function hidden(string $text): string
    {
        return "\e[8m" . $text . PHP_EOL;
    }


    private function apply(string $colorResolvable, string $text): string
    {
        $colorNumber = $this->colors[$colorResolvable];
        $textToReturn = null;

        if ($this->useEndOfLine) $text .= PHP_EOL;

        if ($this->use256Colors && str_starts_with($colorResolvable, 'bg_')) {
            $textToReturn = "\e[48;5;{$colorNumber}m" . $text; // Background 256
        } else if ($this->use256Colors) {
            $textToReturn = "\e[38;5;{$colorNumber}m" . $text; // Foreground 256
        } else {
            $textToReturn = "\e[{$colorNumber}m" . $text; // Back/Foreground 8
        };

        // This will return the text with the color and on the end it will set the
        // terminal colors to default
        return $textToReturn . "\e[49m\e[39m";
    }

    /**
     * Show all the colors that come with the package
     */
    public function showAllDefaultColors()
    {
        foreach ($this->colors as $color => $key) {
            echo $this->apply($color, $key);
        }
    }

    /**
     * Show all the 512 colors (Background(256) and Foreground(256))
     */
    public function showAll256Colors()
    {
        echo PHP_EOL . "FOREGROUND COLORS" . PHP_EOL;
        for ($i = 0; $i <= 256; $i++) {
            echo "\e[38;5;{$i}m{$i}\t";
            echo "\e[49m\e[39m";
        }

        echo PHP_EOL . "BACKGROUND COLORS" . PHP_EOL;
        for ($i = 0; $i <= 256; $i++) {
            echo "\e[48;5;{$i}m{$i}\t";
            echo "\e[49m\e[39m";
        }
    }

    /**
     * @param string|int $colorResolvable Number between 0-256
     * @param string $text Text
     * @param bool $background Determines if the color will be applied in the background or not
     * @return string
     * @throws \InvalidArgumentException
     */
    public function applyCustomColor(string|int $colorResolvable, string $text, bool $background = false): string
    {
        $colorResolvable = intval($colorResolvable);
        if (! $colorResolvable) throw new \InvalidArgumentException("Custom color can contain only numbers");
        if ($colorResolvable < 0 || $colorResolvable > 256) throw new \InvalidArgumentException("Custom color needs to be between 0 and 256");
        
        if ($background) return "\e[48;5;{$colorResolvable}m" . $text . PHP_EOL . "\e[49m\e[39m";

        return "\e[38;5;{$colorResolvable}m" . $text . PHP_EOL . "\e[49m\e[39m";
    }

    private function systemSupport256Colors(): bool
    {
        if (DIRECTORY_SEPARATOR === '\\') {
            return function_exists('sapi_windows_vt100_support') && @sapi_windows_vt100_support(STDOUT);
        } else {
            return strpos(getenv('TERM'), '256color') !== false;
        }
    }
}
