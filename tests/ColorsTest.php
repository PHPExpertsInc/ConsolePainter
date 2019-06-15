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

use PHPExperts\ConsolePainter\ConsoleArtistGuild;
use PHPExperts\ConsolePainter\ConsolePainter;

/** @testdox ConsolePainter: Foreground Colors */
class ColorsTest extends TestCase
{
    /** @var ConsolePainter */
    private $p;

    public function setUp(): void
    {
        $this->p = new ConsolePainter();
        //$this->p->e = '\e';

        parent::setUp();
    }

    public function testCanMakeTheTextTheDefaultColor()
    {
        $expected = "\e[39mText\e[39m\e[0m";
        self::runBashTestCase($expected, function (): ConsoleArtistGuild {
            return $this->p->defaultColor('Text');
        });
    }

    public function testCanMakeTheTextBlack()
    {
        $expected = "\e[30mText\e[39m\e[0m";
        self::runBashTestCase($expected, function (): ConsoleArtistGuild {
            return $this->p->black('Text');
        });
    }

    public function testCanMakeTheTextDarkGrey()
    {
        $expected = "\e[90mText\e[39m\e[0m";
        self::runBashTestCase($expected, function (): ConsoleArtistGuild {
            return $this->p->darkGray('Text');
        });
    }

    public function testCanMakeTheTextBlue()
    {
        $expected = "\e[34mText\e[39m\e[0m";
        self::runBashTestCase($expected, function (): ConsoleArtistGuild {
            return $this->p->blue('Text');
        });
    }

    public function testCanMakeTheTextLightBlue()
    {
        $expected = "\e[94mText\e[39m\e[0m";
        self::runBashTestCase($expected, function (): ConsoleArtistGuild {
            return $this->p->lightBlue('Text');
        });
    }

    public function testCanMakeTheTextGreen()
    {
        $expected = "\e[32mText\e[39m\e[0m";
        self::runBashTestCase($expected, function (): ConsoleArtistGuild {
            return $this->p->green('Text');
        });
    }

    public function testCanMakeTheTextLightGreen()
    {
        $expected = "\e[92mText\e[39m\e[0m";
        self::runBashTestCase($expected, function (): ConsoleArtistGuild {
            return $this->p->lightGreen('Text');
        });
    }

    public function testCanMakeTheTextCyan()
    {
        $expected = "\e[36mText\e[39m\e[0m";
        self::runBashTestCase($expected, function (): ConsoleArtistGuild {
            return $this->p->cyan('Text');
        });
    }

    public function testCanMakeTheTextLightCyan()
    {
        $expected = "\e[96mText\e[39m\e[0m";
        self::runBashTestCase($expected, function (): ConsoleArtistGuild {
            return $this->p->lightCyan('Text');
        });
    }

    public function testCanMakeTheTextRed()
    {
        $expected = "\e[31mText\e[39m\e[0m";
        self::runBashTestCase($expected, function (): ConsoleArtistGuild {
            return $this->p->red('Text');
        });
    }

    public function testCanMakeTheTextLightRed()
    {
        $expected = "\e[91mText\e[39m\e[0m";
        self::runBashTestCase($expected, function (): ConsoleArtistGuild {
            return $this->p->lightRed('Text');
        });
    }

    public function testCanMakeTheTextPurple()
    {
        $expected = "\e[35mText\e[39m\e[0m";
        self::runBashTestCase($expected, function (): ConsoleArtistGuild {
            return $this->p->purple('Text');
        });
    }

    public function testCanMakeTheTextLightPurple()
    {
        $expected = "\e[95mText\e[39m\e[0m";
        self::runBashTestCase($expected, function (): ConsoleArtistGuild {
            return $this->p->lightPurple('Text');
        });
    }

    public function testCanMakeTheTextBrown()
    {
        $expected = "\e[0;33mText\e[39m\e[0m";
        self::runBashTestCase($expected, function (): ConsoleArtistGuild {
            return $this->p->brown('Text');
        });
    }

    public function testCanMakeTheTextYellow()
    {
        $expected = "\e[1;33mText\e[21;39m\e[0m";
        self::runBashTestCase($expected, function (): ConsoleArtistGuild {
            return $this->p->yellow('Text');
        });
    }

    public function testCanMakeTheTextLightGray()
    {
        $expected = "\e[37mText\e[39m\e[0m";
        self::runBashTestCase($expected, function (): ConsoleArtistGuild {
            return $this->p->lightGray('Text');
        });
    }

    public function testCanMakeTheTextWhite()
    {
        $expected = "\e[97mText\e[39m\e[0m";
        self::runBashTestCase($expected, function (): ConsoleArtistGuild {
            return $this->p->white('Text');
        });
    }

    public function testCanChainTwoOrMoreColoredWordsTogether()
    {
        $expected = "\e[31mRed\e[39m\e[2m, \e[22m\e[97mWhite \e[39m\e[2mand \e[22m\e[34mBlue\e[39m\e[0m";
        self::runBashTestCase($expected, function (): ConsoleArtistGuild {
            return $this->p->red('Red')->dim(', ')->white('White ')->dim('and ')->blue('Blue');
        });
    }

    public function testCanChainTwoOrMoreColoredWordsTogetherWithABackground()
    {
        $expected = "\e[104;31mRed\e[39m\e[2m, \e[22m\e[97mWhite \e[39m\e[2mand \e[22m\e[34mBlue\e[39m\e[0m";
        self::runBashTestCase($expected, function (): ConsoleArtistGuild {
            return $this->p->onLightBlue()->red('Red')->dim(', ')->white('White ')->dim('and ')->blue('Blue');
        });
    }

    public function testCanMakeTheEuropeanUnionLogo()
    {
        $expected = "\e[m\e[m\e[1;33;44m    ★ ★ ★ ★ ★    \e[21;39m\e[0m\n" .
            "\e[m\e[44;1;1;33m  ★ \e[21;21;39m\e[21;97m   E U   \e[;39m\e[44;1;33m ★  \e[21;39m\e[0m\n" .
            "\e[m\e[44;1;33m    ★ ★ ★ ★ ★    \e[21;39m\e[0m";
        self::runBashTestCase($expected, function (): ConsoleArtistGuild {
            $euroLogo = $this->p->yellow()->onBlue('    ★ ★ ★ ★ ★    ') . "\n";
            $euroLogo = $this->p->text((string) $euroLogo)->onBlue()
                    ->bold()->yellow('  ★ ')->bolder()->white('   E U   ')->onBlue()->yellow(' ★  ') . "\n";
            $euroLogo = $this->p->text((string) $euroLogo)->onBlue()->yellow('    ★ ★ ★ ★ ★    ');

            return $euroLogo;
        });
    }
}
