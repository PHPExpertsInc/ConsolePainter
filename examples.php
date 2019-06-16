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

include __DIR__ . '/vendor/autoload.php';

use PHPExperts\ConsolePainter\ConsolePainter;

$painter = new ConsolePainter();

echo $painter->bold()
    ->underlined()
    ->red('Red ')
    ->onDarkGray('Text')
    ->text("\n" . 'bold + underlined + white') . "\n";

echo "New Text\n";

echo $painter->bold()
    ->underlined()
    ->red()
    ->onDarkGray()
    ->text('bold + underlined + white') . "\n";

$p = $painter;

echo $p->bold()->italics('Bold italics') . ' ' . $p->red('Bold + Red') . "\n";
echo "Normal text\n";
echo $p->black()->onLightCyan('   Black on Light Cyan     ') . "\n";
echo $p->black()->onLightGreen('   Black on Light Green    ') . "\n";
echo $p->white()->onGreen('   White on Green          ') . "\n";
echo $p->bold()->white()->onGreen('   White on Green, Bolded  ') . "\n";
echo $p->bold()->underlined()->white()->onBlue('White on Blue, Bolded + Underlined') . "\n";
echo "\n";

echo $p->onRed()->bold()->yellow('  WARNING!! WARNING!!  ') . "\n\n";

/** Advanced */

echo "\t" . $p->italics('This is ') .
    $p->bold('*') . $p->bold()->underlined()->yellow('*REALLY*') .
    $p->bold()->onLightBlue(' emphasized*') . '!' . "\n";

echo "\n";

echo "\t" . $p->yellow('Press ')->bolder()->red('ENTER')->yellow(' to continue...') . "\n";

echo "\n";

// Draw the Red, White and Blue:
echo "\t" . $p->bolder()->red('Red')->dim(', ')->italics()->white('White ')->dim('and ')->blue('Blue') . "\n";

echo "\n";

// Draw the European Union logo:
$starField = '    ★ ★ ★ ★ ★    ';
$euroLogo = $p->text("\t")->yellow()->onBlue($starField) . "\n";
$euroLogo = $p->text((string) $euroLogo . "\t")->onBlue()
        ->bold()->yellow('  ★ ')->bolder()->white('   E U   ')->onBlue()->yellow(' ★  ') . "\n";
$euroLogo = $p->text((string) $euroLogo . "\t")->onBlue()->yellow($starField);
echo "$euroLogo\n\n";
