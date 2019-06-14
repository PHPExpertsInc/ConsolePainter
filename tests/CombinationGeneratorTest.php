<?php


namespace PHPExperts\ConsolePainter\Tests;


class CombinationGeneratorTest extends TestCase
{
    public function testCanGenerateAllPossibleCombinations()
    {
        $styles = [
            'bold',
            'italics',
            'underline',
            'dim',
        ];

        $allPossibleCombinations = [
            ['bold'],
            ['bold', 'italics'],
            ['bold', 'underline'],
            ['bold', 'dim'],
            ['bold', 'italics', 'underline'],
            ['bold', 'italics', 'dim'],
            ['bold', 'underline', 'italics'],
            ['bold', 'underline', 'dim'],
            ['bold', 'dim', 'italics'],
            ['bold', 'dim', 'underline'],
            ['bold', 'italics', 'underline', 'dim'],
            ['bold', 'italics', 'dim', 'underline'],
            ['bold', 'underline', 'italics', 'dim'],
            ['bold', 'underline', 'dim', 'italics'],
            ['bold', 'dim', 'italics', 'underline'],
            ['bold', 'dim', 'underline', 'italics'],
            ['italics', 'bold'],
            ['italics', 'bold', 'underline'],
            ['italics', 'bold', 'dim'],
            ['italics', 'bold', 'underline', 'dim'],
            ['italics', 'bold', 'dim', 'underline'],
            ['italics'],
            ['italics', 'underline'],
            ['italics', 'dim'],
            ['italics', 'underline', 'bold'],
            ['italics', 'underline', 'dim'],
            ['italics', 'dim', 'bold'],
            ['italics', 'dim', 'underline'],
            ['italics', 'underline', 'bold', 'dim'],
            ['italics', 'underline', 'dim', 'bold'],
            ['italics', 'dim', 'bold', 'underline'],
            ['italics', 'dim', 'underline', 'bold'],
            ['underline', 'bold'],
            ['underline', 'bold', 'italics'],
            ['underline', 'bold', 'dim'],
            ['underline', 'bold', 'italics', 'dim'],
            ['underline', 'bold', 'dim', 'italics'],
            ['underline', 'italics', 'bold'],
            ['underline', 'italics', 'bold', 'dim'],
            ['underline', 'italics'],
            ['underline', 'italics', 'dim'],
            ['underline', 'italics', 'dim', 'bold'],
            ['underline'],
            ['underline', 'dim'],
            ['underline', 'dim', 'bold'],
            ['underline', 'dim', 'italics'],
            ['underline', 'dim', 'bold', 'italics'],
            ['underline', 'dim', 'italics', 'bold'],
            ['dim', 'bold'],
            ['dim', 'bold', 'italics'],
            ['dim', 'bold', 'underline'],
            ['dim', 'bold', 'italics', 'underline'],
            ['dim', 'bold', 'underline', 'italics'],
            ['dim', 'italics', 'bold'],
            ['dim', 'italics', 'bold', 'underline'],
            ['dim', 'italics'],
            ['dim', 'italics', 'underline'],
            ['dim', 'italics', 'underline', 'bold'],
            ['dim', 'underline', 'bold'],
            ['dim', 'underline', 'bold', 'italics'],
            ['dim', 'underline', 'italics', 'bold'],
            ['dim', 'underline', 'italics'],
            ['dim', 'underline'],
            ['dim'],
        ];

        $generatedCombinations = [];
        $generator = new CombinationsGenerator();

        foreach ($generator->generate($styles) as $combination) {
            $generatedCombinations[] = $combination;
        }

        if (self::isDebugOn()) {
            dump($generatedCombinations);
        }

        // Search all possibilities for impossible combinations.
        foreach ($generatedCombinations as $combo) {
            if (!in_array($combo, $allPossibleCombinations)) {
                dump($allPossibleCombinations);
                self::fail('Found an impossible combination: ' . implode(',', $combo));
            }

            $position = array_search($combo, $allPossibleCombinations);

            if (self::isDebugOn()) {
                dump("Unsetting " . implode(',', $combo) . " @ $position");
            }
            unset($allPossibleCombinations[$position]);
        }

        self::assertEmpty($allPossibleCombinations, 'Not all of the possible combinations were generated.');
    }
}
