<?php declare(strict_types=1);

include __DIR__ . '/src/ConsolePainter.php';

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
echo $p->black()->onLightCyan('   Black on Light Green    ') . "\n";
echo $p->white()->onGreen('   White on Green          ') . "\n";
echo $p->bold()->white()->onGreen('   White on Green, Bolded  ') . "\n";
echo $p->bold()->underlined()->white()->onBlue('White on Blue, Bolded + Underlined') . "\n";
echo "\n";
echo $p->italics('This is ') .
    $p->bold('*') . $p->bold()->underlined()->yellow('*REALLY*') .
    $p->bold()->onLightBlue(' emphasized*') . '!' . "\n";

