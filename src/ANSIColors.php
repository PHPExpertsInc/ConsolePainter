<?php declare(strict_types=1);

/**
 * This file is part of Console Painter, a PHP Experts, Inc., Project.
 *
 * Copyright © 2019-2021 PHP Experts, Inc.
 * Author: Theodore R. Smith <theodore@phpexperts.pro>
 *   GPG Fingerprint: 4BF8 2613 1C34 87AC D28F  2AD8 EB24 A91D D612 5690
 *   https://www.phpexperts.pro/
 *   https://github.com/PHPExpertsInc/ConsolePainter
 *
 * This file is licensed under the MIT License.
 */

namespace PHPExperts\ConsolePainter;

interface ANSIColors
{
    public const BOLD = '1';
    public const DIM = '2';
    public const ITALICS = '3';
    public const UNDERLINE = '4';
    public const BLINK = '5';
    public const INVERSE = '7';
    public const HIDDEN = '8';

    public const RESET = '0';
    public const UN_BOLD = '21';
    public const UN_DIM = '22';
    public const UN_ITALICS = '23';
    public const UN_UNDERLINE = '24';
    public const UN_BLINK = '25';
    public const UN_INVERSE = '27';
    public const UN_HIDDEN = '28';

    public const FG_DEFAULT = '39';
    public const FG_BLACK = '30';
    public const FG_DARK_GRAY = '90';
    public const FG_BLUE = '34';
    public const FG_LIGHT_BLUE = '94';
    public const FG_GREEN = '32';
    public const FG_LIGHT_GREEN = '92';
    public const FG_CYAN = '36';
    public const FG_LIGHT_CYAN = '96';
    public const FG_RED = '31';
    public const FG_LIGHT_RED = '91';
    public const FG_PURPLE = '35';
    public const FG_LIGHT_PURPLE = '95';
    public const FG_BROWN = '0;33';
    public const FG_YELLOW = '1;33';
    public const FG_LIGHT_GRAY = '37';
    public const FG_WHITE = '97';

    public const BG_DEFAULT = '49';
    public const BG_BLACK = '40';
    public const BG_RED = '41';
    public const BG_GREEN = '42';
    public const BG_YELLOW = '43';
    public const BG_BLUE = '44';
    public const BG_PURPLE = '45';
    public const BG_CYAN = '46';
    public const BG_LIGHT_GRAY = '47';
    public const BG_DARK_GRAY = '100';
    public const BG_LIGHT_RED = '101';
    public const BG_LIGHT_GREEN = '102';
    public const BG_LIGHT_YELLOW = '103';
    public const BG_LIGHT_BLUE = '104';
    public const BG_LIGHT_PURPLE = '105';
    public const BG_LIGHT_CYAN = '106';
    public const BG_WHITE = '107';
}
