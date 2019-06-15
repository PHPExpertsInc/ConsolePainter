<?php declare(strict_types=1);

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
            dd("Expected: " . str_replace("\e", '\e', $colorized));
        }
        self::assertEquals($expected, $colorized);
    }
}
