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

use PHPExperts\Combinatorics\CombinationsGenerator;
use PHPExperts\ConsolePainter\ConsolePainter;

/** @testdox ConsolePainter: Stylization */
class StylizationTest extends TestCase
{
    /** @var ConsolePainter */
    private $p;

    public function setUp(): void
    {
        $this->p = new ConsolePainter();
        $this->p->e = '\e';

        parent::setUp();
    }

    public function testCanBoldText()
    {
        $expected = '\e[1mText\e[21m\e[0m';
        $actual = $this->p->bold('Text');

        self::assertEquals($expected, (string) $actual);
    }

    public function testCanItalicizeText()
    {
        $expected = '\e[3mText\e[23m\e[0m';
        $actual = $this->p->italics('Text');

        self::assertEquals($expected, (string) $actual);
    }

    public function testCanUnderlineText()
    {
        $expected = '\e[4mText\e[24m\e[0m';
        $actual = $this->p->underlined('Text');

        self::assertEquals($expected, (string) $actual);
    }

    public function testCanDimText()
    {
        $expected = '\e[2mText\e[22m\e[0m';
        $actual = $this->p->dim('Text');

        self::assertEquals($expected, (string) $actual);
    }

    public function testAllCombinationsOfStylizationsWork()
    {
        ob_end_flush();
        $stylizations = [
            'bold'       => '1',
            'italics'    => '3',
            'underlined' => '4',
            'dim'        => '2',
//            'blink'      => '5',
            'inverse'    => '7',
//            'hidden'     => '8',
        ];

        $allPossibleCombinations = [];
        $generator = new CombinationsGenerator();

        foreach ($generator->generate(array_keys($stylizations)) as $combination) {
            $allPossibleCombinations[] = $combination;
        }

        // sort them by the number of combos.
        array_multisort(array_map('count', $allPossibleCombinations), SORT_ASC, $allPossibleCombinations);

        $p = new ConsolePainter();
//        $p->e = '\e';

        foreach ($allPossibleCombinations as $index => $styles) {
            $code = '$p';

            $applied = [];
            foreach ($styles as $style) {
                $code .= "->$style()";
                $applied[$stylizations[$style]] = $style;
            }
            $code .= ";";

            $expected = implode(';', array_keys($applied));
//            dump('\e[' . $expected . 'm');
            $text = implode(' + ', $applied);
            $code = str_replace('();', "('$text');", $code);

            if (self::isDebugOn()) {
                dump($code);
            }

            echo eval("return $code") . "\n";

            if (($index + 1) % 25 === 0) {
                echo $p->yellow('Press ')->bold()->red('ENTER')->yellow('to continue...') . "\n";
                $fh = fopen('php://stdin', 'r');
                fgets($fh);
            }
        }
    }
}
































