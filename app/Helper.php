<?php

namespace App;

class Helper
{
    /**
     * Generates a random hex color code.
     *
     * @return string The random color in hex format (e.g., "#ff00ff")
     */
    public static function generateRandomColor(): string
    {
        return '#'.str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }
}
