<?php declare(strict_types=1);

/**
 * This file is part of Console Painter, a PHP Experts, Inc., Project.
 *
 * Copyright © 2019 PHP Experts, Inc.
 * Author: Theodore R. Smith <theodore@phpexperts.pro>
 *   GPG Fingerprint: 4BF8 2613 1C34 87AC D28F  2AD8 EB24 A91D D612 5690
 *   https://www.phpexperts.pro/
 *   https://github.com/PHPExpertsInc/ConsolePainter
 *
 * This file is licensed under the MIT License.
 */

namespace PHPExperts\ConsolePainter\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Checks if phpunit was togged in debug mode o rnot.
     * See https://stackoverflow.com/a/12612733/430062.
     *
     * @return bool
     */
    public static function isDebugOn(): bool
    {
        return in_array('--debug', $_SERVER['argv'], true);
    }

    public function runBashTestCase(?string $expected, callable $scenario)
    {
        $actual = $scenario();
        $colorized = (string) $actual;
        if (self::isDebugOn()) {
            ob_end_flush();
            echo "$colorized\n";
            ob_start();
        }

        if ($expected === null) {
            echo "$colorized\n";
            dd('Expected: ' . str_replace("\e", '\e', $colorized));
        }
        self::assertEquals($expected, $colorized);
    }
}
